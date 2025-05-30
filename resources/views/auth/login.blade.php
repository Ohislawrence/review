@extends('layouts.guest')
@section('title',  'home' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("publicassets/images/ogimg.jpg") )
@section('description',  '' )
@section('imagealt',  'Learn about what we do' )


@section('header')

@endsection




@section('footer')

@endsection

@section('breadcrumbs')

@endsection


@section('content')
<div class="user-area-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h3 class="justify-content-center mb-25">Welcome Back</h3>
                <div class="user-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="form_group">
                            <label for="email"> Email</label>
                            <input id="email" class="form_control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form_group">
                            <label for="password">Password </label>

                            <input id="password" class="form_control"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="form_checkbox d-flex align-items-center">
                            <input id="remember_me" type="checkbox" name="remember">
                            <label for="checkbox1"><span>Remember me</span></label>
                        </div>
                        <div class="form_group">
                            <button type="submit" class="main-btn">Login</button>
                            <a href="{{ route('password.request') }}">Lost your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

