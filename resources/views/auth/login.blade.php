@extends('base')
@section('title','login')

@section('content')

<div>

    <div>
        <div>
            @if(session()->has('success'))
                <p>{{session('success')}}</p>
            @endif
        </div>
        <div>
            @if(session()->has('error'))
                <p>{{session('error')}}</p>
            @endif
        </div>

    </div>

    <div class="mt-96 mx-5">
        <form action="{{route('post.login')}}" method='POST' class="p-4 border bg-gray-50 h-auto m-auto md:w-96">
            @csrf
            <div class="flex justify-center items-center">
                <h1 class='font-bold'>Login</h1>
            </div>
            <div class="mt-8">
                <div class="my-3">
                    <input class="border rounded focus:border-blue-400 focus:outline-none w-full h-10 p-3" type="email" name='email', id='email_login'  placeholder='Email'>
                    @error('email')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <input class='border rounded focus:border-blue-400 focus:outline-none w-full h-10 p-3' type="text" name='password', id='password' placeholder='Password'>
                    @error('password')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>

                {{-- <div class="my-2">
                    <input type="checkbox">
                    <label for="remember">Remember me</label>
                </div> --}}
                <div class='my-3'>
                    <a href="{{route('get.register')}}">Not a member yet ?</a>
                </div>

                <div>
                    <input class='bg-blue-500 text-white p-2 rounded my-2' type="submit" value='Sign In'>
                </div>
            </div>
        </form>
    </div>
</div>



 @endsection