<?php

namespace App\Http\Controllers\Fpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Dashboard - Fluffy Psikotes'
        ];

        return view('fpanel.dashboard', $data);
    }
}
