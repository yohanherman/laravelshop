@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div  class="d-flex justify-content-center align-items-center flex-column">
        <div class="mt-5">
            <h4>Confirmation de suppression</h4>
        </div>
        <div>
            <p class='text-uppercase bg-danger p-1'>Attention la suppression est definitive</p>
        </div>
        <div>
            <p>Product : 
                <span class="">{{$product->productname}}</span>
            </p>
            <form action="{{route('delete.product', $product->id)}}" method='POST'>
                @csrf
                @method('DELETE')
    
                {{-- <input type="hidden" name='id' value='{{$product->id}}'> --}}
                <a class='bg-primary p-1 rounded' href="{{route('get.products')}}">Annuler</a>
                <button class='border-0 rounded ml-2 bg-danger p-1' type="submit">Confirmer</button>
            </form>
        </div>
        </div>
    </section>
  </div>

@endsection()
