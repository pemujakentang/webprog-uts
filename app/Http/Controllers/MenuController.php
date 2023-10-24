<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Cart;
use App\Models\Order;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menu = Menu::all();
        return view("Menu.index", [
            'menu' => $menu
        ]);
    }

    public function home()
    {
        //
        $menu = Menu::all();
        return view("Home.index", [
            'menu' => $menu
        ]);
    }

    public function dashboard(Request $request)
    {
        $selectedSort = $request->query('sort', 'default_sort'); // 'default_sort' can be any default value you want
        $selectedCat = $request->query('category', 'all');

        // Save the selections to the session
        Session::put('sort', $selectedSort);
        Session::put('category', $selectedCat);

        $query = Menu::query();

        if ($selectedSort == 'a-z') {
            $query->orderBy('name', 'asc');
        } else if ($selectedSort == 'z-a') {
            $query->orderBy('name', 'desc');
        } else if ($selectedSort == 'priceup') {
            $query->orderBy('price', 'asc');
        } else if ($selectedSort == 'pricedown') {
            $query->orderBy('price', 'desc');
        }

        if ($selectedCat != 'all') {
            $query->where('category', $selectedCat);
        }

        $menus = $query->get();
        $orders = Order::all();

        return view('admin.dashboard', [
            'menus' => $menus,
            'order' => $orders
        ]);
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
    public function store(Request $request)
    {
        //
        if (Auth::check()) {
            $user = auth()->user();

            if ($user->role !== 'admin'
            ) {
                return redirect('/');
            }

            $validData = $request->validate([
                'name' => 'required|max:255',
                'slug' => 'required|unique:menus',
                'category' => 'required|max:255',
                'description' => '',
                'image' => 'required|image|file|max:20480',
                'price' => 'required',
                'tag' => 'max:255'
            ]);

            $validData['excerpt'] = Str::limit($request->description, 100, '...');
            $validData['category'] = strtoupper($request->category);
            $validData['order_count'] = 0;

            if ($request->file('image')) {
                $validData['image'] = $request->file('image')->storePublicly('menu_images', 'public');
            }

            Menu::create($validData);

            return redirect('/admin/dashboard')->with(array(
                'success' => "Succesfully added new menu entry",
                'name' => $request->name,
                'kategori' => $request->category,
                'tag' => $request->tag
            ));
        } else {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
        if (Auth::check()) {
            $logged_id = auth()->user()->id;
            $cart = Cart::where('user_id', '=', $logged_id)->get();
            $menus = Menu::all();

            return view('user.showmenu', ['menu' => $menu, 'menus' =>$menus, 'cart' => $cart]);
        } else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
        return view('admin.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
        if (Auth::check()) {
            $user = auth()->user();

            if ($user->role !== 'admin'
            ) {
                return redirect('/');
            }

            $rules = [
                'name' => 'required|max:255',
                'category' => 'required|max:255',
                'description' => '',
                'image' => 'image|file|max:20480',
                'price' => 'required',
                'tag' => 'max:255'
            ];

            if ($request->slug != $menu->slug) {
                $rules['slug'] = 'required|unique:menus';
            }

            $validData = $request->validate($rules);

            $validData['excerpt'] = Str::limit($request->description, 100, '...');
            $validData['category'] = strtoupper($request->category);

            if ($request->file('image')) {
                if ($request->old_image) {
                    Storage::delete($request->old_image);
                }
                $validData['image'] = $request->file('image')->storePublicly('menu_images', 'public');
            }

            Menu::where('id', $menu->id)->update($validData);

            return redirect('/admin/dashboard')->with('success', "Menu updated.");
        } else {
            return redirect('/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
        if (Auth::check()) {
            $user = auth()->user();

            if ($user->role !== 'admin'
            ) {
                return redirect('/');
            }

            $menu->delete();
            return redirect('/admin/dashboard')->with('success', "Menu Deleted");
        } else {
            return redirect('/login');
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function menu()
    {
        if (Auth::check()) {
            $user = auth()->user();

            if ($user->role !== 'admin') {
                return redirect('/');
            }

            $logged_id = $user->id;
            $cart = Cart::where('user_id', $logged_id)->get();

            return view('Merch.merch')->with('cart', $cart);
        } else {
            return redirect('/login');
        }
    }

    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            // dd($request);
            $logged_id = auth()->user()->id;
            $carts = Cart::where('user_id', '=', $logged_id)->get();
            $flag = 'false';

            $price = $request->total_price;

            if (isset($carts[0])) {
                foreach ($carts as $cart) {
                    if ($cart->item_id == $request->id) {
                        if ($cart->add_ons == $request->add_ons) {
                            $new_quantity = $cart->quantity + $request->quantity;
                            $cart->update(['quantity' => $new_quantity]);
                            $flag = 'true';
                        }
                    }
                }
                if ($flag == 'false') {
                    Cart::create([
                        'user_id' => $logged_id,
                        'item_id' => $request->id,
                        'quantity' => $request->quantity,
                        'add_ons' => $request->add_ons,
                        'price' => $price
                    ]);
                }
            } else {
                Cart::create([
                    'user_id' => $logged_id,
                    'item_id' => $request->id,
                    'quantity' => $request->quantity,
                    'add_ons' => $request->add_ons,
                    'price' => $price
                ]);
            }

            return Redirect::back();
        } else {
            return redirect('/login');
        }
    }

    public function editCartView($cart_id){
        $menus = Menu::all();
        $cart = Cart::find($cart_id);
        return view('user.editcart', ['cart'=>$cart, 'menus'=>$menus]);
    }

    public function editCart(Request $request)
    {
        if (Auth::check()) {
            // dd($request);
            $logged_id = auth()->user()->id;
            $carts = Cart::where('user_id', '=', $logged_id)->get();
            $flag = 'false';

            $menu = Menu::find($request->id);

            $price = $request->total_price;

            if (isset($carts[0])) {
                foreach ($carts as $cart) {
                    if ($cart->item_id == $request->id) {
                        if ($cart->add_ons == $request->add_ons) {
                            $new_quantity = $cart->quantity + 1;
                            $cart->update(['quantity' => $new_quantity]);
                            $flag = 'true';
                        }
                    }
                }
                if ($flag == 'false') {
                    Cart::create([
                        'user_id' => $logged_id,
                        'item_id' => $request->id,
                        'quantity' => $request->quantity,
                        'add_ons' => $request->add_ons,
                        'price' => $price
                    ]);
                }
            } else {
                Cart::create([
                    'user_id' => $logged_id,
                    'item_id' => $request->id,
                    'quantity' => $request->quantity,
                    'add_ons' => $request->add_ons,
                    'price' => $price
                ]);
            }

            return Redirect::back();
        } else {
            return redirect('/login');
        }
    }

    public function sortAndCatRedundant2(Request $request)
    {
        $selectedSort = $request->selectedSort;
        $selectedCat = $request->selectedCat;

        $query = Menu::query();

        if ($selectedSort == 'a-z') {
            $query->orderBy('name', 'asc');
        } else if ($selectedSort == 'z-a') {
            $query->orderBy('name', 'desc');
        } else if ($selectedSort == 'priceup') {
            $query->orderBy('price', 'asc');
        } else if ($selectedSort == 'pricedown') {
            $query->orderBy('price', 'desc');
        }

        if ($selectedCat != 'all') {
            $query->where('category', $selectedCat);
        }

        $menus = $query->get();

        return redirect('/admin/dashboard/add');

        // return $menus;
    }

    public function sortAndCatRedundant(Request $request)
    {
        $selectedSort = $request->selectedSort;
        $selectedCat = $request->selectedCat;
        // $selectedSort = $request->input('sort');
        // $selectedCategory = $request->input('category');

        // return [$selectedSort, $selectedCat];

        // $menu = Menu::all()->where('category', '=', 'SIDES');
        $menu = Menu::all();
        $sorted = $menu->sortBy('price');
        return [$menu, $sorted];

        if ($selectedSort == 'a-z') {
            $sorted = $menu->sortBy(['name', 'asc']);
        } else if ($selectedSort == 'z-a') {
            $sorted = $menu->sortBy(['name', 'desc']);
        } else if ($selectedSort == 'priceup') {
            $sorted = $menu->sortBy(['price', 'asc']);
        } else if ($selectedSort == 'pricedown') {
            $sorted = $menu->sortBy(['price', 'desc']);
        }

        return $sorted;

        if ($selectedCat == 'pizza') {
            $sorted = $sorted->where('category', '=', 'PIZZA');
        } else if ($selectedCat == 'pasta') {
            $sorted = $sorted->where('category', '=', 'PASTA');
        } else if ($selectedCat == 'sides') {
            $sorted = $sorted->where('category', '=', 'SIDES');
        } else if ($selectedCat == 'drink') {
            $sorted = $sorted->where('category', '=', 'DRINK');
        } else {
            $sorted = $menu;
        }

        $menus = $sorted;
        return view('admin.dashboard', ['menus' => $menus]);
    }
}
