<html lang="en">
    <head>
        @section('description', trans('layouts.meta_description'))
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <meta property="og:site_name" content="" />
        <meta property="og:description" content="@yield('description')" />
        <meta property="keywords" content="@yield('keywords', trans('layouts.meta_keywords'))">
        <meta name="description" content="@yield('description')">
        <meta name="title" content="@yield('title', trans('layouts.site_title'))">
        <meta name="author" content="{{ trans('layouts.meta_author') }}">
        <meta name="google-site-verification" content="e2Aj3BCstJLN5LImLRFGVMC0CiDz0FpLL05xDvrOEdw" />
        <meta name="google-site-verification" content="MrFzQBXxCihlrGCRW0UaLkiPk81MqFfxYKlrVnAQK2Q" />
        <meta name="baidu_union_verify" content="a18b9ce01c21e05e1c6da22902081f79">
        <meta name="baidu-site-verification" content="viPe2MpL6v" />
        <meta property="qc:admins" content="406161451216546377373114145" />

        <title>@yield('title')-{{trans('layouts.site_title')}}</title>

        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            html,body{
                width: 100%;
                height: 100%;
            }
            *{
                margin: 0;
                border: 0;
            }
        </style>
    </head>
    <body>
        <div id="wrap">
            @include('partials.navigation')
            @yield('content')
        </div>

        @include('partials.footer')

        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>

        </script>
    </body>
</html>