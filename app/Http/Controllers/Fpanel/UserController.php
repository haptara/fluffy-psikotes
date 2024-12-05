<?php

namespace App\Http\Controllers\Fpanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user   = User::with('user_pw_hash')->where('role_id', '!=', '2')->get();
        // dd($user);
        $data   = [
            'title'     => 'Manamjemen User',
            'user'      => $user,
        ];
        return view('fpanel.user.index', $data);
    }

    public function detail($id)
    {
        $user   = User::findOrFail($id);

        // return response()->json($user, 200, [], JSON_PRETTY_PRINT);
        return response()->json([
            'success' => true,
            'data'    => $user
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_add' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password_add' => ['required', Rules\Password::defaults()],
            // 'role_add' => 'required|integer',
        ], [
            'nama_add.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.unique'  => 'Email sudah terdaftar',
            'password_add.required' => 'Password tidak boleh kosong.',
            // 'role_add.required' => 'Role ID tidak boleh kosong.'
        ]);

        // dd($request->all());

        $user = User::create([
            'name' => $request->nama_add,
            'email' => $request->email,
            'password' => Hash::make($request->password_add),
            'role_id'   => 1,
        ]);

        $user->user_pw_hash()->create([
            'user_id'       => $user->id,
            'pw_hash'       => base64_encode($request->password_add)
        ]);

        return redirect()->route('fpanel.user')->with('success', 'Akun berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        // return response()->json($request->all(), 200, [], JSON_PRETTY_PRINT);
        $id = $request->user_id;

        $user = User::findOrFail($id);
        // dd($user);

        if ($user) {

            $user->update([
                'name'     => $request->nama_edit,
                'email'     => $request->email_edit,
                'password'     => Hash::make($request->password_edit),
            ]);

            $user->user_pw_hash()->updateOrCreate(
                ['user_id' => $user->id],
                ['pw_hash' => base64_encode($request->password_edit)]
            );

            $userLog    = auth()->user()->id;

            if ($userLog == $id) {
                $this->redirectToLogout();
                return redirect()->route('login')->with('success', 'Anda telah logout.');
            }

            return redirect()->route('fpanel.user')->with('success', 'User berhasil diubah!');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $item = $user->user_pw_hash;

        if ($item) {
            $item->delete();
        }
        $user->delete();

        return response()->json(['success' => true]);
    }

    private function redirectToLogout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }
}
