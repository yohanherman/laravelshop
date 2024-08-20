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
    <form action="{{route('post.login')}}" method='POST'>
        @csrf
        <div>
            <label for="email">email</label>
            <input type="text" name='email', id='email'>
            @error('email')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="password">password</label>
            <input type="text" name='password', id='password'>
            @error('password')
                <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <input type="submit" value='se connecter'>
        </div>
    </form>
</div>



 @endsection