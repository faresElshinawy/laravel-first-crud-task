{{View::make('header')}}
{{View::make('navbar')}}
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none m-5 p-1">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{url("/categories")}}" class="btn btn-secondary d-none d-sm-inline-block" >
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->                back to categories
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
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                              <li>
                                  {{$error}}
                              </li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                      <div class="card">
                                      <form action="{{url("categories")}}" method="POST" >
                                          @csrf
                                          <div class="m-3 ">
                                              <input type="text" class="form-control" name='name' placeholder="Category name">
                                          </div>
                                          <div class="m-3">
                                           <button class="btn btn-dark">submit</button>
                                        </div>
                                      </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

{{View::make('footer')}}
