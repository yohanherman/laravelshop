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
          <h4>formulaire de creation</h4>
        </div>

        <div>
            <form action="{{route('post.createProduct')}}" method='POST'>
                @csrf
                <div class="mb-3">
                  <label for="productname" class="form-label">Title</label>
                  <input type="text" name='productname' class="form-control" id="productname" aria-describedby="productnameHelp">
                    @error('productname')
                      <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="text" name='description' class="form-control" id="description">
                    @error('description')
                      <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input name='productprice' type="number" class="form-control" id="productprice">
                    @error('productprice')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="discount" class="form-label">Discount</label>
                  <input  name='product_discount' type="number" class="form-control" id="discount">
                    @error('product_discount')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="Origin" class="form-label">Origin</label>
                  <input type="text" class="form-control" id="origin" name='origin'>
                    @error('origin')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3 d-flex flex-column">
                  <label for="category" class="form-label">Category</label>
                  <select class="form-control" id="category" name='categories_id'>
                      @foreach($categories AS $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>

                </div>
                <div class="mb-3 d-flex flex-column">
                  <label for="availability" class="form-label">availability</label>
                  <select class='form-control' name="status" id="status">
                    <option value="1">disponible</option>
                    <option value="0">rupture</option>
                  </select>
                </div>
                {{-- <div class="mb-3">
                  <label for="cover" class="form-label">Cover</label>
                  <input type="file" class="form-control" id="cover">
                </div> --}}
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>

    </div>
    </section>

@endsection