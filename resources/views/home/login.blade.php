@extends('layouts.main')

@section('title', trans('home.login'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-push-4 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
                <div class="content-box login-form">
                    <h1 class="page-title">{{trans('home.login_title')}}</h1>
                    @if(Session::get('login_errors'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5>{{trans('home.email_or_password_incorrect')}}</h5>
                        </div>
                    @endif
                    @if(Session::has('password_reset'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5>{{trans('home.password_has_been_reset')}}</h5>
                        </div>
                    @endif

                    <form action="{{route('auth.login')}}" method="post">
                        <div class="form-group">
                            <label for="username">{{trans('home.username')}}:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="{{trans('home.username_input')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">{{trans('home.password')}}:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="{{trans('home.password_input')}}">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember">{{trans('home.checkout')}}
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-login">{{trans('home.login')}}</button>
                        </div>
                    </form>

                    <p class="text-center" style="margin-top: 10px">{{trans('home.or')}}</p>
                    <a class="btn btn-default btn-block btn-login-github" href="{{url('login/github')}}">
                        <i class="fa fa-github">
                            {{trans('home.login_with_github')}}
                        </i>
                    </a>
                    <ul class="nav nav-list">
                        <li class="text-center"><a href="{{url('password/remind')}}">{{trans('home.forgot_your_password')}}</a></li>
                        <li class="text-center"><a href="{{url('register')}}">{{trans('home.do_not_have_account_yet')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection



