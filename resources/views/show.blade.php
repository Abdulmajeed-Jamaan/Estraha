@extends('layouts.app')

@section('content')


<div class="back-btn-fixed">
    <a href="/">
<img src="{{asset('/img/arrow_right.png')}}" alt="Arrow"></a>
</div>
<div class="show-container">
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
                <div class="date">
                    <label for="start-date"></label>
                    <input id="start-date" type="date" name="start-date" data-provide="datepicker">
                </div>

                <div class="date">
                        <label for="end-date"></label>
                        <input id="end-date" type="date" name="end-date" data-provide="datepicker">
                    </div>
                </div>
                <div class="btn-reservate">
                    <button  type="submit" >اطلب حجز المسكن</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            

                          @foreach ($home->images as $index => $img)
                          <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" @if($index==0)class="active" @endif ></li>
                          @endforeach

                        </ol>
                        <div class="carousel-inner">
                                @foreach ($home->images as $index => $img)
                                <div class="carousel-item @if($index==0)active @endif" >
                            <img class="d-block w-100" src="{{asset('storage/img/'.$img->file_name)}}" alt="{{$img->file_name}}">
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
            

        </div>
        <div class="extra-specs">

        </div>
        <div class="location">

        </div>
    </div>
</div>


</div>
<script>


document.addEventListener('DOMContentLoaded', function(){ 
    $('.datepicker').val();}, false);

</script>

@endsection
