<?php

namespace App\Http\Controllers\Upanel;

use App\Http\Controllers\Controller;
use App\Models\BiodataPeserta;
use App\Models\User;
use Illuminate\Http\Request;

class BiodataPesertaController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string',
            'birth_date'    => 'required|date',
            'gender'        => 'required|in:Laki-laki,Perempuan',
            'no_whatsapp'   => 'required|numeric',
            'test_date'     => 'required|date',
            'address'       => 'required|string',
            'position_id'   => 'required|integer|exists:loker_positions,id',
        ]);

        // dd([
        //     'validated' => $validated,
        //     'user_id' => auth()->user()->id,
        // ]);

        BiodataPeserta::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
            ],
            [
                'position_id' => $validated['position_id'],
                'name'        => $validated['name'],
                'birth_date'  => $validated['birth_date'],
                'gender'      => $validated['gender'],
                'no_whatsapp' => $validated['no_whatsapp'],
                'test_date'   => $validated['test_date'],
                'address'     => $validated['address'],
            ]
        );

        $user = User::findOrFail(auth()->user()->id);
        $user->update([
            'name'          => $validated['name'],
        ]);

        return redirect()->route('upanel.dashboard')->with('success', 'Biodata updated successfully.');
    }
}
