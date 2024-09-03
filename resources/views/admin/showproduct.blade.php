@extends('admin.layout.layout')

@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
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
      <div class="container-fluid">
        <div>
            <div class="my-3 mx-2">
              <h4>{{$product->productname}}</h4>
            </div>
          <div class="d-flex">
             <img class="" src="{{asset($product->cover)}}" alt="{{$product->productname}}"> 
          </div>


          @foreach($images AS $image)
          <img src="{{asset('images/'.$image->imageCover)}}" alt="image">
         @endforeach


          <div class="m-1">
            <p>Price : {{$product->productprice}}€</p>
            <p>Description : {{$product->description}}</p>
            <p>produit venu : {{$product->origin}}</p>
            @if($product->product_discount)
              <p>discount_rate : {{$product->product_discount}} OFF</p>
            @else
              <p> discount_rate : no discount</p>
            @endif
            @if($product->status == 1)
              <p class="text-success"> Product in stock</p>
            @else
              <p class="text-danger">Product non available</p>
            @endif

          </div>
        </div>
      </div>
    </section>




@endsection