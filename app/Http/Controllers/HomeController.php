<?php

namespace App\Http\Controllers;

use App\Models\ShopCategory;
use App\Models\ShopProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = ShopCategory::getCategoryArray();

        return view('home', compact('categories'));
    }
}
