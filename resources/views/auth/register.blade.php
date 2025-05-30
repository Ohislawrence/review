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
                <h3 class="justify-content-center ">Sign Up </h3>
                <span class="mb-25">Get exclusive deals on your favourite apps</span>
                <div class="user-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form_group">
                            <label for="email">Full Name</label>
                            <input id="name" class="form_control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <!-- Email Address -->
                        <div class="form_group">
                            <label for="email"> Email</label>
                            <input id="email" class="form_control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form_group">
                            <label for="password">Password </label>

                            <input id="password" class="form_control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form_group">
                            <label for="password_confirmation">Confirm Password </label>

                            <x-text-input id="password_confirmation" class="form_control"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="form_checkbox d-flex align-items-center">
                            <a class="" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>
                        <div class="form_group">
                            <button type="submit" class="main-btn">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

