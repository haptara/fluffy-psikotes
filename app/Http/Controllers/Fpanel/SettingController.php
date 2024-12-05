<?php

namespace App\Http\Controllers\Fpanel;

use App\Http\Controllers\Controller;
use App\Models\Lokerpositions;
use App\Models\QuestionGroup;
use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{

    public function loker_posisi()
    {
        $lokpro = Lokerpositions::all();
        $data   = [
            'title'         => 'Loker Posisi',
            'data'          => $lokpro,
        ];

        return view('fpanel.setting.loker_posisi', $data);
    }

    public function store_lokpos(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|unique:loker_positions|max:255',
        ]);

        Lokerpositions::create([
            'job_title'  => $request->job_title,
            'description'   => $request->deskripsi,
            'open_date'     => $request->open_date,
            'close_date'    => $request->close_date
        ]);
        return redirect()->route('fpanel.setting.loker_posisi')->with('success', 'Loker posisi berhasil disimpan!');
    }

    public function update_lokpos(Request $request)
    {
        Lokerpositions::updateOrCreate(
            ['id' => $request->jobid_edit],
            [
                'job_title'  => $request->job_title_edit,
                'description'   => $request->deskripsi_edit,
                'open_date'     => $request->open_date_edit,
                'close_date'    => $request->close_date_edit
            ]
        );

        return redirect()->route('fpanel.setting.loker_posisi')->with('success', 'Loker posisi berhasil di ubah!');
    }

    public function detail_lokpos($id)
    {
        $lokpro = Lokerpositions::findOrFail($id);
        return response()->json([
            'success' => true,
            'data'    => $lokpro
        ]);
    }

    public function destroy_loker_posisi($id)
    {
        $item = Lokerpositions::find($id);

        if ($item) {
            try {
                $item->delete();
                return redirect()->route('fpanel.setting.loker_posisi')
                    ->with('success', 'Loker posisi berhasil dihapus.');
            } catch (\Exception $e) {
                return redirect()->route('fpanel.setting.loker_posisi')
                    ->with('error', 'Gagal menghapus Loker posisi: ' . $e->getMessage());
            }
        }
    }

    public function group_soal()
    {
        $groupSoal = QuestionGroup::with(['test', 'questions'])->get();
        // $getUrutanSoal  = 
        // dd($groupSoal);
        $data   = [
            'title'         => 'Group Soal',
            'groupSoal'     => $groupSoal,
        ];

        return view('fpanel.setting.group_soal_psikotes', $data);
    }

    public function store_group_soal(Request $request)
    {
        $request->validate([
            'group_name' => 'required|unique:question_groups|max:255',
        ]);
    }

    public function update_group_soal(Request $request)
    {
        // dd($request->all());
        QuestionGroup::updateOrCreate(
            ['id' => $request->group_id],
            [
                'group_name'    => $request->group_name_edit,
                'order'         => $request->urutan_edit,
                'duration'      => $request->durasi_edit
            ]
        );

        return redirect()->route('fpanel.setting.group_soal')->with('success', 'Group soal berhasil di ubah!');
    }

    public function destroy_group_soal() {}

    public function detail_group_soal($id)
    {
        $groupSoal = QuestionGroup::with(['test', 'questions'])->findOrFail($id);
        $getUrutanSoal  = QuestionGroup::select('order')->distinct()->get();
        return response()->json([
            'success'   => true,
            'urutan'    => $getUrutanSoal,
            'data'      => $groupSoal
        ]);
    }

    public function kategori_soal()
    {
        $tests = Tests::all();
        $data   = [
            'title'         => 'Kategori Soal',
            'test'          => $tests,
        ];

        return view('fpanel.setting.kategori_soal', $data);
    }

    public function store_soal(Request $request)
    {
        $validated = $request->validate([
            'test_name' => 'required|unique:tests|max:255',
        ]);

        Tests::create([
            'slug'          => Str::slug($validated['test_name'], '-'),
            'test_name'     => $validated['test_name'],
        ]);

        return redirect()->route('fpanel.setting.kategori_soal')->with('success', 'Nama test berhasil disimpan.');
    }

    public function update_kategori_soal(Request $request)
    {
        Tests::updateOrCreate(
            ['id' => $request->id_edit],
            [
                'slug'          => Str::slug($request->test_name_edit, '-'),
                'test_name'     => $request->test_name_edit,
            ]
        );

        return redirect()->route('fpanel.setting.kategori_soal')->with('success', 'Loker posisi berhasil di ubah!');
    }

    public function destroy_kategori_soal($id)
    {
        $item = Tests::find($id);

        if ($item) {
            try {
                $item->delete();
                return redirect()->route('fpanel.setting.kategori_soal')
                    ->with('success', 'Kategori Soal berhasil dihapus.');
            } catch (\Exception $e) {
                return redirect()->route('fpanel.setting.kategori_soal')
                    ->with('error', 'Gagal menghapus Kategori Soal: ' . $e->getMessage());
            }
        }
    }

    public function detail_kategori_soal($id)
    {
        $data = Tests::findOrFail($id);
        return response()->json([
            'success' => true,
            'data'    => $data
        ]);
    }
}
