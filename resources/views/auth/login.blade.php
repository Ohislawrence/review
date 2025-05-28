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
            <div class="col-lg-8">
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

                        <!-- Remember Me -->
                        <div class="form_group">
                            <label for="remember_me"> </label>
                                <input id="remember_me" type="checkbox" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <button class="main-btn">
                                {{ __('Log in') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

