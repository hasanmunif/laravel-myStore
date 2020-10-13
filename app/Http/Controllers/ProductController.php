<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index()
    {
      $product = Product::orderBy('created_at', 'desc')->get();
      $product = Product::paginate(5);
      return view('product', compact('product'));
    }

    public function showProduct($slug)
    {
      $product = \DB::table('products')->where('product_slug',$slug)->first();
      return view('product.show', compact('product'));
    }
    
    public function tambah()
    {
      return view("product.create");
    }

    public function simpan(Request $request)
    {
      $product = new Product;
      $product->product_title = $request->product_title;
      $product->product_slug =  \Str::slug($request->product_title);
      $product->product_image = $request->product_image;
      $product->product_price = $request->product_price;

      if (Product::where('product_slug', $product->product_slug)->exists()) {
        return redirect('/tambah');
        Toastr::error("The slug can't same",'error');
      } else {
        $product->save();
        Toastr::success('New ' . $request['product_title'] . ' successfully added','Success');
        return redirect('product');
      }

      // cara 2
      // $request->validate([
      //   'product_title' => 'required',
      //   'product_slug' => 'required',
      //   'product_image' => 'required',
      //   'product_price' => 'required',
      // ]);
      // $product::create($request->all());
    }

    public function edit(Product $product)
    {
      $data = $product;
      return view('product.edit', compact('data'));
    }

    public function update(Request $request)
    {
      $data = [
        'id' => $request->id,
        'product_title' => $request->product_title,
        'product_slug' => \Str::slug($request->product_title),
        'product_price' => $request->product_price,
        'product_image' => $request->product_image,
      ];

      if (Product::where('product_slug', \Str::slug($request->product_title))->exists()) {
        $ubah = [
          'id' => $request->id,
          'product_price' => $request->product_price,
          'product_image' => $request->product_image,
        ];
        Product::where('id', $request->id)->update($ubah);
        Toastr::warning('Data ' . $request['product_title'] . ' not changed, but another data is still changed','Warning');
        return redirect('product');
      } else {
        Product::where('id', $request->id)->update($data);
        Toastr::success('Data ' . $request['product_title'] . ' successfully changed','Success');
        return redirect('product');
      }
    }

    public function delete(Product $product)
    {
      $product->delete();
      Toastr::success('Data successfully Delete','Success');
      return redirect('product');
    }
}
