<?php

namespace App\Http\Controllers\Upanel;

use App\Http\Controllers\Controller;
use App\Models\AnswerDisc;
use App\Models\Answerpsikotes;
use App\Models\BiodataPeserta;
use App\Models\Lokerpositions;
use App\Models\Tests;
use App\Models\UsersLinks;
use App\Models\UserTestProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function get_link($id)
    {
        // echo auth()->user()->id;
        $get_link = UsersLinks::where('link_key', $id);
        $jumlah = $get_link->count();
        $data = $get_link->first();

        if ($jumlah > 0) {


            $psikotes   = Answerpsikotes::where('user_id', auth()->user()->id)->count();
            $disc       = AnswerDisc::where('user_id', auth()->user()->id)->count();

            // echo $psikotes;
            if ($psikotes > 0 && $disc > 0) {

                Auth::logout();

                session()->invalidate();
                session()->regenerateToken();

                return redirect('/')->with('success', 'Mohon maaf anda sudah mengikuti TES');
            } else {
                return redirect()->route('upanel.dashboard');
            }

            // echo $disc;
        } else {
            // abort(403, 'Unauthorized action.');
            Auth::logout();

            session()->invalidate();
            session()->regenerateToken();

            // Redirect ke halaman login atau halaman lainnya
            return redirect('/')->with('error', 'You have been logged out due to unauthorized access.');

            // Auth::guard('web')->logout();

            // $request->session()->invalidate();

            // $request->session()->regenerateToken();

            // return redirect('/');
        }
    }

    public function index()
    {
        $userid = auth()->user()->id;
        $biodata_peserta_query = BiodataPeserta::where('user_id', $userid)
            ->with(['user', 'lokerPosition']);
        $jum_data = $biodata_peserta_query->count();
        $data_peserta = $biodata_peserta_query->first();

        $loker_positions = Lokerpositions::all();

        $soal = Tests::with(['userProgress' => function ($query) use ($userid) {
            $query->where('user_id', $userid);
        }])->get();

        // CEK TES DISC
        $isCompletedDisc   = AnswerDisc::where('user_id', auth()->user()->id)->count();
        // dd($soal);
        $data = [
            'title'             => 'Dashboard - Fluffy Psikotes',
            'jum_data'          => $jum_data,
            'biodata'           => $data_peserta,
            'positions'         => $loker_positions,
            'isCompletedDisc'   => $isCompletedDisc,
            'soal'              => $soal,
        ];

        return view('upanel.dashboard', $data);
    }
}
