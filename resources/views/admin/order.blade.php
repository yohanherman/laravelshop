@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders</h1>
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
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Auteur</th>
            <th scope="col">order_number</th>
            <th scope="col">order_date</th>
            <th scope="col">Total_amount</th>
            <th scope="col">status</th>
            <th scope="col">Action</th>

          </tr>
        </thead>

      @foreach ($orders as $order)
        <tbody>
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$order->name}}</td>
            <td>{{$order->id}}</td>
            <td>{{$order->order_date}}</td>
            <td>{{$order->total_amount}}</td>

            @if($order->status_id == 1)
              <td><p class="text-warning text-uppercase">pending </p></td>
            @elseif($order->status_id == 2)
              <td><p class="text-primary text-uppercase">On delivery</p></td>
            @elseif($order->status_id == 3)
              <td><p class="text-success text-uppercase">Delivered</p></td>
            @endif

            <td>
                <a  class='bg-danger p-2 rounded' href="#">delete</a>
                <a class='bg-info p-2 rounded ml-2' href="{{route('get.order_details', $order->id )}}">show</a>
                <a  class='bg-primary p-2 rounded ml-2' href="{{route('get.orderForm',$order->id)}}">edit</a>
            </td>
       
          </tr>
        </tbody>
      @endforeach

      </table>
    </div>

    {{-- <nav aria-label="Page navigation example">
      <ul class="pagination">
        
        @if($datas->previousPageUrl())
          <li class="page-item"><a class="page-link" href="{{$datas->previousPageUrl() }}">Prev</a></li>
        @endif

        @for ($i = 1; $i <= $datas->lastPage(); $i++)
        <li class="page-item {{ $i == $datas->currentPage() ? 'active' : '' }}">
          <a class="page-link" href="{{ $datas->url($i) }}">{{ $i }}</a>
        </li>
      @endfor

        @if($datas->nextPageUrl())
          <li class="page-item"><a class="page-link" href="{{$datas->nextPageUrl() }}">next</a></li>
        @endif

      </ul>
    </nav> --}}

  </section>

@endsection
