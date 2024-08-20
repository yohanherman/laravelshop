 @extends('base') 

 @if(auth()->check())
  <div>
    <header>
       <nav class="navbar text-2xl ">
          <div class="m-5 text-white"><i class="fa-solid fa-bars"></i></div>
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
      <ul>
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
       <nav class="navbar text-2xl ">
          <div class="m-5 text-white"><i class="fa-solid fa-bars"></i></div>
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


  





   

