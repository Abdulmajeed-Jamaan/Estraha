@extends('layouts.app')

@section('content')


    <!-- --------------------------------------------------------------- -->
    <!-- -------------------------- Intro ------------------------------ -->
    <!-- --------------------------------------------------------------- -->

    <section class="intro">
            <div>
                <h1>احجز استراحة تناسبك</h1>
                <h1 id="top_text">بافضل الاسعار</h1>



                <div id="bottom_text">
                    <a href="">باحث عن استراحة</a>
                    <h1>أو</h1>
                    <a href="">صاحب استراحة</a>
                </div>
            </div>



        </section>

        <!-- --------------------------------------------------------------- -->
        <!-- -------------------------- homes ------------------------------ -->
        <!-- --------------------------------------------------------------- -->


        <section class="content">
            <h1>تم اضافته مؤخرا</h1>
            <div>

            @foreach ($homes as $home)
            <article onclick="window.location.href = '/show/{{$home->title}}'">
                     <img src="{{asset('storage/img/'.$home->images->first()->file_name)}}" width="100%" height="55%" alt="home image">
                     <div id="place">
                         <img src="/img/marker.svg" width="20px" height="20px" alt="marker image">
                         <h5>{{$home->place->name}}</h5>
                     </div>
                     <h5> {{$home->title}}</h5>
                     <h3>{{$home->default_price}} ريال / لليوم</h3>

                </article>
            @endforeach


            </div>
        </section>






@endsection


