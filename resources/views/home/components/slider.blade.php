@php
    $baseUrl= config('app.base_url');
@endphp

<section class="slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($sliders as $key => $slider)
                        <li data-target="#slider-carousel"
                            data-slide-to="{{$slider->id}}"
                            class="{{$key==0?'active':''}}">
                        </li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">

                        @foreach($sliders as $key => $slider)
                            <div class="carousel-item {{$key==0?'active':''}}">
                                <img src="{{$baseUrl . $slider->image_path}}" class="d-block w-100"
                                     alt="First slide">
                            </div>
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#slider-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slider-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
