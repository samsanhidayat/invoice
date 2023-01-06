<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slide::all();
        $trendingProduct = Product::where('trending', '1')->latest()->take(10)->get();
        return view('frontend.index', compact('sliders', 'trendingProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        return view('frontend.product.index', [
            'title' => 'Our Product',
        ]);
    }

    public function featuredProduct()
    {
        $featured = Product::where('featured', '1')->latest()->get();
        return view('frontend.pages.featured', compact('featured'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function productView(Product $product)
    {
        return view('frontend.product.view', compact('product'));
    }
    // public function searchProduct(Request $request)
    // {
    //     if ($request->cari) {
    //         $product = Product::where('name_product', 'LIKE', '%' . $request->cari . '%')->get();
    //     } elseif ($request->high) {
    //         $product = Product::orderBy('price_product', 'DESC')->get();
    //     } elseif ($request->low) {
    //         $product = Product::orderBy('price_product', 'ASC')->get();
    //     } else {

    //         $product = Product::all();
    //     }
    //     return view('frontend.product.index')->with([
    //         'title' => 'Our Product',
    //         'products' => $product
    //     ]);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}