<?php

namespace App\Http\Controllers;

use App\Mail\SendStatusMail;
use App\Models\Tools;
use App\Models\UserTool;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserToolsController extends Controller
{
    public function index()
    {
        $data = UserTool::with(['tool', 'user'])->latest()->paginate(5);

        return view('pages.user-tools.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('pages.user-tools.create');
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
        return view('pages.user-tools.edit', compact('tools'));
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

    public function updateStatus(Request $request, UserTool $userTool)
    {
        DB::beginTransaction();

        try {
            $userTool->update([
                'status' => $request->status,
                'message' => $request->message
            ]);

            // send email
            // $mailData = [
            //     'subject' => 'Mail from ItSolutionStuff.com',
            //     'user' =>  $userTool->user,
            //     'tool' => $userTool->tool,
            // ];

            // Mail::to($userTool->user->email)->send(new SendStatusMail($mailData));

            DB::commit();

            return redirect()->route('user-tools.index')
                ->with('success', 'Updated status successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('user-tools.index')
                ->with('error', 'Updated status failed.');
        }
    }
}