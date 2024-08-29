@extends('base')
    
@include('components.navbar')
@section('title', 'Home')

@section('content')

    <div class="flex justify-end m-5">
    <div class="hs-dropdown hs-dropdown-example relative inline-flex">
        <button id="hs-dropdown-example" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
            Categories
        <svg class="hs-dropdown-open:rotate-180 size-4 text-gray-600 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m6 9 6 6 6-6"></path>
        </svg>
        </button>
    
        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-example">
            @foreach($categories as $categorie)
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="{{route('product.category',$categorie->id)}}">{{$categorie->name}}</a>
            @endforeach()
        </div>
    </div>
    </div>


    <div>
        <p>les filtres</p>
    </div>


    <div class="font-bold m-3">
        <h4>Vous allez les aimer</h4>
    </div>
    <div class='grid grid-cols-2 grid-rows-1 mt-5 md:flex '>
        @foreach( $randomProducts as $randomProduct )
            <a class='relative' href="{{url('/productDetailedpage' , $randomProduct->id)}}">
                <div class="border shadow-lg m-1 rounded-lg">
                    <img class='mx-auto' src="{{asset($randomProduct->cover)}}" alt="{{$randomProduct->productname}}">
                    <div class="p-2">
                        <p class="text-lg capitalize">{{ $randomProduct->productname }}</p>
                        <p class="p">{{ $randomProduct->origin}}</p>
                        <p>ici il y'aura les avis</p>

                        @if(empty($randomProduct->product_discount || $randomProduct->product_discount === 0))
                            <p class='font-bold'>{{ $randomProduct->productprice}} €</p>
                        @else
                        <div class='flex'>
                            <p class='line-through opacity-50 mr-4'>{{ $randomProduct->productprice}} €</p>
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



