@extends('base')
    
    @include('components.navbar')

    @section('content')
    <div class="my-5 mx-5 mb-32">
        <div class="p-2 m-auto shadow-md relative containerProduct">
            <div class="md:flex">
            <div>
               <img id='product-cover' class="my-3 object-contain w-52  mx-auto md:w-64" src="{{asset($data->cover)}}" alt="{{$data->productname}}">
            </div>

            <div>
            <div class="font-bold underline mt-10">Images ({{$countImages}})</div>
            <div>

                @if(!$images->isEmpty())
                <div class="flex md:flex-col my-1">
                    @foreach ($images as $image)
                    <img class="h-10 w-10 ml-2 imageSecondaire" src="{{ asset('images/'.$image->imageCover) }}" alt="image_product" data-image-id='{{$image->id}}'>
                    @endforeach
                </div>
                @else
                <div class="mb-5">
                  <p>no available image</p>
                </div>
                @endif
            </div>
            </div>

            </div>

            @if($data->product_discount || $data->product_discount === 0)
            <div class="flex justify-end md:absolute top-0 right-0">
               <p class='bg-red-500 w-20 text-white rounded p-1 my-1 '>{{$data->product_discount}} % OFF</p>
            </div>
            @endif

            <div class="capitalize">
                <p class="font-bold">{{$data->productname}}</p>

                @if($data->product_discount)
                    <div class='flex'>
                        <p class="line-through opacity-50">{{$data->productprice}} €</p>
                        <p class='ml-4 font-bold'>{{$data->productprice * (1 - $data->product_discount/100)}} €</p>
                    </div>
                @else
                   <p class="font-bold">{{$data->productprice}} €</p>
                @endif()
                
                <div class="text-justify">
                     <p>{{$data->description}}</p>
                </div>

                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                        <div>
                            <input type="hidden" id='product_id' name='product_id' value='{{$data->id}}'>
                        </div>
                        <div class='my-2'>
                            <input type="number" id='quantity' name='quantity' value ='1' 
                             class='border rounded bg-gray-100 pl-2 focus:border-blue-400 focus:outline-none'>
                        </div>
                        @auth
                          <input type='hidden' value='{{ Auth::user()->id }}' name="user_id">
                        @endauth
                        @if($data->status === 1)
                        <p class="text-green-600 font-bold uppercase my-3">en stock</p>    
                        <div class='flex justify-center md:block'>
                            <input class="border bg-amber-400 w-full p-2 rounded m-3 md:w-40 " type ="submit" 
                             value='Ajouter au panier'>
                        </div>
                        @else
                        <p class="text-red-500 font-bold uppercase my-3">en rupture</p>   
                             <input class="border w-full bg-amber-400 rounded p-2 opacity-40 " 
                              type ="submit" disabled value='Ajouter au panier'>
                        @endif
                </form>
            </div>
        </div>
    </div>

    @include('components.footer')
    @endsection
