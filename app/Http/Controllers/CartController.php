<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

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

            return redirect('/cart');
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
