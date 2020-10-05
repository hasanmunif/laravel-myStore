@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="card bg-info">
      <div class="card-header border-0">
        <h3 class="card-title">
          <i class="fas fa-th mr-1"></i>
          Laptop 
        </h3>
        <div class="card-tools">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            <i class="fas fa-plus-circle"></i>
            Create new Data
            @yield('modal')
          </button>
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
            <th class="text-md-center">Slug</th>
            <th class="text-md-center">Image</th>
            <th class="text-md-center">Price</th>
            <th width="280px" class="text-md-center">Action</th>
          </tr>
          @forelse ($product as $pr)
          <tr>
              <td class="text-md-center">{{ $loop->iteration }}</td>
              <td class="text-md-center">{{ $pr->product_title }}</td>
              <td class="text-md-center">{{ $pr->product_slug }}</td> 
              <td class="text-md-center">{{ $pr->product_image }}</td>
              <td class="text-md-center">{{ $pr->product_price }}</td>
              <td class="text-md-center">
                <form action="{{ route('product.destroy', $pr->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <a href="{{ route('product.show', $pr->product_slug) }}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i>
                  </a>
                  <a href="{{ route('product.edit', $pr->product_slug) }}" class="btn btn-warning">
                    <i class="fas fa-pen-square"></i>
                  </a>
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
      </div>
      <div class="row">
        <div class="col d-flex justify-content-right">
          <button class="btn btn-outline-info">
            <a href="/" rel="noopener noreferrer">
              <i class="fas fa-arrow-circle-left"></i>
              back to home
            </a>
          </button>
        </div>
      </div>
    </div>  
  </div>
@endsection
