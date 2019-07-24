@extends('layouts.app')

@section('content')


<div class="back-btn-fixed">
    <a href="/">
        <img src="{{asset('/img/arrow_right.png')}}" alt="Arrow"></a>
</div>
<div class="show-container">

    <div class="home-container">
        <div class="title">
            <h1>{{$home->title}}</h1>
            <div class="location">
                <img src="/img/marker.svg" alt="marker">
                <h5>{{$home->place->name}}</h5>
            </div>
        </div>

        <div class="card-container">
            <div class="images-container">
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">


                        @foreach ($home->images as $index => $img)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}"
                            @if($index==0)class="active" @endif></li>
                        @endforeach

                    </ol>
                    <div class="carousel-inner">
                        @foreach ($home->images as $index => $img)
                        <div class="carousel-item @if($index==0)active @endif">
                            <img class="d-block w-100" src="{{asset('storage/img/'.$img->file_name)}}"
                                alt="{{$img->file_name}}">
                        </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="general-spec">
                <div class="head">
                    <h1>الخصائص العامة</h1>
                    <div class="line"></div>
                </div>
                <div class="specs">
                    <!-- room count -->
                    <div class="spec">
                        <div class="img-container">
                            <img src="{{asset('img/lamp.svg')}}" alt="Lamp">
                        </div>
                        <h3>
                            غرف {{$home->no_romes}}
                        </h3>
                    </div>

                    <!-- bath count -->
                    <div class="spec">
                        <div class="img-container">
                            <img src="{{asset('img/bathroom.svg')}}" alt="Lamp">
                        </div>
                        <h3>
                            حمام {{$home->no_baths}}
                        </h3>
                    </div>

                    <!-- kitchen count -->
                    <div class="spec">
                        <div class="img-container">
                            <img src="{{asset('img/kitchen.svg')}}" alt="Lamp">
                        </div>
                        <h3>
                            مطبخ {{$home->no_kitchen}}
                        </h3>
                    </div>

                    <!-- area count -->
                    <div class="spec">
                        <div class="img-container">
                            <img src="{{asset('img/area.svg')}}" alt="Lamp">
                        </div>
                        <h3>
                            المساحة
                        </h3>
                        <h6>{{$home->area}}</h6>
                    </div>
                </div>
            </div>



            <div class="extra-spec">
                <div class="head">
                    <h1>خدمات اضافية</h1>
                    <div class="line"></div>
                </div>
                <div class="specs">

                    @foreach ($home->extras as $extra)
                    <div class="spec">
                        <div class="img-container">
                            <img src="{{asset('img/'.$extra->image_name)}}" alt="home">
                        </div>
                        <h3>
                            {{$extra->name}}
                        </h3>
                    </div>
                    @endforeach


                </div>
            </div>
            <div class="location-spec">
                <div class="head">
                    <h1>الموقع على الخريطة</h1>
                    <div class="line"></div>
                </div>

            </div>
        </div>
    </div>

    <div>
        <div class="owner-container">
            <div class="owner-head">

                <div class="line"></div>
                <h6>صاحب المسكن</h6>
                <div class="line"></div>

            </div>
            <div class="owner-info">
                <div class="owner-name">

                    <h5>{{$home->user->name}}</h5>
                    <img src="/img/profile.png" alt="profile">
                </div>
                <h5>رقم المسكن : {{$home->id}}</h5>

            </div>
            <div class="reservate-head">
                <div class="line"></div>
                <h6>نموذج حجز المسكن</h6>
                <div class="line"></div>
            </div>
            <div class="reservate-data">
                <form action="" method="POST">
                    @csrf
                    <div class="date-container">

                    </div>
                    <div class="btn-reservate">
                        <button type="submit">اطلب حجز المسكن</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
    $('.datepicker').val();}, false);

</script>

@endsection