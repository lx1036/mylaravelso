@extends('layouts.main')

@section('title', trans('home.register'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-push-4 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
                <div class="content-box register-form">
                    <h1 class="page-title">{{trans('home.register')}}</h1>
                    @if(Session::get('errors'))
                        <div class="alert alert-danger alert-dismissable">

                        </div>
                    @endif

                    @if(Session::get('github_email_not_verified'))
                        <div class="alert alert-danger alert-dismissable">

                        </div>
                    @endif

                    <form action="{{route('auth.register')}}" method="post">
                        <div class="form-group">
                            <label for="username">{{trans('home.username')}}:</label>
                            <input type="text" class="form-control" id="username" placeholder="{{trans('home.username_input')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{trans('home.email')}}:</label>
                            <input type="email" class="form-control" id="email" placeholder="{{trans('home.email_input')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">{{trans('home.password')}}:</label>
                            <input type="password" class="form-control" id="password" placeholder="{{trans('home.password_input')}}">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{{trans('home.password_confirmation')}}:</label>
                            <input type="password" class="form-control" id="password_confirmation" placeholder="{{trans('home.confirmation_input')}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-login">{{trans('home.register')}}</button>
                        </div>
                    </form>

                    <p class="text-center" style="margin-top: 10px">{{trans('home.or')}}</p>
                    <a class="btn btn-default btn-block btn-login-github" href="{{url('login/github')}}">
                        <i class="fa fa-github">
                            {{trans('home.login_with_github')}}
                        </i>
                    </a>
                    <ul class="nav nav-list">
                        <li class="text-center"><a href="{{url('login')}}">{{trans('home.have_account_already')}}</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection