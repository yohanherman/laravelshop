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


<a href="#">
    <div class='grid grid-cols-2 grid-rows-3 mt-10 md:flex '>
        @foreach( $randomProducts as $randomProduct )
        <div class=" border shadow-lg m-1 rounded-lg">
            <img src="/images/{{$randomProduct->cover}}" alt="cover">
            <div class="p-2">
            <p class="text-lg capitalize">{{ $randomProduct->productname }}</p>
            <p>{{ $randomProduct->origin}}</p>
            <p>ici les etoiles</p>
            <p class='font-bold'>{{ $randomProduct->productprice}} EUR</p>
            </div>
        </div>
        @endforeach
    </div>
</a>


@endsection



