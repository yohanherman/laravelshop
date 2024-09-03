@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cart</h1>
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
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">Cover</th>
            <th scope="col">Auteur</th>
            <th scope="col">Action</th>

          </tr>
        </thead>

      @foreach ($datas as $data)
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>{{$data->productname}}</td>
            <td>{{$data->productprice}}</td>
            <td class=""><img class="" src={{asset($data->cover)}} alt={{$data->productname}}></td>
            <td>{{$data->name}}</td>
            <td><a href="">delete</a>
            {{-- <td>les avis</td> --}}
          </tr>
        </tbody>
      @endforeach

      </table>
    </div>

    <nav aria-label="Page navigation example">
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
    </nav>

  </section>



@endsection