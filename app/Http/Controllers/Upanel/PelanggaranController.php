<?php

namespace App\Http\Controllers\Upanel;

use App\Http\Controllers\Controller;
use App\Models\UsersPelanggarans;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    //
    public function store(Request $request)
    {
        UsersPelanggarans::create([
            'user_id'   => auth()->user()->id,
            'waktu_pelanggaran' => now(),
            'deskripsi' => $request->pesan,
        ]);

        return response()->json(['success' => true, 'message' => 'Pelanggaran berhasil disimpan']);
    }

    public function show()
    {
        $data = [
            'title'             => 'Pelanggaran - Fluffy Psikotes',
        ];

        return view('upanel.pelanggaran', $data);
    }
}
