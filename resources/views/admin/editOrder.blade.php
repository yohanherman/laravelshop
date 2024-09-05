@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h4>Formulaire de modification</h4>
      </div>

      <div>
        <form action="{{route('edit.status',$orders->id)}}" method='POST' enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
              <label for="name" class="form-label">Auteur</label>
              <input type="text" name='name' class="form-control" id="name" aria-describedby="productnameHelp" value='{{$orders->name}}' readonly>
            </div>
            <div class="mb-3">
              <label for="total_amount" class="form-label">Total Amount</label>
              <input type="text" name='total_amount' class="form-control" id="total_amount" name='total_amount' value='{{$orders->total_amount}}' readonly>
            </div>
            <div class="mb-3">
              <label for="order_date" class="form-label">Order_date</label>
              <input name='order_date' type="text" class="form-control" id="order_date" value='{{$orders->order_date}}' readonly>
            </div>
           
             <div class="mb-3">
                <label for="status_id">Status</label>
                <select class="w-100 p-2 rounded" name="status_id" id="status_id">
                    @foreach($status AS $statusItem)
                        <option value="{{$statusItem->id}}">{{$statusItem->title}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary block m-2">Save</button>
        </form>
      </div>

    </section>
  </div>

@endsection