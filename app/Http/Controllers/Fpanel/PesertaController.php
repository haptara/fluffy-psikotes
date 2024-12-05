<?php

namespace App\Http\Controllers\Fpanel;

use App\Http\Controllers\Controller;
use App\Models\BiodataPeserta;
use App\Models\Lokerpositions;
use App\Models\User;
use App\Models\UsersLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PesertaController extends Controller
{

    public function index()
    {

        $data_peserta   = BiodataPeserta::with(['user.generatedLink', 'lokerPosition'])->get();
        // dd($data_peserta);
        $loker_position = Lokerpositions::all();
        $data   = [
            'title'             => 'Data Peserta',
            'data_peserta'      => $data_peserta,
            'positions'         => $loker_position
        ];

        return view('fpanel.peserta.data_peserta', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'position_id'   => 'required|integer|exists:loker_positions,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'   => 2,
        ]);

        $user->biodataPeserta()->create([
            'user_id'       => $user->id,
            'name'          => $user->name,
            'position_id'   => $request->position_id,
        ]);

        $user->user_pw_hash()->create([
            'user_id'       => $user->id,
            'pw_hash'       => base64_encode($request->password)
        ]);

        return redirect()->route('fpanel.peserta')->with('success', 'Peserta berhasil ditambahkan!');
    }

    public function generateLink($id)
    {
        $decrypted = Crypt::decryptString($id);

        $user = User::with('biodataPeserta')->findOrFail($decrypted);

        $existingLink = $user->generatedLink;
        if ($existingLink) {
            return redirect()->route('fpanel.peserta')->with('success', 'Link user ' . $user->name . ' sudah tersedia!');
        }

        $str    = Str::random(10);
        $baseUrl = url('/t') . '/' . $str;
        $link = UsersLinks::create([
            'user_id'       => $user->id,
            'link_key'      => $str,
            'original_url'  => $baseUrl,
        ]);

        return redirect()->route('fpanel.peserta')->with('success', 'Link berhasil di generate!');
    }


    public function gid($id)
    {
        $user = User::with(['biodataPeserta', 'generatedLink'])->findOrFail($id);

        $jk1    = "";
        $jk2    = "";
        if ($user->biodataPeserta) {
            $gender = strtolower($user->biodataPeserta->gender);
            if ($gender == "laki-laki") {
                $jk1 = "pak";
                $jk2 = "bapak";
            } else {
                $jk1 = "bu";
                $jk2 = "ibu";
            }
        }
        $link_key   = $user->generatedLink->link_key ?? null;
        $pw_decrypt = $user->user_pw_hash->pw_hash ?? null;

        $password   = base64_decode($pw_decrypt);


        $pesan  = "Selamat siang " . $jk1 . ", untuk menindaklanjuti proses recruitment " . $jk2 . " di Fluffy Baby, kami akan proses ke tahapan berikutnya, yaitu psikotes. Untuk psikotes akan dilakukan secara online dengan cara mengakses link yang akan saya berikan. Jadi untuk waktunya fleksible mengikuti availability " . $jk2 . ", akan tetapi diharapkan seluruh rangkaian tes diselesaikan langsung (tidak terpotong-potong) sehingga dimohon untuk meluangkan waktu kurang lebih 1 jam untuk menyelesaikan psikotesnya. Batas waktu submit psikotes adalah besok, .... pukul .... WIB. berikut untuk link yang perlu diakses untuk pengerjaan tes. Link hanya dapat diakses satu kali saja, jadi pastikan mulai akses link nya saat sudah siap untuk mulai mengerjakan. URL : " . url('') . "/" . $link_key . " Email : " . $user->email . " Password : " . $password . "";

        $callback   = [
            'nama'          => ucwords($user->name),
            'no_whatsapp'   => $user->biodataPeserta->no_whatsapp,
            'pesan'         => $pesan
        ];

        return response()->json([
            'success' => true,
            'data'    => $callback
        ]);
    }

    public function send_url(Request $request)
    {
        $no_wa  = $request->no_whatsapp;
        $pesan  = $request->pesan;

        if (!preg_match("/[^+0-9]/", trim($no_wa))) {
            if (substr(trim($no_wa), 0, 2) == "62") {
                $hp    = trim($no_wa);
            } else if (substr(trim($no_wa), 0, 1) == "0") {
                $hp    = "62" . substr(trim($no_wa), 1);
            }
        }

        $url    = "https://api.whatsapp.com/send?phone=" . $hp . "&text=" . $pesan . "";
        return Redirect::to($url);
    }

    public function detail($id)
    {
        // $peserta = User::with(['biodataPeserta', 'generatedLink', 'user_pw_hash'])->findOrFail($id);
        $peserta = BiodataPeserta::with(['user.generatedLink', 'user.user_pw_hash', 'lokerPosition'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $peserta
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->peserta_id;

        $user = User::findOrFail($id);
        // dd($user);

        if ($user) {

            $user->update([
                'name'     => $request->name_edit,
                'email'     => $request->email_edit,
                'password'     => Hash::make($request->password_edit),
            ]);

            $user->biodataPeserta()->update([
                'user_id'       => $user->id,
                'name'          => $user->name,
                'position_id'   => $request->position_id_edit,
            ]);

            $user->user_pw_hash()->updateOrCreate(
                ['user_id' => $user->id],
                ['pw_hash' => base64_encode($request->password_edit)]
            );

            return redirect()->route('fpanel.peserta')->with('success', 'Peserta berhasil diubah!');
        }
    }

    public function destroy($id)
    {
        $item = BiodataPeserta::find($id);

        $user = $item->user;

        if ($user) {
            $user->delete();
        }
        $item->delete();

        return response()->json(['success' => true]);

        // return response()->json(['success' => false], 404);
    }

    // public function redirectToOriginal($key)
    // {
    //     $link = UsersLinks::where('link_key', $key)
    //         ->where(function ($query) {
    //             $query->whereNull('expires_at')
    //                 ->orWhere('expires_at', '>', now());
    //         })->firstOrFail();

    //     return redirect($link->original_url);
    // }
}
