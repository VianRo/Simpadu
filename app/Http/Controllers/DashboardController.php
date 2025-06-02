<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = ['nama' => "Raditya", 'foto' => 'avatar.png'];
        return view('dashboard', compact('data'));
    }
    //
}
