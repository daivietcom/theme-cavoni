@if(!empty($hooks = config('hooks.frontend.layouts.full')))
    @foreach($hooks as $hook)
        @include($hook)
    @endforeach
@endif
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="author" content="VnSource">
    <meta property="article:author" content="https://www.facebook.com/VnSource"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{image_path('favicon.ico')}}"/>
    <title>@yield('title', config('site.title'))</title>
    <link rel="canonical" href="{{url(Request::getPathInfo())}}"/>
    <meta name="description" content="@yield('description', config('site.description'))"/>
    <meta name="image" content="@yield('image', config('site.image'))"/>
    <meta name="og:description" content="@yield('description', config('site.description'))"/>
    <meta name="og:image" content="@yield('image', config('site.image'))"/>
    <meta name="og:title" content="@yield('title', config('site.title'))"/>
    <meta name="og:url" content="{{url(Request::getPathInfo())}}"/>
    {!! show_style('styles.css?'.str_random(10)) !!}
    <!--[if lt IE 9]>
    {!!show_script([
    'html5shiv/3.7.3/html5shiv.min.js' => ASSET_CDNJS,
    'respond.js/1.4.2/respond.min.js' => ASSET_CDNJS
    ])!!}
    <![endif]-->
    @stack('head')
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">{!! show_image('logo.png', ['class'=>'logo', 'alt'=> 'VnSource']) !!}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample03">
                <ul class="navbar-nav float-md-right">
                    @gadget('menu', 'topmenu')
                </ul>
            </div>
        </div>
    </nav>
</header>
@if(isset($breadcrumb))
    <div class="breadcrumb-root">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {!! $breadcrumb !!}
                </div>
            </div>
        </div>
    </div>
@endif
@yield('content')
<footer class="my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <nav class="navbar navbar-expand-sm bg-white">
                    <div class="container px-0 menu-footer-mobile">
                        <a class="navbar-brand" href="#">{!! show_image('logo.png', ['class'=>'logo', 'alt'=> 'VnSource']) !!}</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample" aria-controls="navbarsExample" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample">
                            <ul class="navbar-nav float-md-right">
                                @gadget('menu', 'topmenu')
                            </ul>
                        </div>
                    </div>
                </nav>
                <ul class="contact">
                    <li>LIÊN HỆ</li>
                    <li>HOTLINE : <a class="" href="tel:19001000">19001000</a></li>
                    <li>Website : dvchat.vn</li>
                    <li>Thư điện tử : <a class="" href="mailto:npp@dvchat.vn">npp@dvchat.vn</a></li>
                </ul>
                <p class="line"></p>
                <p class="copy-right text-dark pb-3">© Bản quyền 2020 DVCHAT | All rights reserved.</p>
            </div>
            <div class="col-md-5 bg-footer">
                {!! show_image('bg-footer.png', ['class'=>'night-cream-green-img', 'alt'=> 'img-algae']) !!}
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    var BASE_URL = '{{ url('') }}';
    var SCRIPT_LANG = {};
</script>
{!! show_script([
    'jquery/3.5.1/jquery.slim.min.js' => ASSET_CDNJS,
    'twitter-bootstrap/4.0.0/js/bootstrap.min.js' => ASSET_CDNJS,
    'core.js' => ASSET_THEME
]) !!}
@stack('script')
</body>
</html>
