@extends('layouts.app')

@section('content')
  <div class="row align-items-center justify-content-center h-100">
    <div class="col-12">
      <div class="card mt-md-3">
        <div class="card-header">
          <div class="row">
            <div class="col text-eft">Product {{$product->product_title}}</div>
            <div class="col text-right">
              <a href="{{ url('/product') }}" class="btn btn-xs btn-dark">
              <i class="fa fa-backspace"></i> Back  
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form> 
          <div class="form-group">
            <label for="#">product_title</label>
            <div class="form-control">{{ $product->product_title }}</div>
          </div>
          <div class="form-group">
            <label for="#">product_slug</label>
            <div class="form-control">{{ $product->product_slug }}</div>
          </div>
          <div class="form-group">
            <label for="#">product_image</label>
            <div class="form-control">{{ $product->product_image }}</div>
          </div>
          <div class="form-group">
            <label for="#">product_price</label>
            <div class="form-control">{{ $product->product_price }}</div>
          </div>
        </form>                    
      </div>
    </div>
  </div>
@endsection