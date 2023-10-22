<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Menu.checkout');
    }

    public function cart()
    {
        if (Auth::check()) {
            $cart = session('cart');
            return view('Merch.cart')->with('cart', $cart);
        } else {
            return redirect('/login');
        }
    }

    public function order(Request $request)
    {
        if (Auth::check()) {
            $logged_id = auth()->user()->id;

            $user = User::find($logged_id);

            $cart = Cart::where('user_id', '=', $logged_id)->get();

            $total_price = 0;

            foreach ($cart as $key) {
                $menu = Menu::find($key->item_id);
                $menu->save();

                $total_price = $menu->price * $key->qty;

                $order = Order::create([
                    'user_id' => $logged_id,
                    'name' => $user->firstname + " " + $user->lastname,
                    'email' => $user->email,
                    'item_id' => $key->item_id,
                    'quantity' => $key->quantity,
                    'total_price' => $total_price,
                    'add_ons'=> $key->add_ons,
                    'status' => 'Order Placed'
                ]);
            }

            return redirect('/reset-cart');
        } else {
            return redirect('/login');
        }
    }

    public function resetCart()
    {
        if (Auth::check()) {
            $logged_id = auth()->user()->id;

            $user = User::find($logged_id);

            Cart::where('user_id', '=', $logged_id)->delete();

            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function dashboard()
    {
        $menus = Menu::all();
        $orders = Order::all();

        return view('admin.order', [
            'menus' => $menus,
            'orders' => $orders
        ]);
    }

    public function approval($id, $status)
    {
        $order = Order::where('id', $id)->first();
        // dd($order);

        if ($status == "Finished") {
            Order::where('id', $id)->update([
                'status' => 'Finished'
            ]);
        } else {
            Order::where('id', $id)->update([
                'status' => 'Canceled'
            ]);
        }
        return redirect('/dashboard');
    }

    public function showOrder(){
        if (Auth::check()) {
            $logged_id = auth()->user()->id;

            $user = User::find($logged_id);
            $menus = Menu::all();
            $orders = Order::where('user_id', '=', $logged_id)->get();
            return view('Order.orders',[
                'orders'=>$orders,
                'menus'=>$menus
            ]);
        } else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
