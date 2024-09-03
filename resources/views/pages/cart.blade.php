
  
@extends('base')


@include('components.navbar')

@if(session()->has('success'))
<div class="flex justify-center text-white my-5 bg-green-500 p-2 mx-5">
  <p class=>{{ session('success')}}</p>
</div>
@endif

@section('content')

@if(!isset($datas) || $datas->isEmpty())
<div class='text-center mt-10'>Your cart is currently empty</div>
@else

  @php
    $subtotalAmount = 0;
  @endphp

@foreach($datas as $data)
  @php
    $quantity = $data->quantity ;
    $everyproductprice = $data->productprice * (1 - $data->product_discount/100);
    $totalwithdiscount = $everyproductprice * $quantity ;
    $subtotalAmount += $totalwithdiscount;
  @endphp

<div class="shadow-md m-2">
<div class='flex justify-between my-5 '>
  <div class="font-bold text-2xl ml-7 ">
    <h2>{{$data->productname}}</h2>
  </div>

  <form action="{{ route('cart.remove', $data->product_id)}}" method="post">
    @method('delete')
    @csrf
  <div class='mr-3 border rounded-full'>
    <button type='submit'><i class="fa-solid fa-xmark p-2"></i></button>
  </div>
 </form>
</div>

  <div class='flex justify-around p-2'>
    <div>
    <img class='w-40 h-40' src="{{asset($data->cover)}}" alt="image_product">
    </div>

    <div>
      <div class='uppercase'>
        <p class='ml-4'>quantité</p>

        <div class='flex justify-center'>
           <form action="{{ route('cart.decrease', $data->product_id)}}" method='POST'>
            @csrf
            @method('PUT')
            <button type='submit' class='mr-5 mt-2 bg-gray-100 rounded-full p-2'><i class="fa-solid fa-minus"></i></button>
           </form> 
          
          <input class='w-10 text-center text-xl font-bold mb-2' type='text' name='quantity' value='{{ $data->quantity }}'>
        
            <form action="{{ route('cart.increase', $data->product_id)}}" method='POST'>
              @csrf
              @method('PUT')
              <button type='submit' class='ml-5 mt-2 bg-gray-300 rounded-full p-2'><i class="fa-solid fa-plus"></i></button>
            </form>  
        </div>
      </div>
    </div>

    <div class=''>
      @if($data->product_discount)
      <p class='line-through opacity-50'> {{$data->productprice}} €</p>
        <p class='text-2xl font-bold'>{{$data->productprice * (1 - $data->product_discount/100)}} €</p>
        @else
        <p class='text-2xl font-bold'> {{$data->productprice}} €</p>
      @endif
    </div>

  </div>
</div>
@endforeach
@endif

@if(isset($subtotalAmount))
<div class="m-3 ">Sous-total 
  <span class='font-bold'>{{ $subtotalAmount}} €</span>
</div>
{{-- <div class="bg-amber-400 flex justify-center mx-10 p-1 rounded"> --}}
  <form action="{{route('post.order')}}" method="POST">
    @csrf

    @foreach($datas AS $index => $item)
    <input type="text" name="products[{{ $index }}][product_id]" value="{{ $item->id }}">
    <input type="text" name="products[{{ $index }}][quantity]" value="{{ $item->quantity }}">
    <input type="text" name="products[{{ $index }}][productprice]" value="{{ $item->productprice}}">

    @endforeach


    <input type="text" value='{{$subtotalAmount}}' name='total_amount'>
    <input type="text" value={{ Auth::user()->id}} name='user_id'>
  <button type='submit'>passer la commande</button>
  </form>
  {{-- <a class="" href="{{route('post.order')}}">passer la commande ({{$cartCount}} articles)</a> --}}
{{-- </div> --}}
@endif

@endsection

