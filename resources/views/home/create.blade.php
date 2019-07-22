@extends('layouts.app')

@section('content')

<div class="create-container">
    <div class="create-card">
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
                <div class="field"><select name="place_id" id="place_id"></select><i class="fas fa-map-marker-alt"></i>
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
                <div class="field"><input type="number" name="no_rooms" id="no_rooms    "><img
                        src="{{asset('img/lamp.svg')}}" alt="lamp">
                </div>
            </div>
        </div>
        <div class="area-container">
            <label>المساحة</label>
            <div class="area">
                <input onkeyup="setArea()" type="number" name="" id="area_height" placeholder="الطول">
                <input onkeyup="setArea()" type="number" name="" id="area_width" placeholder="العرض">
            </div>
            <input type="text" name="area" id="area" style="display: none;">
        </div>
        <div class="extra-container">
            <label>خدمات اضافية</label>
            <div class="extra">
                <div class="item">
                    <div class="img-container">
                        <img src="{{asset('img/pool.svg')}}" alt="pool">
                    </div>
                    <h5>مسبح</h5>
                </div>

                <div class="item">
                    <div class="img-container">
                        <img src="{{asset('img/home.svg')}}" alt="home">
                    </div>
                    <h5>بيت شعر</h5>
                </div>

                <div class="item">
                    <div class="img-container">
                        <img src="{{asset('img/tv.svg')}}" alt="tv">
                    </div>
                    <h5>شاشات</h5>
                </div>
            </div>
        </div>
        <div>
            <h3>الصور</h3>
            <div class="uploadimages-container">
                <input type="file" class="hidden" id="images" onchange="showImage(this)" multiple name="image[]"
                    accept="image/*">
                <label for="inputGroupFile01">اضف صور</label>
            </div>
        </div>
        <div>
            <h3>حدد الوقع على الخريطة</h3>
        </div>
        <div>
            <h3>الاسعار</h3>
        </div>
        <div class="price">
            <div class="price-type">
                <img-container><img src="" alt=""></img-container>
                <h3></h3>
                <div></div>
            </div>
            <div class="price-container">
                <h2></h2>
                <input type="number" name="" id="">
            </div>
        </div>

    </div>
</div>


<script>
    function showImage(input) {
    if (input.files) {


            for (let index = 0; index < input.files.length; index++) 
            {
                var reader = new FileReader();

                const element = input.files[index];
                reader.onload = function (e) {
                    $('#uploadimages-container').append(
                        `<div class="d-flex flex-column m-2">
                            <img class="rounded-top border" src="`+e.target.result+`" alt="img" width="100" height="100">
                            <span class=" btn-danger border text-lg text-center font-weight-bold rounded-bottom cursor-pointer" onclick="removeElement(this)">×</span>
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

        function removeElement(input) {
        
        var element = input;
        element.parentNode.parentNode.removeChild(element.parentNode);
        return false;
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
</script>


@endsection