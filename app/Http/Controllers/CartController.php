<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Tools;
use App\Models\UserTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.frontend.cart');
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        try {
            $cart = session()->get('cart', []);
            $user = auth()->user();

            if (!$cart) {
                return redirect()->route('pages.index')
                    ->with('save-error', 'ไม่มีอุปกรณ์ที่คุณต้องการยืม');
            }

            foreach ($cart as $item) {
                UserTool::create([
                    'user_id' => $user->id,
                    'tool_id' => $item['id'],
                    'qty' => $item['qty']
                ]);

                // update tool qty
                $tool = Tools::find($item['id']);
                $tool->qty -= $item['qty'];
                $tool->save();
            }


            // send email
            $userTools = UserTool::where('user_id', $user->id)->get();
            $mailData = [
                'user' => $user,
                'data' => $userTools
            ];
            Mail::to($user->email)->send(new SendMail($mailData));

            // clear cart
            session()->forget('cart');

            DB::commit();

            return redirect()->route('pages.index')
                ->with('save-success', 'เราได้รับคำสั่งการยืมอุปกรณ์ของคุณแล้ว ทางเราจะติดต่อกลับยัง email ของคุณโดยเร็วที่สุด');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('pages.index')
                ->with('save-error', 'ไม่สามารถยืมอุปกรณ์ได้');
        }
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $request->qty;
        } else {
            $cart[$id] = [
                "id" => $id,
                "title" => $request->title,
                "qty" => $request->qty,
                "image" => $request->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->qty) {
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->qty;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function returnTool(UserTool $userTool)
    {
        DB::beginTransaction();

        try {
            // update tool qty
            $tool = Tools::find($userTool->tool_id);
            $tool->qty += $userTool->qty;
            $tool->save();

            // delete user tool
            $userTool->delete();

            DB::commit();
            session()->flash('return-success', 'คืนอุปกรณ์เรียบร้อยแล้ว');
            return response()->json(
                [
                    'success' => true,
                    'message' => 'คืนอุปกรณ์เรียบร้อยแล้ว'
                ]
            );
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('return-error', 'ไม่สามารถคืนอุปกรณ์ได้');
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ไม่สามารถคืนอุปกรณ์ได้'
                ]
            );
        }
    }

    public function returnToolAll()
    {
        DB::beginTransaction();

        try {
            $user = auth()->user();
            $userTools = UserTool::where('user_id', $user->id)->get();

            foreach ($userTools as $userTool) {
                // update tool qty
                $tool = Tools::find($userTool->tool_id);
                $tool->qty += $userTool->qty;
                $tool->save();

                // delete user tool
                $userTool->delete();
            }

            DB::commit();
            session()->flash('return-success', 'คืนอุปกรณ์เรียบร้อยแล้ว');
            return response()->json(
                [
                    'success' => true,
                    'message' => 'คืนอุปกรณ์เรียบร้อยแล้ว'
                ]
            );
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('return-error', 'ไม่สามารถคืนอุปกรณ์ได้');
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ไม่สามารถคืนอุปกรณ์ได้'
                ]
            );
        }
    }
}
