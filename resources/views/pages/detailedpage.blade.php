<div>

    @extends('base')
    
    @include('components.navbar')

    @section('content')
        <div class="p-2">
            <img class="my-3" src="/images/basket1.jpg" alt="image-produit">
            <div class="capitalize">
                <p>{{$data->productname}}</p>
                <p>{{$data->productprice}} €</p>
                <p>{{$data->description}}</p>

                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                        <div>
                            <input type="hidden" id='product_id' name='product_id' value='{{$data->id}}'>
                        </div>
                        <select class='border font-bold my-2' name="taille_id" id="tailles">
                            @foreach($tailles as $taille)
                            <option class='' value="{{$taille->id}}">{{$taille->taille}}</option>
                            @endforeach
                        </select>
                        <div class='my-2'>
                            <input type="number" id='quantity' name='quantity' value ='1' class='border rounded bg-gray-100 pl-2'>
                        </div>

                        <input type='text' value='1' name="user_id">

                        @if($data->status === 1)
                        <p class="text-green-600 font-bold uppercase my-3">en stock</p>    
                        <div class='flex justify-center'>
                            <input class="border bg-amber-400 w-full p-2 rounded m-3" type ="submit" value='Ajouter au panier'>
                            {{-- <button class="border bg-amber-400 w-full p-2 rounded m-3" type ="submit">ajouter</button> --}}
                        </div>
                        @else
                        <p class="text-red-500 font-bold uppercase my-3">en rupture</p>   
                        <input class="border w-full bg-amber-400 rounded p-2 opacity-40 m-3 " type ="submit" disabled value='Ajouter au panier'>
                        @endif

                </form>

            </div>
        </div>
    @endsection

</div>
