<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
// use App\Http\Controllers\PDF;
use PDF;

class ProductController extends Controller
{
    public function index()
    {
      $product = Product::orderBy('created_at', 'asc')->get();
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
        Toastr::error("The product name has been taken",'error');
        return redirect('/tambah');
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

    public function exportXl()
    {
      return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function exportCSV()
    {
      return Excel::download(new ProductsExport, 'products.csv');
    }

    public function exportPDF()
    {
      // return Excel::download(new ProductsExport, 'products.pdf', 'pdf');
      $product = Product::all();
      $pdf = PDF::loadView('pdf', ['product' => $product]);  
      return $pdf->download('products.pdf');
      // Toastr::success('PDF successfully downloaded','Success');
    }

    public function upload()
    {
      return view('product.uploadData');
    }

    public function uploadData(Request $request)
    {
      Excel::import(new ProductsImport, $request->file('file')->store('temp'));
      return redirect('/product');
      Toastr::success('Data successfully uploaded','Success');
    }
}
