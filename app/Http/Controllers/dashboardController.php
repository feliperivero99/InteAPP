<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //

    public function index()
    {
        //
       // dd(session('user')["nickname"]);
        $name = session('user')["nickname"];

        return view('DashboardAdmin.index', compact('name'));
    }

}
