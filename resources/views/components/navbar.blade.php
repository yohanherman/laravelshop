 @extends('base') 

 @if(auth()->check())

  <div>
    <header class="mb-5">
      <div id="logo" class="absolute top-[20px] ml-2 text-[25px]">LOGO</div>
       <nav class="navbar text-2xl flex ">
          <div class="m-5 text-white my-auto burger">
            <i class="fa-solid fa-bars"></i>
          </div>
        
          <div class="md:w-1/2 my-auto searchcontainer ">
            <form class='flex' action="{{route('search')}}" method='GET'>
            <input class="mr-25 w-52 outline-none pl-2 pr-5 rounded md:w-full" type="text" name='product_name' value='{{request('product_name')}}' placeholder='Research...'>
            <div dir="rtl">
              <button class='rounded-s-lg p-2 bg-amber-400 relative right-1' type='submit'><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            </form>
          </div>


          <div class="sidebar flex justify-between"> 
              <ul>
               <li><a href="#">Home</a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="#">About</a></li>
               <li><a class="bg-red-500 p-1 rounded" href="{{route('logout')}}">Deconnexion</a></li>
             </ul>  
          <div>
             <div class="burger-remove m-3"><i class="fa-solid fa-xmark text-xl"></i></div>
           </div>
         </div>

          <div class='mr-5 my-auto text-white flex profilCart'>
            <a href="#" class="mr-4 mt-1">
              <i class="fa-solid fa-user"></i>
            </a>
            <a href="{{route('cart.showCart')}}" class="mr-1">
              <i class="fa-solid fa-cart-shopping"></i>
              {{-- @if($cartCount)
              <span class="cartquantity">{{$cartCount}}</span>
              @endif --}}
            </a>
          </div>
        </nav>
    </header>

    <div class=" mt-10 md:w-1/2 searchcontainer2 ">
      <form class='flex' action="{{route('search')}}" method='GET'>
      <input class="inputSearch mr-25 w-52 outline-none pl-2 pr-5 rounded md:w-full" type="text" name='product_name' value='{{request('product_name')}}' placeholder='Research...'>
      <div dir="rtl">
        <button class='rounded-s-lg p-2 bg-amber-400 relative right-1' type='submit'><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
      </form>
    </div>
  </div> 



  @else


  <div>
    <header class="mb-5">
      <div id="logo" class="absolute top-[20px] ml-2 text-[25px]">LOGO</div>
       <nav class="navbar text-2xl flex ">
          <div class="m-5 text-white my-auto burger">
            <i class="fa-solid fa-bars"></i>
          </div>
        
          <div class="md:w-1/2 my-auto searchcontainer ">
            <form class='flex' action="{{route('search')}}" method='GET'>
            <input class="mr-25 w-52 outline-none pl-2 pr-5 rounded md:w-full" type="text" name='product_name' value='{{request('product_name')}}' placeholder='Rechercher...'>
            <div dir="rtl">
              <button class='rounded-s-lg p-2 bg-amber-400 relative right-1' type='submit'><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            </form>
          </div>


          <div class="sidebar flex justify-between"> 
              <ul>
               <li><a href="#">Home</a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="#">About</a></li>
               <li><a href="{{route('post.login')}}">Connexion</a></li>
             </ul>  
          <div>
             <div class="burger-remove m-3"><i class="fa-solid fa-xmark text-xl"></i></div>
           </div>
         </div>

          <div class='mr-5 my-auto text-white flex profilCart'>
            <a href="#" class="mr-4">
              <i class="fa-solid fa-user"></i>
            </a>
            <a href="{{route('cart.showCart')}}" class="mr-1">
              <i class="fa-solid fa-cart-shopping"></i>
            </a>
          </div>

        </nav>
    </header>

    <div class="mt-10 md:w-1/2 searchcontainer2 ">
      <form class='flex' action="{{route('search')}}" method='GET'>
      <input class="inputSearch mr-25 w-52 outline-none pl-2 pr-5 rounded md:w-full" type="text" name='product_name' value='{{request('product_name')}}' placeholder='Rechercher...'>
      <div dir="rtl">
        <button class='rounded-s-lg p-2 bg-amber-400 relative right-1' type='submit'><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
      </form>
    </div>
  </div> 

  @endif

