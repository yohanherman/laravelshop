@extends('admin.layout.layout')
{{-- 
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products by category</h1>
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
            <p class='alert alert-success' role='alert' id='messages'>
             {{session('success')}}
            </p>
          @endif
        </div>
  
        <div class="container-fluid">
          <div class="d-flex justify-content-end m-3">
            <a class=' bg-primary p-1 rounded' href="{{route('form.create')}}">add product</a>
          </div>
  
          @if(!$datas || $datas->isEmpty())
              <div class='d-flex justify-content-center'>
                <p>Your store is currently empty</p>
              </div>
          @else
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
  
          @foreach ($datas as $data)
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>{{$data->productname}}</td>
                <td>{{$data->description}}</td>
                <td>{{$data->productprice}}</td>
                <td>{{$data->origin}}</td>
                <td><img class='w-25 h-25' src={{asset($data->cover)}} alt={{$data->productname}}></td>
                <td>les avis</td>
                <td class='d-flex '>
                  {{-- <form action="{{route('delete.product',$product->id)}}"method='post'>
                      @csrf
                      @method('DELETE')
                    <button type='submit' class="mx-1 bg-danger rounded block border-0 p-1">Delete</button>
                  </form> --}}
                  {{-- <a href='{{route('confirm.deletion',$data->id)}}' class="mx-1 bg-danger rounded block border-0 p-1">delete</a>
                  <a href='{{route('get.updateProduct',$product->id)}}' class="bg-primary p-1 rounded mx-1">Edit</a>
                  <a href='{{route('show.product',$product->id)}}' class="bg-primary p-1 rounded bg-success">view</a>
                </td> --}}
                {{-- <td>les avis</td> --}}
              </tr>
            </tbody>
          @endforeach
          </table>
        </div>
  
        {{-- <nav aria-label="Page navigation example">
          <ul class="pagination">
            @if($datas->previousPageUrl())
             <li class="page-item"><a class="page-link" href="{{$datas->previousPageUrl()}}">Prev</a></li>
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
        </nav> --}}
  
        @endif()
  
    </section>
    


@endsection() --}}