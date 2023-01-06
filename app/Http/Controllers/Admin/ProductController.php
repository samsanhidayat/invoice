<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = DB::table('products')->select(DB::raw('max(kode_product)as kode'));
        $kd = "";
        if ($kode->count() > 0) {
            foreach ($kode->get() as $kda) {
                $k = ((int)$kda->kode) + 1;
                $kd = sprintf("%04s", $k);
            }
        } else {
            $kd = "0001";
        }
        return view('admin.product.add_product', compact('kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $validateData = $request->validated();

        $product = Product::create([
            'kode_product' => $validateData['kode'],
            'name_product' => $validateData['name'],
            'description_product' => $validateData['desc'],
            'jml_product' => $validateData['jml'],
            'price_product' => $validateData['price'],
            'trending' => $request->trending == true ? '1' : '0',
            'featured' => $request->featured == true ? '1' : '0'
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            foreach ($request->file('image') as $imageFile) {
                $fileName = time() . $imageFile->hashName();
                $imageFile->move($uploadPath, $fileName);

                $product->productImage()->create([
                    'product_id' => $product->id,
                    'image' => $fileName
                ]);
            }
        }
        return redirect('admin/product')->with('message', 'Data Berhasil Di Tambahkan');
    }

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
    public function edit(Product $product)
    {
        return view('admin.product.edit_product')->with([
            'title' => 'Update Data Product',
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $validateData = $request->validated();
        if ($product) {
            $product->update([
                'kode_product' => $validateData['kode'],
                'name_product' => $validateData['name'],
                'description_product' => $validateData['desc'],
                'jml_product' => $validateData['jml'],
                'price_product' => $validateData['price'],
                'trending' => $request->trending == true ? '1' : '0',
                'featured' => $request->featured == true ? '1' : '0'
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';

                foreach ($request->file('image') as $imageFile) {
                    $fileName = time() . $imageFile->hashName();
                    $imageFile->move($uploadPath, $fileName);

                    $product->productImage()->create([
                        'product_id' => $product->id,
                        'image' => $fileName
                    ]);
                }
            }
            return redirect('admin/product')->with('message', 'Data Berhasil Di Update');
        } else {
            return redirect('admin/product')->with('message', 'Tidak Ada Product Yang Di Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->productImage) {
            foreach ($product->productImage as $image) {
                if (File::exists('uploads/products/' . $image->image)) {
                    File::delete('uploads/products/' . $image->image);
                }
            }
        }
        $product->delete();
        return redirect('admin/product')->withErrors('message', 'Data Berhasil Di Hapus');
    }

    public function destroyImage($product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists('uploads/products/' . $productImage->image)) {
            File::delete('uploads/products/' . $productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Berhasil Di Hapus');
    }
}