{{View::make('header')}}
{{View::make('navbar')}}
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none m-5 p-1">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              products table
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              <a href="{{url("/products/create")}}" class="btn btn-secondary d-none d-sm-inline-block" >
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Create new products
              </a>
              <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">
                <div class="card">

<div class="table-responsive">
    <table
class="table table-vcenter card-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>category</th>
          <th>Price</th>
          <th>Count</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
          <td >{{$product->name}}</td>
          <td >{{$product->description}}</td>
          <td >{{$product->category}}</td>
          <td >{{$product->price}}</td>
          <td >{{$product->count}}</td>
          <td>
            <div class="btn-group">
                <a href="{{url("products/edit/". $product->id)}}" class="btn btn-success btn-sm">Edit</a>
            <form action="{{url("products/". $product->id)}}" method='POST'>
                @method('delete')
                @csrf
                    <button type='submit' class="btn btn-danger btn-sm">delete</button>
                </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{View::make('footer')}}
