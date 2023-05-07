<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.frontend.index');
    }

    public function dashboard()
    {
        return view('pages.home');
    }

    public function tools()
    {
        return view('pages.tools');
    }

    public function toolManagement()
    {
        return view('pages.tool-management');
    }

    public function tables()
    {
        return view('components.tables');
    }

    public function forms()
    {
        return view('components.forms');
    }

    public function tabs()
    {
        return view('components.tabs');
    }

    public function calendar()
    {
        return view('components.calendar');
    }
}
