<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $data = Tools::when($request->keyword, function ($q) use ($request) {
            $q->where('title', 'LIKE', '%' . $request->keyword . '%');
        })->paginate(8);
        return view('pages.frontend.index', compact('data'));
    }

    public function success()
    {
        return view('pages.frontend.success');
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
