<?php

namespace App\Http\Controllers\Fpanel;

use App\Http\Controllers\Controller;
use App\Models\AnswerDisc;
use App\Models\Answerpsikotes;
use App\Models\BiodataPeserta;
use App\Models\ResultTests;
use App\Models\Tests;
use App\Models\UserTestProgress;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function psikotes()
    {

        // $participants = UserTestProgress::with('user', 'tes')
        //     ->select('user_id', 'test_id')
        //     ->distinct()
        //     ->get();

        $participants = ResultTests::with(['user.biodataPeserta'])->get();

        // echo json_encode($participants, JSON_PRETTY_PRINT);
        $data = [
            'title'         => 'Hasil Psikotes',
            'participants'  => $participants
        ];
        return view('fpanel.hasil.psikotes', $data);
    }

    public function detail($id)
    {
        $biodata    = BiodataPeserta::with('lokerPosition')->where('user_id', $id)->first();
        $jawaban    = Answerpsikotes::with(['question.choices', 'choice'])->where('user_id', $id)->get();
        // dd($jawaban);
        // echo json_encode($biodata, JSON_PRETTY_PRINT);
        $data = [
            'title'         => 'Hasil Psikotes',
            'biodata'       => $biodata,
            'data'          => $jawaban
        ];
        return view('fpanel.hasil.detail-psikotes', $data);
    }

    public function disc()
    {
        $hadisc = AnswerDisc::with(['user'])
            ->select('user_id')
            ->distinct()
            ->get();

        $data = [
            'title' => 'Hasil D.I.S.C',
            'data'  => $hadisc
        ];
        return view('fpanel.hasil.disc', $data);
    }

    public function detail_disc($id)
    {
        $biodata    = BiodataPeserta::with('lokerPosition')->where('user_id', $id)->first();
        $hadisc = AnswerDisc::with(['question.statements'])
            ->where('user_id', $id)
            ->get();

        // echo json_encode($hadisc, JSON_PRETTY_PRINT);
        $data = [
            'title' => 'Hasil D.I.S.C',
            'biodata'       => $biodata,
            'data'  => $hadisc
        ];
        return view('fpanel.hasil.detail-disc', $data);
    }
}
