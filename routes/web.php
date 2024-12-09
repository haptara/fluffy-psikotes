<?php

use App\Http\Controllers\Fpanel\DashboardController;
use App\Http\Controllers\Fpanel\HasilController;
use App\Http\Controllers\Fpanel\PesertaController;
use App\Http\Controllers\Fpanel\SettingController;
use App\Http\Controllers\Fpanel\SoalController;
use App\Http\Controllers\Fpanel\UserController;
use App\Http\Controllers\Fpanel\UsersPelanggaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Upanel\BiodataPesertaController;
use App\Http\Controllers\Upanel\DashboardController as UpanelDashboardController;
use App\Http\Controllers\Upanel\PelanggaranController;
use App\Http\Controllers\Upanel\TesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// USER PANEL
Route::middleware(['auth', 'verified', 'role:2', 'pelanggaran'])->group(function () {

    // VALIDASI LINK
    Route::get('/t/{key}', [UpanelDashboardController::class, 'get_link']);

    Route::get('/upanel/dashboard', [UpanelDashboardController::class, 'index'])->name('upanel.dashboard');

    Route::post('/add-peserta', [BiodataPesertaController::class, 'store'])->name('store.biodata');

    Route::get('/upanel/tes', [TesController::class, 'index'])->name('upanel.tes');
    Route::get('/upanel/tes/{slug}/start', [TesController::class, 'starTes'])->name('upanel.tes');
    Route::get('/upanel/tes/{testId}/group/{groupOrder}', [TesController::class, 'showTest'])
        ->name('test.group');
    Route::post('/tests/{testId}/group/{groupOrder}', [TesController::class, 'submitGroupAnswers'])
        ->name('test.submit_group');

    Route::get('/upanel/{slug}/selesai', [TesController::class, 'complete'])->name('tes.selesai');

    // Route::get('/upanel/tes/psikotes', [TesController::class, 'psikotes'])->name('upanel.tes.psikotes');
    // Route::get('/upanel/tes/disc', [TesController::class, 'disc'])->name('upanel.tes.disc');
    Route::get('/upanel/tes/{testId}', [TesController::class, 'disc'])->name('upanel.test.disc');
    Route::post('/upanel/test', [TesController::class, 'submitTest'])->name('disc.submit');


    Route::post('/upanel/pelanggaran', [PelanggaranController::class, 'store']);
    Route::get('/upanel/pelanggaran/show', [PelanggaranController::class, 'show']);
});



Route::middleware(['auth', 'verified', 'role:1'])->group(function () {
    Route::get('/fpanel/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // SETTING
    Route::get('/fpanel/setting/loker_posisi', [SettingController::class, 'loker_posisi'])->name('fpanel.setting.loker_posisi');
    Route::post('/fpanel/setting/loker_posisi', [SettingController::class, 'store_lokpos']);
    Route::post('/fpanel/setting/update_lokpos', [SettingController::class, 'update_lokpos']);
    Route::delete('/fpanel/setting/loker_posisi/destroy/{post}', [SettingController::class, 'destroy_loker_posisi'])->name('fpanel.setting.loker_posisi.destroy');
    Route::get('/fpanel/setting/loker_posisi/{uid}', [SettingController::class, 'detail_lokpos']);

    Route::get('/fpanel/setting/group_soal', [SettingController::class, 'group_soal'])->name('fpanel.setting.group_soal');
    Route::post('/fpanel/setting/group_soal', [SettingController::class, 'store_group_soal']);
    Route::post('/fpanel/setting/update_group_soal', [SettingController::class, 'update_group_soal']);
    Route::delete('/fpanel/setting/group_soal/destroy/{post}', [SettingController::class, 'destroy_group_soal'])->name('fpanel.setting.group_soal.destroy');
    Route::get('/fpanel/setting/group_soal/{uid}', [SettingController::class, 'detail_group_soal']);
    Route::get('/fpanel/setting/get_soal/{uid}', [SettingController::class, 'get_soal']);


    Route::get('/fpanel/setting/kategori_soal', [SettingController::class, 'kategori_soal'])->name('fpanel.setting.kategori_soal');
    Route::post('/fpanel/setting/kategori_soal', [SettingController::class, 'store_soal']);
    Route::post('/fpanel/setting/update_kategori_soal', [SettingController::class, 'update_kategori_soal']);
    Route::delete('/fpanel/setting/kategori_soal/destroy/{post}', [SettingController::class, 'destroy_kategori_soal'])->name('fpanel.setting.kategori_soal.destroy');
    Route::get('/fpanel/setting/kategori_soal/{uid}', [SettingController::class, 'detail_kategori_soal']);


    // PESERTA
    Route::get('/fpanel/peserta', [PesertaController::class, 'index'])->name('fpanel.peserta');
    Route::post('/fpanel/peserta/add', [PesertaController::class, 'store'])->name('fpanel.peserta.add');
    Route::get('/fpanel/peserta/gid/{uid}', [PesertaController::class, 'gid']);
    Route::get('/fpanel/peserta/create-link/{uid}', [PesertaController::class, 'generateLink'])->name('fpanel.peserta.createlink');
    Route::post('/fpanel/peserta/send-url', [PesertaController::class, 'send_url']);
    Route::get('/fpanel/peserta/{uid}', [PesertaController::class, 'detail']);
    Route::post('/fpanel/peserta/update', [PesertaController::class, 'update'])->name('fpanel.peserta.update');
    Route::delete('/fpanel/peserta/destroy/{id}', [PesertaController::class, 'destroy']);

    // SOAL
    Route::get('/fpanel/soal/psikotes', [SoalController::class, 'psikotes'])->name('fpanel.soal.psikotes');
    Route::get('/fpanel/soal/psikotes/add', [SoalController::class, 'create'])->name('fpanel.soal.psikotes.add');
    Route::post('/fpanel/soal/psikotes/add', [SoalController::class, 'store']);
    Route::get('/fpanel/soal/psikotes/edit/{id}', [SoalController::class, 'psikotesEdit'])->name('fpanel.soal.psikotes.edit');

    Route::get('/fpanel/soal/disc', [SoalController::class, 'disc'])->name('fpanel.soal.disc');
    Route::get('/fpanel/soal/disc/add', [SoalController::class, 'create_disc'])->name('fpanel.soal.disc.add');
    Route::post('/fpanel/soal/disc/add', [SoalController::class, 'store_disc']);
    Route::get('/fpanel/soal/disc/edit/{id}', [SoalController::class, 'edit_disc'])->name('fpanel.soal.disc.edit');
    Route::post('/fpanel/soal/disc/update', [SoalController::class, 'update_disc']);
    Route::delete('/fpanel/soal/disc/destroy/{id}', [SoalController::class, 'destroy_disc'])->name('fpanel.hasil.disc.destroy');

    // HASIL
    Route::get('/fpanel/hasil/psikotes', [HasilController::class, 'psikotes'])->name('fpanel.hasil.psikotes');
    Route::get('/fpanel/hasil/psikotes/{id}', [HasilController::class, 'detail']);
    Route::get('/fpanel/hasil/disc', [HasilController::class, 'disc'])->name('fpanel.hasil.disc');
    Route::get('/fpanel/hasil/disc/{id}', [HasilController::class, 'detail_disc']);


    // Users
    Route::get('/fpanel/user', [UserController::class, 'index'])->name('fpanel.user');
    Route::get('/fpanel/user/{id}', [UserController::class, 'detail']);
    Route::post('/fpanel/user', [UserController::class, 'store']);
    Route::delete('/fpanel/user/destroy/{id}', [UserController::class, 'destroy']);
    Route::post('/fpanel/user/update', [UserController::class, 'update']);

    Route::get('/fpanel/pelanggaran', [UsersPelanggaranController::class, 'index'])->name('fpanel.pelanggaran');
    Route::delete('/fpanel/pelanggaran/destroy/{id}', [UsersPelanggaranController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
