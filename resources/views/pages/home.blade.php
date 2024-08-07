@extends('base')
    
@include('components.navbar')

@section('content')

<img class='w-full opacity-75' src="images/coverimage.jpg" alt="cover">

<div class="flex justify-center items-center my-4">
    <h3 class="font-bold">Categories</h3>
</div>

<div class="flex justify-center items-center flex-wrap ">
    @foreach ($categories as  $category) 
       <div class=''>
          <div class="m-2 w-auto">
            <a href="#"><img class='w-10 rounded-xl m-auto' src="/images/{{$category->categories_cover}}" alt="image_category"></a>
            <p class='text-center'> {{ $category->name}}</p>
          </div>
       </div>
     @endforeach
</div>


    <div class='grid grid-cols-2 grid-rows-3 mt-10 md:flex '>
        @foreach( $randomProducts as $randomProduct )
            <a class='relative' href="{{url('/productDetailedpage' , $randomProduct->id)}}">
                <div class=" border shadow-lg m-1 rounded-lg">
                    <img src="/images/{{$randomProduct->cover}}" alt="cover">
                    <div class="p-2">
                        <p class="text-lg capitalize">{{ $randomProduct->productname }}</p>
                        <p class="p">{{ $randomProduct->origin}}</p>
                        <p>ici il y'aura les avis</p>

                        @if(empty($randomProduct->product_discount || $randomProduct->product_discount === 0))
                            <p class='font-bold'>{{ $randomProduct->productprice}} EUR</p>
                        @else
                        <div class='flex'>
                            <p class='line-through opacity-50 mr-4'>{{ $randomProduct->productprice}} EUR</p>
                            <p class='font-bold'>{{$randomProduct->productprice * (1 - $randomProduct->product_discount/100) }} EUR</p>
                        </div>
                        @endif

                    </div>

                    
                    <div class="absolute top-2 right-2">
                        @if($randomProduct->product_discount)
                        <p class='bg-red-600 p-2 text-white rounded'>{{$randomProduct->product_discount}} % OFF</p>
                        @else
                    {{-- <p>discount non dispo</p> --}}
                    @endif
                    </div>
                </div>
            </a>
        @endforeach
    </div>


@endsection



