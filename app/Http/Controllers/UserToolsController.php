<?php

namespace App\Http\Controllers;

use App\Mail\SendStatusMail;
use App\Models\Orders;
use App\Models\Tools;
use App\Models\User;
use App\Models\UserTool;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserToolsController extends Controller
{
    public function index()
    {
        // get orders
        $data = Orders::paginate(4);

        return view('pages.user-tools.index', compact('data'));
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

    public function updateStatus(Request $request)
    {
        DB::beginTransaction();

        try {
            Orders::where('id', $request->order_id)
                ->update([
                    'status' => $request->status,
                    'note' => $request->message,
                    'updated_at' => Carbon::now(),
                ]);

            // send email
            $mailData = [
                'tool' => Tools::where('id', $request->tool_id)->first(),
                'status' => $request->status,
                'reason' => $request->message,
                'data' => UserTool::where('order_id', $request->order_id)->get()
            ];

            $user = User::where('id', $request->user_id)->first();

            Mail::to($user->email)->send(new SendStatusMail($mailData));

            DB::commit();

            return redirect()->route('user-tools.index')
                ->with('success', 'Updated status successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('user-tools.index')
                ->with('error', 'Updated status failed.' . $e->getMessage());
        }
    }
}
