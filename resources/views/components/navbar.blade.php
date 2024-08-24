 @extends('base') 

 @if(auth()->check())
  <div>
    <header>
       <nav class="navbar text-2xl ">
          <div class="m-5 text-white">
            <i class="fa-solid fa-bars"></i>
          </div>

          <div class="md:w-1/2 my-auto  ">
            <form class='flex' action="{{route('search')}}" method='GET'>
            <input class="mr-25 w-52 outline-none pl-2 pr-5 rounded md:w-full" type="text" name='product_name' value='{{request('product_name')}}'>
            <div dir="rtl">
              <button class='rounded-s-lg p-2 bg-amber-400 relative right-1' type='submit'><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            </form>
          </div>
          
          <div class='m-5 text-white'>
            <a href="#" class="mr-4">
              <i class="fa-solid fa-user"></i>
            </a>
            <a href="{{route('cart.showCart')}}" class="mr-1">
              <i class="fa-solid fa-cart-shopping"></i>
              <span class="cartquantity ">{{$cartCount}}</span>
            </a>
          </div>
        </nav>
    </header>
  </div> 

  <div class="sidebar flex justify-between">
    <div class="">
      <ul class="ul">
        <li><a href=""></a>catego</li>
        <li><a href=""></a>inform</li>
        <li><a href=""></a>contact</li>
        <li><a href=""></a>a propos</li>
        <li><a href="{{route('logout')}}">Deconnexion</a></li>
      </ul>
    </div>
    <div>
      <div class="burger-remove m-3"><i class="fa-solid fa-xmark text-xl"></i></div>
    </div>
  </div>
  @else
  <div>
    <header>
       <nav class="navbar text-2xl flex ">
          <div class="m-5 text-white my-auto">
            <i class="fa-solid fa-bars"></i>
          </div>
        
          <div class="md:w-1/2 my-auto  ">
            <form class='flex' action="{{route('search')}}" method='GET'>
            <input class="mr-25 w-52 outline-none pl-2 pr-5 rounded md:w-full" type="text" name='product_name' value='{{request('product_name')}}'>
            <div dir="rtl">
              <button class='rounded-s-lg p-2 bg-amber-400 relative right-1' type='submit'><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            </form>
          </div>

          <div class='m-5 text-white'>
            <a href="#" class="mr-4">
              <i class="fa-solid fa-user"></i>
            </a>
            <a href="{{route('cart.showCart')}}" class="mr-1">
              <i class="fa-solid fa-cart-shopping"></i>
              <div class="cartquantity ">{{$cartCount}}</div>
            </a>
          </div>
        </nav>
    </header>
  </div> 

  <div class="sidebar flex justify-between">
    <div class="">
      <ul>
        <li><a href=""></a>catego</li>
        <li><a href=""></a>inform</li>
        <li><a href=""></a>contact</li>
        <li><a href=""></a>a propos</li>
        <li><a href="{{route('post.login')}}">Connexion</a></li>
      </ul>
    </div>
    <div>
      <div class="burger-remove m-3"><i class="fa-solid fa-xmark text-xl"></i></div>
    </div>
  </div>

  @endif


  





   

