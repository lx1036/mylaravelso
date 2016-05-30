@extends('layouts.main')

@section('title', trans('user.settings'))

@section('styles')
    <link rel="stylesheet" href="{{asset('css/jquery.Jcrop.min.css')}}">
    <style>
        .jcrop-holder{
            margin: 0 auto;
        }
    </style>
@stop

@section('scripts')
<script src="{{asset('js/vendor/uploader/FileAPI.min.js')}}"></script>
<script src="{{asset('js/vendor/uploader/FileAPI.exif.js')}}"></script>
<script src="{{asset('js/vendor/uploader/jquery.fileapi.js')}}"></script>
<script src="{{asset('js/vendor/uploader/jquery.Jcrop.min.js')}}"></script>
<script>
    var fileApi = {
        debug: false,
        staticPath: "{{url('js/vendor/uploader')}}/",
        postNameConcat: function (name, index) {
            return name + (index != null ?'['+index+']' :'');
        }
    };
    jQuery(function ($) {

    });
</script>

@stop

@section('content')
    <div class="container">
        <div class="row push-down">
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                <h1 class="page-title">{{trans('user.user_setting')}}</h1>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 text-right">
                <a href="{{url('user')}}" class="btn btn-primary">{{trans('user.back_to_profile')}}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-push-3 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2 col-xs-12">
                <div class="content-box">
                    <h3 class="content-title">{{trans('user.account_settings')}}</h3>
                    @if(Session::has('update_password'))

                    @endif

                    @if(Session::has('settings_updated'))

                    @endif

                    @include('partials.error')
                    <form action="{{url('/user/settings')}}" id="loginform" class="form-horizontal" method="post" role="form">
                        <fieldset>
                            <div class="form-group {{Session::get('user_required') ?'has-error' : ''}}">
                                <label for="username" class="col-lg-4 control-label">{{trans('user.username')}}</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                    @if(Session::get('username_required'))
                                        <span class="help-block">{{trans('user.github_user_already_taken')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-lg-4 control-label">{{trans('user.email')}}</label>
                                <div class="col-lg-8">
                                    <input type="email" disabled class="form-control" id="email" placeholder="{{$frontend->user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="col-lg-4 control-label">{{trans('user.profile_picture')}}</label>
                                <div class="col-lg-8">
                                    <input type="hidden" id="avatar-hidden" name="avatar" value="">
                                    <div id="upload-avatar" class="upload-avatar">
                                        <div class="userpic" style="background-image: url('{!! $frontend->user->avatar !!}');">
                                            <div class="js-preview userpic_preview"></div>
                                        </div>
                                        <div class="btn btn-sm btn-primary js-fileapi-wrapper">
                                            <div class="js-browse">
                                                <span class="btn-txt">{{trans('user.choose')}}</span>
                                                <input type="file" name="filedata">
                                            </div>
                                            <div class="js-upload" style="display: none">
                                                <div class="progress progress-success">
                                                    <div class="js-progress bar"></div>
                                                </div>
                                                <span class="btn-txt">{{trans('user.uploading')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-lg-4 control-label">{{trans('user.password')}}</label>
                                <div class="col-lg-8">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{trans('user.new_password')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="col-lg-4 control-label">{{trans('user.confirm_password')}}</label>
                                <div class="col-lg-8">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{trans('user.confirm_password')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-7 col-lg-12">
                                    <input class="btn btn-sm" type="reset" value="{{trans('user.reset_form')}}">
                                    <input class="btn btn-sm btn-primary" type="submit" value="{{trans('user.update')}}">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cropper-preview">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{trans('user.crop_picture')}}</h4>
                </div>
                <div class="modal-body" style="height: 500px;">
                    <div class="js-img"></div>
                </div>
                <div class="modal-footer">
                    <p><div class="js-upload btn btn-primary">{{trans('user.upload')}}</div></p>
                </div>
            </div>
        </div>
    </div>

@endsection