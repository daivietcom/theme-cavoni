@extends('Frontend::layouts.full')
@section('content')
    @if(!empty($hooks = config('hooks.frontend.home')))
        @foreach($hooks as $hook)
            @include($hook)
        @endforeach
    @endif
{{--    @gadget('slide')--}}
    <section class="position-relative slide-top">
        @gadget('slide')
    </section>
    <section class="box algae position-relative">
        {!! show_image('bg_slide_left.png', ['class'=>'bg-algae-left position-absolute', 'alt'=> 'bg-slide-left']) !!}
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-bg ml-2">
                        {!! show_image('img-algae2x.png', ['class'=>'img-algae', 'alt'=> 'img-algae']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <h4 class="pb-4 font font-weight-bold">TẢO SPIRULINA LÀ GÌ?</h4>
                        <p>
                            Spirulina là một loại vi tảo dạng sợi xoắn màu xanh lục, sinh trưởng tự nhiên trong đại dương và các hồ nước mặn ở khu vực khí hậu cận nhiệt đới. Thực chất loại tảo xoắn này có thể sống ở cả môi trường nước mặn và nước ngọt, là nguồn dinh dưỡng quý giá mà thiên nhiên ban tặng cho con người.
                        </p>
                        <p>
                            Spirulina chứa vitamin E, selen và tyrosine, tất cả đều được biết đến với tác dụng chống lão hóa mạnh mẽ. Đặc biệt trong đó phải kể đến chất tyrosine. Các chất chống oxy hóa hiện diện trong tyrosine giúp loại bỏ các gốc tự do và làm chậm sự lão hóa của các tế bào da.
                        </p>
                        <p>
                            Spirulina thúc đẩy quá trình tái tạo và sản sinh tế bào da một cách mạnh mẽ, giúp làn da bị tổn thương nhanh chóng được phục hồi và liền sẹp nhanh hơn.
                        </p>
                    </div>
                    {!! show_image('leaves-left.png', ['class'=>'img-leaves position-absolute', 'alt'=> 'img-algae']) !!}
                </div>
            </div>
        </div>
    </section>
    <section class="product position-relative mt-4">
        {!! show_image('bd-hoa-bottom.png', ['class'=>'bg-hoa-bottom position-absolute', 'alt'=> 'bg-hoa-bottom']) !!}
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h4 class="pb-5 font font-weight-bold">SẢN PHẨM DV COSMETIC</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="img-bg ml-5">
                        {!! show_image('girl2x.png', ['class'=>'img-algae', 'alt'=> 'img-algae']) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="box cleanser position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-6 cleanser-inner secrum">
                    <div class="row">
                        <div class="col text-center">
                            {!! show_image('clear_green.png', ['class'=>'clearser-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GREEN</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('clear_gold.png', ['class'=>'clearser-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GOLD</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('clear_ruby.png', ['class'=>'clearser-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">RUBY</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                    </div>
                    {!! show_image('leaves-left.png', ['class'=>'img-leaves-left position-absolute', 'alt'=> 'img-algae']) !!}
                </div>
                <div class="col-md-6 cleanser-inner">
                    <div class="content">
                        <h4 class="pb-4 font font-weight-bold">CLEANSER - 100G</h4>
                        <p> Làm sạch da, góp phần làm sáng da và hỗ trợ ngăn ngừa mụn.</p>
                        <p>Công nghệ chiết xuất tảo đến từ Nhật Bản</p>
                    </div>
                    <a class="buy-now" href="#">Mua ngay</a>
                    {!! show_image('group-hoa.png', ['class'=>'img-leaves position-absolute', 'alt'=> 'img-algae']) !!}
                </div>
            </div>
        </div>
    </section>
    <section class="box sun position-relative mt-4">
        {!! show_image('bg-hoa-right.png', ['class'=>'bg-hoa-bottom position-absolute', 'alt'=> 'bg-hoa-bottom']) !!}
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h4 class="pb-5 font font-weight-bold">SUN CREAM - 30G</h4>
                        <p>Giúp chống nắng, bảo vệ da khỏi những tác hại của tia UV. Giúp dưỡng ẩm, chống lão hóa và làm da trông trắng sáng.</p>
                        <p>Công nghệ chiết xuất tảo đến từ Nhật Bản</p>
                    </div>
                    <a class="buy-now" href="#">Mua ngay</a>
                </div>
                <div class="col-md-6 secrum">
                    <div class="row">
                        <div class="col text-center">
                            {!! show_image('sun_green.png', ['class'=>'clearser-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GREEN</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('sun_gold.png', ['class'=>'clearser-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GOLD</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('sun_ruby.png', ['class'=>'clearser-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">RUBY</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                    </div>
                    {!! show_image('hoa-big.png', ['class'=>'img-big-right position-absolute', 'alt'=> 'img-algae']) !!}
                </div>
            </div>
        </div>
    </section>
    <section class="box cleanser toner position-relative pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 toner-inner mt-5">
                    <div class="row">
                        <div class="col text-center">
                            {!! show_image('toner-green2x.png', ['class'=>'toner-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GREEN</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('toner-gold2x.png', ['class'=>'toner-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GOLD</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('toner-ruby2x.png', ['class'=>'toner-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">RUBY</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                    </div>
                    {!! show_image('leaves-right.png', ['class'=>'img-leaves-right position-absolute', 'alt'=> 'img-algae']) !!}
                </div>
                <div class="col-md-6 cleanser-inner">
                    <div class="content">
                        <h4 class="pb-5 font font-weight-bold">TONER - 100ML</h4>
                        <p>Dưỡng ẩm, làm dịu da và giúp da mềm mịn, góp phần làm se da, dịu da, dưỡng da trắng sáng và cân bằng pH trên da.</p>
                        <p>Công nghệ chiết xuất tảo đến từ Nhật Bản</p>
                    </div>
                    <a class="buy-now" href="#">Mua ngay</a>
                    {!! show_image('hoa-right.png', ['class'=>'img-leaves position-absolute', 'alt'=> 'img-algae']) !!}
                </div>
            </div>
        </div>
    </section>
    <section class="box sun position-relative mt-4">
        {!! show_image('bg-hoa-right.png', ['class'=>'bg-hoa-bottom position-absolute', 'alt'=> 'bg-hoa-bottom']) !!}
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h4 class="pb-5 font font-weight-bold">SERUM COLLAGEN - 30 ML</h4>
                        <p>Dưỡng ẩm, giúp da trở nên mềm mịn, làm mờ các vết thâm nám trên da, làm săn chắc da, ngăn ngừa quá trình lão hóa da sớm, giúp da trông trắng sáng.</p>
                        <p>Công nghệ chiết xuất tảo đến từ Nhật Bản</p>
                    </div>
                    <a class="buy-now" href="#">Mua ngay</a>
                </div>
                <div class="col-md-6 secrum">
                    <div class="row">
                        <div class="col text-center">
                            {!! show_image('cavoni-green.png', ['class'=>'clearser-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GREEN</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('cavoni-gold.png', ['class'=>'clearser-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GOLD</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('cavoni-ruby.png', ['class'=>'clearser-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">RUBY</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                    </div>
                    {!! show_image('hoa-big.png', ['class'=>'img-big-right position-absolute', 'alt'=> 'img-algae']) !!}
                </div>
            </div>
        </div>
    </section>
    <section class="box cleanser toner position-relative pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6  mt-5">
                    <div class="row">
                        <div class="col text-center">
                            {!! show_image('night-cream-green.png', ['class'=>'night-cream-green-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GREEN</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('night-cream-gold.png', ['class'=>'night-cream-green-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">GOLD</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                        <div class="col text-center">
                            {!! show_image('night-cream-ruby.png', ['class'=>'night-cream-green-img', 'alt'=> 'img-algae']) !!}
                            <div class="price text-center mt-4">
                                <p class="name-sp">RUBY</p>
                                <p class="font-weight-bold price-sp">GIÁ</p>
                            </div>
                        </div>
                    </div>
                    {!! show_image('leaves-right.png', ['class'=>'img-leaves-right position-absolute', 'alt'=> 'img-algae']) !!}
                </div>
                <div class="col-md-6 cleanser-inner">
                    <div class="content">
                        <h4 class="pb-5 font font-weight-bold">NIGHT CREAM - 30G</h4>
                        <p>Dưỡng ẩm cho da, làm sáng da, giúp làm mờ các vết thâm nám, vết sẹo trên da và ngăn ngừa lão hóa.
                        </p>
                        <p>Công nghệ chiết xuất tảo đến từ Nhật Bản</p>
                    </div>
                    <a class="buy-now" href="#">Mua ngay</a>
                    {!! show_image('hoa-right.png', ['class'=>'img-leaves position-absolute', 'alt'=> 'img-algae']) !!}
                </div>
            </div>
        </div>
    </section>
@endsection
