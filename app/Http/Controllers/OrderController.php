<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function destroy(Orders $order)
    {
        DB::beginTransaction();

        try {
            // delete user tool
            foreach ($order->user_tools as $userTool) {
                $userTool->delete();
            }

            $order->delete();

            DB::commit();

            return redirect()->route('user-tools.index')
                ->with('success', 'Deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('user-tools.index')
                ->with('error', 'Failed to delete.');
        }
    }
}
