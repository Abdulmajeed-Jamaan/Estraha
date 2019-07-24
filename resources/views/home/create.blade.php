@extends('layouts.app')

@section('content')

<div class="create-container">
    <form action="{{route('home-store')}}" method="POST" enctype="multipart/form-data" id="create-form">
        <div class="w-100" id="errors-container">

        </div>
        <div class="create-card">
            @csrf
            <h1>اضافة مسكن جديد</h1>
            <div class="title">
                <label for="title">وصف مختصر لمسكنك</label>
                <input type="text" placeholder="مثال : منزل جديد واسع ومطل" name="title" id="title">
            </div>
            <div>

                <div class="w-2">
                    <label for="city_id">المدينة</label>
                    <div class="field"><select onchange="getPlaces()" name="city_id" id="city_id">
                            <option selected disabled>اختر المدينة</option>
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select><i class="fas fa-map-marked-alt"></i>
                    </div>
                </div>
                <div class="w-2">
                    <label for="place_id">الحي</label>
                    <div class="field"><select name="place_id" id="place_id"></select><i
                            class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="w-3">
                    <label for="no_kitchen">عدد المطابخ</label>
                    <div class="field"><input type="number" name="no_kitchen" id="no_kitchen"><img
                            src="{{asset('img/kitchen.svg')}}" alt="kitchen"></div>
                </div>
                <div class="w-3">
                    <label for="no_baths">عدد الحمامات</label>
                    <div class="field"><input type="number" name="no_baths" id="no_baths"><img
                            src="{{asset('img/bathroom.svg')}}" alt="bathroom"></div>
                </div>
                <div class="w-3">
                    <label for="no_rooms">عدد الغرف</label>
                    <div class="field"><input type="number" name="no_romes" id="no_rooms    "><img
                            src="{{asset('img/lamp.svg')}}" alt="lamp">
                    </div>
                </div>
            </div>
            <div class="area-container">
                <label>المساحة</label>
                <div class="area">
                    <input onkeyup="setArea()" type="number" name="area_height" id="area_height" placeholder="الطول">
                    <input onkeyup="setArea()" type="number" name="area_width" id="area_width" placeholder="العرض">
                </div>
                <input type="text" name="area" id="area" style="display: none;">
            </div>
            <div class="extra-container">
                <label>خدمات اضافية</label>
                <div class="extra">
                    <label for="extra-pool" class="item">
                        <div class="img-container ">
                            <img src="{{asset('img/pool.svg')}}" alt="pool">
                        </div>
                        <h5>مسبح</h5>
                        <input type="checkbox" name="extra_pool" value="1" id="extra-pool">

                    </label>

                    <label for="extra-home" class="item">
                        <div class="img-container">
                            <img src="{{asset('img/home.svg')}}" alt="home">
                        </div>
                        <h5>بيت شعر</h5>
                        <input type="checkbox" name="extra_home" value="3" id="extra-home">
                    </label>

                    <label for="extra-tv" class="item">
                        <div class="img-container">
                            <img src="{{asset('img/tv.svg')}}" alt="tv">
                        </div>
                        <h5>شاشات</h5>
                        <input type="checkbox" name="extra_tv" value="2" id="extra-tv">
                    </label>
                </div>
            </div>
            <div class="uploadimages-container">
                <div class="title">
                    <h3>الصور</h3>
                    <label for="images"><i class="far fa-images" style="color: white; margin-right:5px; "></i>اختر
                        صور</label>
                </div>
                <input type="file" class="hidden" id="images" onchange="showImage(this)" multiple name="image[]"
                    accept="image/*">
                <div id="images-container">

                </div>
            </div>

            <div>
                <h5 style="width: 100%; text-align: right; margin: 15px 0 0 0;">الاسعار / لليوم</h5>
            </div>
            <div class="price">
                <div class="price-type">
                    <div class="img-container"><img src="{{asset('img/sun.png')}}" alt="sun"></div>
                    <h3>الافتراضي</h3>
                    <div></div>
                </div>
                <div class="price-container">
                    <h2>ريال</h2>
                    <input type="number" name="default_price" id="default_price">
                </div>
            </div>

            <div class="price">
                <div class="price-type">
                    <div class="img-container" style="background-color: #82B9E9;"><img
                            src="{{asset('img/ramadan.png')}}" alt="ramadan"></div>
                    <h3>رمضان</h3>
                    <div></div>
                </div>
                <div class="price-container">
                    <h2>ريال</h2>
                    <input type="number" name="ramadan_price" id="ramadan_price">
                </div>
            </div>
            <div class="price">
                <div class="price-type">
                    <div class="img-container" style="background-color: #D9BC48;"><img src=" {{asset('img/hajj.png')}}"
                            alt="hajj"></div>
                    <h3>الحج</h3>
                    <div></div>
                </div>
                <div class="price-container">
                    <h2>ريال</h2>
                    <input type="number" name="hajj_price" id="hajj_price">
                </div>
                </label>
            </div>
            <div class="submitButton" id="submitButton">
                <button type="submit">اضف المسكن</button>
            </div>
    </form>
</div>


<script>
    function showImage(input) {
    if (input.files) {

        $('#images-container').html('');
            for (let index = 0; index < input.files.length; index++) 
            {
                var reader = new FileReader();

                const element = input.files[index];
                reader.onload = function (e) {
                    $('#images-container').append(
                        `<div class="d-flex flex-column m-2" style="width: fit-content;">
                            <img class="rounded border" src="`+e.target.result+`" alt="img" width="100" height="100">

                        </div>`);
                    };
                reader.readAsDataURL(element);
            } 

        }

    }

    function setArea() {

        let height = $('#area_height').val();
        let width = $('#area_width').val();

        $('#area').val(height+'*'+width);
        
    }


        function getPlaces() {

            let city_id = $('#city_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') ,
                }
            });

            $.ajax({
                url: '/city/'+city_id+'/places',
                type: 'GET',
                success: function (response) {
                    console.log(response);

                    $('#place_id').html('<option selected disabled>اختيار المنطقة</option>');
                    $.each(response,function (index,value) {
                        $('#place_id').append('<option value="'+value.id+'">'+value.name+'</option>');
  
                    })


                },
                error: function (xhr, ajaxOptions, error){
                    console.log(error);
                }
            });
            
        }


        $('.item').click(function (){
            
            $(this).find('.img-container').addClass("color-blue");
        });



        $('#create-form').on('submit', function (e) {
        // prevent the form from reloading the page
        e.preventDefault();

        // send the add using ajax
        // disable the submit button
        $('#submitButton').prop('disabled', true);
               $('#errors-container').html('');
                
               // get an array of keys and values
               // where the keys are the form inputs names
               // and the values are the form inputs values
               var formInputsArray = new FormData(this);
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
           
               $.ajax({
                   cache: false,
                   contentType: false,
                   processData: false,
                   url: '{{route('home-store')}}',
                   type: 'POST',
                   data: formInputsArray,
                   dataType:'json',
                   success: function (response) {
                       window.location.href = '{{route('owner-myhomes')}}';
                    
                   }, error: function (xhr, ajaxOptions, error) {
                       console.log(error);
                       console.log(ajaxOptions);
                       console.log(xhr.responseJSON.errors);
                    
                       $.each(xhr.responseJSON.errors , function(index,value){
                           $('#errors-container').append(
                           `<div class="alert alert-danger w-100 text-right" role="alert">
                           `+value+`
                           </div>`
                           );
                       });
                       $("html, body").animate({ scrollTop: 0 }, "slow");
                           // on slide up complete
                           // enable the submit button again
                           $('#submitButton').prop('disabled', false);
                       }
                   
               });
           });


        
</script>


@endsection