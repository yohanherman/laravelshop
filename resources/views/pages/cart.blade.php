
  
@extends('base')


@include('components.navbar')

@if(session()->has('success'))
<div>
  {{ session('success')}}
</div>
@endif


@section('content')

@if(!isset($datas) || $datas->isEmpty())
  <div class='text-center mt-10'>Your cart is currently empty</div>
@else

@foreach($datas as $data)
<div class="shadow-md m-2">
<div class='flex justify-between my-5'>
  <div class="font-bold text-2xl ml-7">
    <h2>{{$data->productname}}</h2>
  </div>

    {{-- <p>je suis l'identifiant {{$data->product_id}}</p> --}}
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
    <img class='w-40 h-40' src="/images/basket1.jpg" alt="image_product">
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

      <div class='uppercase mt-2'>
        <p class='ml-4'>Taille</p>
        <p class='ml-5 border rounded-lg p-1'>{{$data->taille}} 
      </div>

      <div>
        @if($data->status ===1)
        <p class="text-green-500 ml-5 my-2">en stock</p>
        @else
        <p class='text-green-500'>rupture</p>
        @endif
      </div>

    </div>

    <div class='font-bold'>
      <p class='text-2xl'> {{$data->productprice}} €</p>
    </div>

    {{-- <p>{{$data->name}}  --}}
  </div>
</div>
@endforeach
@endif

<p>total : {{$total}} €</p>


@endsection

