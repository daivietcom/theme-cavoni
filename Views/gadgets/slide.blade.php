<div class="row">
    <div class="col-md-12 text-center">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($slides as $index => $slide)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" class="{{($index==0)?' active':''}}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($slides as $index => $slide)
                <div class="carousel-item {{($index==0)?' active':''}}">
                    <div class="img-inner">
                        <img src="{{$slide->image}}" class="slide" alt="VnSource">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
