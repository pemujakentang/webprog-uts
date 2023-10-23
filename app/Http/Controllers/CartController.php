<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function removeFromCart($cart_id)
    {
        if (Auth::check()) {
            Cart::where('id', $cart_id)->delete();

            return Redirect::back();
        } else {
            return redirect('/login');
        }
    }

    public function checkout(Request $request)
    {

        if (Auth::check()) {
            $logged_id = auth()->user()->id;
            $cart = Cart::where('user_id', $logged_id)->get();

            $menus = Menu::all();

            return view('Merch.checkout', [ //ini ganti
                'cart' => $cart,
                'menus' => $menus
            ]);
        } else {
            return redirect('/login');
        }
    }

    public function dashboard()
    {
        $menus = Menu::all();
        $orders = Order::all();

        return view('Merch.dashboard', [ //ganti ini
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

    public function editCartView($id)
    {
        if (Auth::check()) {
            $logged_id = auth()->user()->id;
            $carts = Cart::where('user_id', '=', $logged_id)->get();
            $menus = Menu::all();
            $cart = Cart::find($id);

            return view('user.editcart', ['cart' => $cart, 'menus' => $menus, 'carts'=>$carts]);
        } else {
            return redirect('/login');
        }
        // dd($cart->item_id);
        
    }

    public function editCart(Request $request)
    {
        if (Auth::check()) {
            // dd($request);
            

            return Redirect::back();
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
