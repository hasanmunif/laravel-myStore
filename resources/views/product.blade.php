@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="card">
      <div class="card-header border-0">
        <h3 class="card-title">
          <i class="fas fa-th mr-1"></i>
          Laptop 
        </h3>
        <div class="card-tools">
            <a href="{{ url('tambah') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i>
            Create new Data
          </a>
          <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-hover table-bordered">
          <tr class="bg-light">
            <th class="text-md-center">NO</th>
            <th class="text-md-center">Product</th>
            <!-- <th class="text-md-center">Slug</th> -->
            <!-- <th class="text-md-center">Image</th> -->
            <th class="text-md-center">Price</th>
            <th width="280px" class="text-md-center">Action</th>
          </tr>
          @forelse ($product as $pr)
          <tr>
              <td class="text-md-center">{{ $loop->iteration }}</td>
              <td class="text-md-center">{{ $pr->product_title }}</td>
              <!-- <td class="text-md-center">{{ $pr->product_slug }}</td>  -->
              <!-- <td class="text-md-center">{{ $pr->product_image }}</td> -->
              <td class="text-md-center">Rp. {{ $pr->product_price }}</td>
              <td class="text-md-center">
                <form action="/product/delete/{{ $pr->product_slug }}" method="post">
                  <a href="{{ url('/product', $pr->product_slug) }}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i>
                  </a>
                  <a href="/product/edit/{{ $pr->product_slug }}" class="btn btn-warning">
                    <i class="fas fa-pen-square"></i>
                  </a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
          </tr>    
          @empty
            <tr>
              <td colspan="8" class="text-center">No Data</td>
            </tr>
          @endforelse
        </table>
        <br>
        <caption><i>*Harga dapat berubah sewaktu-waktu</i></caption>
        <br>
        {{ $product->links() }}
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col">
            <button class="btn btn-outline-info justify-content-end">
              <a href="/" rel="noopener noreferrer">
                <i class="fas fa-arrow-circle-left"></i>
                back to home
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>  
  </div>
@endsection
