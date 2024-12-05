<?php

namespace App\Http\Controllers\Fpanel;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionDisc;
use App\Models\QuestionGroup;
use App\Models\QuestionStatementDisc;
use App\Models\Tests;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function psikotes()
    {
        $questions  = Question::with(['test', 'choices'])->get();
        // dd($questions);
        $data       = [
            'title'         => 'Soal Psikotes',
            'questions'     => $questions,
        ];

        return view('fpanel.psikotes', $data);
    }

    public function create()
    {
        $tests      = Tests::all();
        $group_tes  = QuestionGroup::all();
        $data   = [
            'title'         => 'Add Soal Psikotes',
            'tests'         => $tests,
            'group_tes'     => $group_tes,
        ];

        return view('fpanel.psikotes.add', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_id' => 'required|exists:tests,id',
            'group_tes' => 'required|exists:question_groups,id',
            'question_text' => 'required|string',
            'question_type' => 'required|in:essay,multiple_choice',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'choices.*' => 'nullable|string',
            // 'correct_choice' => 'nullable|integer',
            'correct_choice' => 'nullable',
        ]);

        // dd($request->all());

        $question = Question::create([
            'test_id'               => $validated['test_id'],
            'question_group_id'     => $validated['group_tes'],
            'question_text'         => $validated['question_text'],
            'question_type'         => $validated['question_type'],
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/soal', $imageName);
            $question->image = $imageName;
            $question->save();
        }

        if ($validated['question_type'] == 'multiple_choice') {
            foreach ($request->choices as $index => $choice) {
                if ($choice) {
                    $question->choices()->create([
                        'choice_text' => $choice,
                        'is_correct' => $index == $validated['correct_choice'],
                    ]);
                }
            }
        }

        return redirect()->route('fpanel.soal.psikotes.add')->with('success', 'Soal berhasil ditambahkan!');
    }

    public function psikotesEdit($id)
    {
        $question = Question::with(['questionGroup', 'choices'])->findOrFail($id);
        $group_tes  = QuestionGroup::all();

        // return response()->json($question, 200, [], JSON_PRETTY_PRINT);
        $data   = [
            'title'         => 'Edit Soal',
            'question'      => $question,
            'group_tes'     => $group_tes
        ];

        return view('fpanel.psikotes.edit', $data);
    }

    public function disc()
    {
        $question   = QuestionDisc::with('statements')->get();
        // dd($data_peserta);
        $data   = [
            'title'         => 'DISC',
            'questions'     => $question
        ];

        return view('fpanel.disc', $data);
    }

    public function create_disc()
    {
        $data   = [
            'title'         => 'Add Soal DISC',
        ];

        return view('fpanel.disc.add', $data);
    }

    public function store_disc(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string|max:255',
            'statements' => 'required|array|min:1', // Minimal 1 pernyataan
            'statements.*' => 'required|string|max:255',
        ]);

        $question = QuestionDisc::create(['question_text' => $request->question_text]);

        foreach ($request->statements as $statement) {
            $question->statements()->create(['statement' => $statement]);
        }

        return redirect()->route('fpanel.soal.disc.add')->with('success', 'Disc berhasil disimpan.');
    }

    public function edit_disc($id)
    {
        $question   = QuestionDisc::with('statements')->findOrFail($id);
        // dd($data_peserta);
        // return response()->json($question, 200, [], JSON_PRETTY_PRINT);
        $data   = [
            'title'         => 'DISC',
            'questions'     => $question
        ];

        return view('fpanel.disc.edit', $data);
    }

    public function update_disc(Request $request)
    {
        $disc = QuestionDisc::findOrFail($request->question_id);


        // return response()->json($request->all(), 200, [], JSON_PRETTY_PRINT);

        if ($disc) {

            $disc->update([
                'question_text'     => $request->question_text,
            ]);

            foreach ($request->statements_id as $index => $statement) {
                // $disc->statements()->update([
                //     'id'        => $request->statements_id,
                //     'statement' => $request->statement,
                // ]);

                // return response()->json($request->statements[$index], 200, [], JSON_PRETTY_PRINT);
            }

            return redirect()->route('fpanel.soal.disc')->with('success', 'Soal disc berhasil diubah!');
        }
    }
}