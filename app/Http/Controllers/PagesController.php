<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Models\UserTool;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $data = Tools::when($request->search, function ($q) use ($request) {
            $q->where('title', 'LIKE', '%' . $request->search . '%');
        })->paginate(8);
        return view('pages.frontend.index', compact('data'));
    }

    public function email(Request $request)
    {
        $data = UserTool::where('user_id', 10)->get();

        return view('sendStatusMail', compact('data'));
    }

    public function history()
    {
        $data = UserTool::where('user_id', auth()->user()->id)->get();
        return view('pages.frontend.history', compact('data'));
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
