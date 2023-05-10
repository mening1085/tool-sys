<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Models\UserTool;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.frontend.cart');
    }

    public function save(Request $request)
    {
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

        // clear cart
        session()->forget('cart');

        return redirect()->route('pages.index')
            ->with('save-success', 'เราได้รับคำสั่งการยืมอุปกรณ์ของคุณแล้ว ทางเราจะติดต่อกลับยัง email ของคุณโดยเร็วที่สุด');
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
}
