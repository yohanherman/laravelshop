@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order details</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">quantity</th>
            {{-- <th scope="col">Cover</th> --}}
            <th scope="col">order_number</th>
          </tr>
        </thead>

      @foreach ($order_details as $order_detail)
        <tbody>
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$order_detail->productname}}</td>
            <td>{{$order_detail->productprice}}</td>
            <td>{{$order_detail->quantity}}</td>
            <td>{{$order_detail->order_id}}</td>
            {{-- <td><a href="">delete</a> --}}
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
