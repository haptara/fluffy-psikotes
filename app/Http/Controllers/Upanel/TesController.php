<?php

namespace App\Http\Controllers\Upanel;

use App\Http\Controllers\Controller;
use App\Models\AnswerDisc;
use App\Models\Answerpsikotes;
use App\Models\Question;
use App\Models\QuestionDisc;
use App\Models\QuestionGroup;
use App\Models\ResultTests;
use App\Models\Tests;
use App\Models\UserTestProgress;
use Illuminate\Http\Request;

class TesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Tes - Fluffy Psikotes'
        ];

        return view('upanel.tes', $data);
    }

    public function starTes(Request $request, $testId)
    {
        $test = Tests::where('slug', $testId)->firstOrFail();

        // // Cek apakah tes ini sudah pernah dikerjakan oleh user
        // $lastAnswer = Answerpsikotes::where('user_id', auth()->id())
        //     ->where('question_id', $test->id)
        //     ->latest('created_at')
        //     ->first();

        // // // Jika sudah ada jawaban sebelumnya, lanjutkan ke grup soal terakhir
        // if ($lastAnswer) {
        //     $lastQuestionGroup = Question::find($lastAnswer->question_id)->questionGroup;
        //     return redirect()->route('test.group', [
        //         'testId' => $testId,
        //         'groupOrder' => $lastQuestionGroup->order,
        //     ]);
        // }

        // echo json_encode($lastAnswer, JSON_PRETTY_PRINT);

        return view('upanel.start', [
            'title'         => 'Start Test',
            'tes'           => $test,
        ]);

        // Jika belum, mulai dari grup pertama
        // return redirect()->route('test.group', ['testId' => $testId, 'groupOrder' => 1]);
    }

    public function showTest(Request $request, $testId, $groupOrder = 1)
    {

        $test = Tests::where('slug', $testId)->firstOrFail();
        $currentGroup = QuestionGroup::where('test_id', $test->id)
            ->orderBy('order')
            ->skip($groupOrder - 1)
            ->take(1)
            ->with('questions.choices') // Ambil soal dan pilihan jawabannya
            ->first();
        // dd($currentGroup);

        $totalGroups    = QuestionGroup::where('test_id', $test->id)->count();

        // Jika grup tidak ditemukan, anggap semua grup selesai
        // if (!$currentGroup) {
        //     return redirect()->route('test.complete', $test->id)->with('success', 'Test selesai!');
        // }

        $uProgress = UserTestProgress::where('user_id', auth()->id())
            ->where('test_id', $test->id)
            ->orderBy('created_at', 'desc')
            ->first();


        // echo json_encode($currentGroup, JSON_PRETTY_PRINT);
        // if ($uProgress) {
        // if ($uProgress->question_group_id >= $currentGroup->id) {
        //     return redirect()->route('test.group', [
        //         'testId' => $testId,
        //         'groupOrder' => $groupOrder + 1
        //     ]);
        // }
        // }

        // Cek progres user di tabel baru
        $userProgress = UserTestProgress::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'test_id' => $test->id,
                'question_group_id' => $currentGroup->id,
            ],
            [
                'start_at' => now(), // Set waktu mulai hanya jika belum ada
            ]
        );

        $timeStarted = $userProgress->start_at->timestamp;
        $timeNow = now()->timestamp;
        $timeLimit = $timeStarted + ($currentGroup->duration * 60);
        $remainingTime = max(0, $timeLimit - $timeNow);
        $totalTime = $currentGroup->duration * 60; // Total waktu dalam detik

        return view('upanel.tes', [
            'title'         => ucfirst($currentGroup->group_name) . ' | Show Test',
            'soal'          => $currentGroup,
            'groupOrder'    => $groupOrder,
            'remainingTime' => $remainingTime,
            'totalTime'     => $totalTime,
            'totalGroups'   => $totalGroups,
        ]);
    }

    public function submitGroupAnswers(Request $request, $testId, $groupOrder)
    {
        $answers = $request->input('answers', []);

        // Menyimpan jawaban untuk setiap pertanyaan
        foreach ($answers as $questionId => $answer) {
            // Cek jika jawaban adalah untuk soal pilihan ganda atau esai
            if (is_numeric($answer)) {
                $selectedChoiceId = $answer;
                $answerText = null;
            } else {
                $selectedChoiceId = null;
                $answerText = $answer;
            }

            Answerpsikotes::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'question_id' => $questionId,
                ],
                [
                    'answer_text' => $answerText,
                    'selected_choice_id' => $selectedChoiceId,
                ]
            );
        }

        // GET SLUG
        $tes = Tests::where('id', $testId)->firstOrFail();

        // Catat waktu selesai pengerjaan grup soal
        $currentGroup = QuestionGroup::where('test_id', $testId)
            ->orderBy('order')
            ->skip($groupOrder - 1)
            ->first();

        UserTestProgress::where('user_id', auth()->id())
            ->where('test_id', $testId)
            ->where('question_group_id', $currentGroup->id)
            ->update(['end_at' => now()]);

        // // Redirect ke grup berikutnya atau selesai
        $nextGroup = QuestionGroup::where('test_id', $testId)
            ->where('order', '>', $groupOrder)
            ->orderBy('order')
            ->first();

        // // echo json_encode($jawaban, JSON_PRETTY_PRINT);
        if ($nextGroup) {
            return redirect()->route('test.group', ['testId' => $tes->slug, 'groupOrder' => $groupOrder + 1]);
        }

        return redirect()->route('tes.selesai', $tes->slug)->with('success', 'Tes selesai!');
    }


    public function complete($testId)
    {
        $tes = Tests::where('slug', $testId)->firstOrFail();
        $score = $this->calculateScore($tes->id);
        // echo json_encode($score, JSON_PRETTY_PRINT);

        return redirect()->route('upanel.dashboard')->with('success', 'Tes Psikotes Selesai ! silahkan untuk melanjutan ke tes selanjutnya.');
        // return view('upanel.tes_complete', [
        //     'title' => 'Hasil Tes',
        //     'score' => $score,
        // ]);
    }

    public function calculateScore($testId)
    {
        $userId = auth()->id();
        $answers = Answerpsikotes::whereHas('question', function ($query) use ($testId) {
            $query->where('test_id', $testId);
        })
            ->where('user_id', $userId)
            ->with(['question', 'choice'])
            ->get();

        if ($answers->isEmpty()) {
            return 0;
        }

        $score = 0;

        foreach ($answers as $answer) {
            if ($answer->question->question_type === 'multiple_choice') {
                if ($answer->choice->is_correct) {
                    $score += 20;
                }
            }
        }
        ResultTests::create([
            'user_id' => $userId,
            'score'   => $score,
        ]);

        return $score;
    }


    // public function calculateScore($testId)
    // {
    //     $userId = auth()->id();

    //     $answers = Answerpsikotes::whereHas('question', function ($query) use ($testId) {
    //         $query->where('test_id', $testId);
    //     })->where('user_id', $userId)->with(['question', 'choice'])->get();


    //     $score = 0;

    //     foreach ($answers as $answer) {
    //         if ($answer->question->question_type === 'multiple_choice') {
    //             if ($answer->choice->is_correct == 1) {
    //                 $score += 20;
    //             }
    //         }
    //     }

    //     ResultTests::create([
    //         'user_id'  => $userId,
    //         'score'     => $score
    //     ]);

    //     return $score;
    // }

    // ------------------------------------====================----------------------------------------

    public function psikotes()
    {
        $questions  = Question::with(['test', 'choices', 'questionGroup'])->get();
        // dd($questions);
        $data = [
            'title' => 'Psikotes - Fluffy Psikotes',
            'soal'  => $questions,
        ];

        return view('upanel.psikotes', $data);
    }

    public function disc()
    {
        $questions = QuestionDisc::with('statements')->get();
        $data = [
            'title' => 'Disc - Fluffy Psikotes',
            'questions' => $questions
        ];

        return view('upanel.disc', $data);
    }

    public function submitTest(Request $request)
    {
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*.p' => 'required|exists:question_statement_disc,id',  // validasi untuk field p
            'answers.*.k' => 'required|exists:question_statement_disc,id',  // validasi untuk field k
        ]);

        // Lakukan validasi perbandingan 'p' dan 'k' di dalam array
        // foreach ($request->answers as $key => $answer) {
        //     // Periksa apakah 'p' dan 'k' memiliki nilai yang sama
        //     if ($answer['p'] === $answer['k']) {
        //         return back()->withErrors(['answers.' . $key . '.k' => 'p dan k tidak boleh sama']);
        //     }
        // }

        // foreach ($validated['answers'] as $answer) {
        //     \DB::table('user_answers')->insert([
        //         'user_id' => auth()->id(),
        //         'question_id' => $answer['question_id'],
        //         'p_statement_id' => $answer['p'],
        //         'k_statement_id' => $answer['k'],
        //     ]);
        // }

        foreach ($request->answers as $questionId => $answers) {
            // echo json_encode($jawaban, JSON_PRETTY_PRINT);
            $question = QuestionDisc::find($questionId);
            $question->userAnswers()->create([
                'user_id' => auth()->id(),
                'question_id' => $questionId,
                'most_selected' => $answers['p'],
                'least_selected' => $answers['k'],
            ]);
        }

        return redirect()->route('upanel.dashboard')->with('success', 'Tes disc berhasil di submit!');
    }
}
