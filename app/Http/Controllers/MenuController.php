<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Cart;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|file|max:20480',
            'price' => 'required',
            'tag' => 'max:255'
        ]);

        $validData['excerpt'] = Str::limit($request->description, 100, '...');
        $validData['category'] = strtoupper($request->category);

        if ($request->file('image')) {
            $validData['image'] = $request->file('image')->storePublicly('menu_images', 'public');
        }

        Menu::create($validData);

        return redirect('/posts')->with(array(
            'success' => "Succesfully added new menu entry",
            'name' => $request->name,
            'category' => $request->category,
            'tag' => $request->tag
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
        return view('Menu.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
        return view('Menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
        $menu->delete();
        return redirect('/menu')->with('success', "Menu Deleted");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function menu()
    {
        if (Auth::check()) {
            $logged_id = auth()->user()->id;
            $cart = Cart::where('user_id', '=', $logged_id)->get();

            return view('Merch.merch')->with('cart', $cart); //ini ganti
        } else {
            return redirect('/login');
        }
    }

    public function ShowItem($id)
    {
        $menu = Menu::find($id);

        // dd($menu);    
        return view('Merch.merch', compact('menu')); //ini ganti
    }

    public function cart()
    {
        if (Auth::check()) {
            $logged_id = auth()->user()->id;
            $cart = Cart::where('user_id', '=', $logged_id)->get();
            $menus = Menu::all();

            return view('Merch.cart')->with('cart', $cart)->with('menus', $menus); //ganti ini juga
        } else {
            return redirect('/login');
        }
    }

    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $logged_id = auth()->user()->id;
            $carts = Cart::where('user_id', '=', $logged_id)->get();
            $flag = 'false';

            $menu = Menu::find($request->id);

            $price = $menu->price;

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

            return redirect('/cart');
        } else {
            return redirect('/login');
        }
    }
}
