@extends('base')

@include('.components.navbar')

@section('content')


<div class="text-[25px] m-2">
    <a href="{{ route('home.products')}}"><i class="fa-solid fa-arrow-left"></i></a>
</div>
@if(!isset($datas)|| $datas->isEmpty())
<div class="flex justify-center items-center my-5">
    <p class="">No product available for this category </p>
</div>
@else
<div class='grid grid-cols-2 grid-rows-3 mt-10'>
    @foreach( $datas as $data )
    <div class="">
        <a class='relative' href="{{url('/productDetailedpage' , $data->id)}}">
            <div class=" border shadow-lg m-1 rounded-lg ">
                <img src="{{asset($data->cover)}}" alt="{{$data->productname}}">
                <div class="p-2">
                    <p class="text-lg capitalize font-bold">{{ $data->productname }}</p>
                    <p class="p">{{ $data->origin}}</p>
                    <p>ici il y'aura les avis</p>

                    @if(empty($data->product_discount || $data->product_discount === 0))
                        <p class='font-bold'>{{ $data->productprice}} €</p>
                    @else
                    <div class='flex'>
                        <p class='line-through opacity-50 mr-4'>{{ $data->productprice}} €</p>
                        <p class='font-bold'>{{$data->productprice * (1 - $data->product_discount/100) }} €</p>
                    </div>
                    @endif

                </div>

                
                <div class="absolute top-2 right-2">
                    @if($data->product_discount)
                    <p class='bg-red-600 p-2 text-white rounded'>{{$data->product_discount}} % OFF</p>
                    @else
                {{-- <p>discount non dispo</p> --}}
                @endif
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endif()
@endsection()