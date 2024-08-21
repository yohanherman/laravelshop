@extends('admin.layout.layout')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">

      <div>
        @if(session()->has('success'))
          <p>{{session('success')}}</p>
        @endif
      </div>

      <div class="container-fluid">
        <div class="d-flex justify-content-end m-3">
          <a class=' bg-primary p-1 rounded' href="{{route('form.create')}}">add product</a>
        </div>
        <table class="table table-dark table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">Description</th>
              <th scope="col">price</th>
              <th scope="col">Origin</th>
              <th scope="col">Cover</th>
              <th scope="col">Avis</th>
              <th scope="col">Action</th>

            </tr>
          </thead>

        @foreach ($products as $product)
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>{{$product->productname}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->productprice}}</td>
              <td>{{$product->origin}}</td>
              <td><img src={{$product->cover}} alt={{$product->productname}}></td>
              <td>les avis</td>
              <td class=''><a class="mx-1 bg-danger p-1 rounded">Delete</a><a class="bg-primary p-1 rounded mx-1">Edit</a><a href='' class="bg-primary p-1 rounded bg-success">See</a></td>
              {{-- <td>les avis</td> --}}
            </tr>
          </tbody>
        @endforeach

        </table>
      </div>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          @if($products->previousPageUrl())
           <li class="page-item"><a class="page-link" href="{{$products->previousPageUrl()}}">Prev</a></li>
          @endif


          @for ( $i=1; $i <= $products->lastPage(); $i ++)
            <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
               <a class="page-link" href="{{ $products->url($i)}}">{{ $i }}</a>
            </li>
          @endfor

          @if($products->nextPageUrl())
           <li class="page-item"><a class="page-link" href="{{$products->nextPageUrl()}}">next</a></li>
          @endif
        </ul>
      </nav>

    </section>

  </div>

@endsection