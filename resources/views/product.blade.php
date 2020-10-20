<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ _('Product') }}
    </h2>
  </x-slot>
  <div class="container-fluid">
    <div class="row align-items-center justify-content-center h-100">
      <div class="col-11 mt-2">
        <div class="card">
          <div class="card-header border-0">
            <div class="card-tools">
              <a href="{{ url('tambah') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
                Create new Data
              </a>
              <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              {{-- <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> --}}
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
                  <td class="text-md-center">Rp. {{ number_format($pr->product_price,2,",",".") }}</td>
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
            {{-- <br>
            <caption><i>*Harga dapat berubah sewaktu-waktu</i></caption>
            <br> --}}
            {{ $product->links() }}
          </div>
          <div class="card-footer border-0">
            <div class="row">
              <div class="col-6 text-left">
                <button class="btn btn-outline-info ">
                  <a href="/" rel="noopener noreferrer">
                    <i class="fas fa-arrow-circle-left"></i>
                    back to home
                  </a>
                </button>
              </div>
              <div class="col-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                  <i class="fas fa-file-download"></i>
                  Export
                </button>
                <a href="{{ url('upload') }}" class="btn btn-success">
                  <i class="fas fa-file-upload"></i>
                  uplaod
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Download</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <div class="col-12">
            <button class="btn btn-outline-warning">
              <a href="/product/export/xlsx">
                xlsx
              </a>
            </button>
            <button class="btn btn-outline-primary">
              <a href="/product/export/csv">
                csv
              </a>
            </button>
            <button class="btn btn-outline-success">
              <a href="/product/export/pdf">
                pdf
              </a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>