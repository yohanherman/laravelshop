@extends('base')

@section('title','registration')

@section('content')

    <div>


        <form action="{{ route('post.register')}}" method="POST">
            @csrf
            <div>
                <label for="name">name</label>
                <input type="text" name='name' id='name'>
                 @error('name')
                    <span>{{$message}}</span>
                 @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name='email' id='email'>
                @error('email')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="text" name='password' id='password'>
                @error('password')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <div>
                <label for="passwordconfirm">confirm password</label>
                <input type="text" name='passwordconfirm' id='passwordconfirm'>
            </div>

            <div>
                <input type="submit" value ="s'inscrire">
            </div>
        </form>
    </div>

@endsection