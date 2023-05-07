<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Models\UserTools;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserToolsController extends Controller
{
    public function index()
    {
        $data = Tools::latest()->paginate(5);
        return view('pages.tools.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('pages.tools.create');
    }

    public function store(Request $request)
    {

        return redirect()->route('tools.index')
            ->with('success', 'Created successfully.');
    }

    public function show(Tools $userTool)
    {
    }

    public function edit(Tools $userTool)
    {
        return view('pages.tools.edit', compact('tools'));
    }

    public function update(Request $request, Tools $userTool)
    {
        return redirect()->route('tools.index')
            ->with('success', 'Updated successfully.');
    }

    public function destroy(Tools $userTool)
    {
        $userTool->delete();

        return redirect()->route('tools.index')
            ->with('success', 'Deleted successfully.');
    }
}
