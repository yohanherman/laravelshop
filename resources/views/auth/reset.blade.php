@extends('base')

@section('content')

<div class="mt-56 mx-5">

    <form action="{{route('reset.post', ['token' => $token] )}}" method='POST' class="p-4 border bg-gray-50 h-auto m-auto md:w-96">
        @csrf
        <div class="flex justify-center items-center">
            <h1 class='font-bold'>Reset password</h1>
        </div>

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

        <div class="mt-8">
            <div class="my-3">
                <input class="border rounded focus:border-blue-400 focus:outline-none w-full h-10 p-3" type="email" name='email', id='email'  placeholder='Email'>
                @error('email')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="my-3">
                <input class="border rounded focus:border-blue-400 focus:outline-none w-full h-10 p-3" type="password" name='newPassword', id='newPassword'  placeholder='Password'>
                @error('newPassword')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="my-3">
                <input class="border rounded focus:border-blue-400 focus:outline-none w-full h-10 p-3" type="password" name='newPassword_confirmation', id='passwordConfirm'  placeholder='Confirm password'>
                @error('newPassword_confirmation')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            
                <div>
                <input class='bg-blue-500 text-white p-2 rounded my-2' type="submit" value='Reset'>
            </div>
        </div>
    </form>
</div>

@endsection