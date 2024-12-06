<?php

namespace App\Http\Controllers\Fpanel;

use App\Http\Controllers\Controller;
use App\Models\UsersPelanggarans;
use Illuminate\Http\Request;

class UsersPelanggaranController extends Controller
{
    //
    public function index()
    {
        $user   = UsersPelanggarans::with('user')->get();
        // dd($user);
        $data   = [
            'title'     => 'Pelanggaran User',
            'user'      => $user,
        ];
        return view('fpanel.pelanggaran.index', $data);
    }

    public function destroy($id)
    {
        $user = UsersPelanggarans::find($id);

        if ($user) {
            $user->delete();
        }

        return response()->json(['success' => true]);
    }
}
