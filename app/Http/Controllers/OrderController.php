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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function order()
    {
        if (Auth::check()) {
            $logged_id = auth()->user()->id;

            $user = User::find($logged_id);

            $cart = Cart::where('user_id', '=', $logged_id)->get();

            $total_price = 0;

            foreach ($cart as $key) {
                $menu = Menu::find($key->item_id);
                $menu->save();

                // $total_price = $menu->price * $key->qty;
                $total_price = $key->price * $key->quantity;

                $order = Order::create([
                    'user_id' => $logged_id,
                    'name' => $user->firstname." ".$user->lastname,
                    'email' => $user->email,
                    'item_id' => $key->item_id,
                    'quantity' => $key->quantity,
                    'total_price' => $total_price,
                    'add_ons'=> $key->add_ons,
                    'status' => 'PLACED'
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

            return redirect('/menu');
        } else {
            return redirect('/login');
        }
    }

    public function dashboard(Request $request)
    {
        if (Auth::check()) {
            $logged_id = auth()->user()->id;

            // dd($request);

            $sort = $request->query('sort', 'default_sort'); // 'default_sort' can be any default value you want
            $status = $request->query('status', 'all');

            // Save the selections to the session
            Session::put('sort', $sort);
            Session::put('status', $status);

            $query = Order::query();

            if ($sort == 'earliest') {
                $query->orderBy('id', 'asc');
            } else if ($sort == 'latest') {
                $query->orderBy('id', 'desc');
            } else if ($sort == 'priceup') {
                $query->orderBy('total_price', 'asc');
            } else if ($sort == 'pricedown') {
                $query->orderBy('total_price', 'desc');
            }

            if ($status != 'all') {
                $query->where('status', strtoupper($status));
            }

            $orders = $query->get();

            // dd([$sort, $status]);
            $menus = Menu::all();
            return view('admin.order', [
                'orders' => $orders,
                'menus' => $menus
            ]);
        } else {
            return redirect('/login');
        }
    }

    public function showOrder(Request $request)
    {
        if (Auth::check()) {
            $logged_id = auth()->user()->id;

            // dd($request);

            $sort = $request->query('sort', 'default_sort'); // 'default_sort' can be any default value you want
            $status = $request->query('status', 'all');

            // Save the selections to the session
            Session::put('sort', $sort);
            Session::put('status', $status);

            $query = Order::query();

            $query->where('user_id', $logged_id);

            if ($sort == 'earliest') {
                $query->orderBy('id', 'asc');
            } else if ($sort == 'latest') {
                $query->orderBy('id', 'desc');
            } else if ($sort == 'priceup') {
                $query->orderBy('total_price', 'asc');
            } else if ($sort == 'pricedown') {
                $query->orderBy('total_price', 'desc');
            }

            if ($status != 'all') {
                $query->where('status', strtoupper($status));
            }

            $orders = $query->get();

            // dd([$sort, $status]);
            $menus = Menu::all();
            $carts = Cart::where('user_id', '=', $logged_id)->get();
            return view('user.myorder', [
                'orders' => $orders,
                'menus' => $menus,
                'carts' => $carts
            ]);
        } else {
            return redirect('/login');
        }
    }

    public function changeStatus($id, Request $request)
    {   
        $status = $request->status;
        // $order = Order::where('id', $id)->first();
        // dd($order);
        if($status == "PLACED"){
            Order::where('id', $id)->update([
                'status' => 'PLACED'
            ]);
        }else if ($status == "FINISHED") {
            Order::where('id', $id)->update([
                'status' => 'FINISHED'
            ]);
        } else if ($status == "CANCELLED"){
            Order::where('id', $id)->update([
                'status' => 'CANCELLED'
            ]);
        }
        return Redirect::back();
    }


    public function redirectSuccess(){
        return view('user.placed');
    }
}
