@extends('base')

@section('title','registration')

@section('content')

    <div>
        <div class='mt-56 mx-5'>
            <form action="{{ route('post.register')}}" method="POST" class="p-4 border bg-gray-50 h-auto m-auto md:w-96">
                @csrf
                <div class="flex justify-center items-center">
                    <h1 class="font-bold">Signup</h1>
                </div>
                <div class='mt-6'>
                    <div class='my-3'>
                        <input class="border focus:border-blue-400 focus:outline-none w-full h-10 p-3 rounded" type="text" name='name' id='name' placeholder='name'>
                        @error('name')
                            <span class='text-red-500'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input  class='border w-full h-10 p-3 rounded focus:border-blue-400 focus:outline-none' type="email" name='email' id='email_register' placeholder='Email'>
                        @error('email')
                            <span class='text-red-500'>{{$message}}</span>
                        @enderror
                        <span class="emailError"></span>
                    </div>
                    <div class='my-3'>
                        <input  class=' rounded border w-full h-10 p-3 focus:border-blue-400 focus:outline-none' type="password" name='password' id='password' placeholder='Password'>
                        @error('password')
                            <span class='text-red-500'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class='my-2'>
                        <input class='rounded border w-full h-10 p-3 focus:border-blue-400 focus:outline-none' type="password" name='passwordConfirm' id='passwordConfirm' placeholder='confirm password'>
                    </div>
                    <span class='message'></span>
                    <div class='my-3'>
                        <a href="{{route('login')}}">Already a member</a>
                    </div>
                    <div>
                        <input class='bg-blue-500 text-white p-2 rounded my-2' type='submit' value ="Register" id='registerButton'>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection