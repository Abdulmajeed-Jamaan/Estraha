@extends('layouts.app')

@section('content')


    <!-- --------------------------------------------------------------- -->
    <!-- -------------------------- Register --------------------------- -->
    <!-- --------------------------------------------------------------- -->



    <form class="login_form" action="{{ route('register') }}" method="POST" onsubmit="return checkRole()">
            @csrf
            <h1>حساب جديد</h1>


            @error('name')
                <span class="erorr">{{ $message }}</span>
            @enderror
            <input type="text" placeholder="اسم المستخدم" name="name" value="{{ old('name') }}" required  >


            @error('email')
                <span class="erorr">{{ $message }}</span>
            @enderror
            <input type="email" placeholder="الايميل" name="email" value="{{ old('email') }}" required  >


            @error('phone')
                <span class="erorr">{{ $message }}</span>
            @enderror
            <input type="number" min="0" step="1" placeholder="رقم الهاتف مثال : 0555145214" name="phone" value="{{ old('phone') }}" required  >

            @error('password')
                <span class="erorr">{{ $message }}</span>
            @enderror
            <input type="password" placeholder="كلمة المرور" name="password" required autocomplete="current-password">
            <input type="password" placeholder="تأكيد كلمة المرور" name="password_confirmation" required autocomplete="current-password">

            <span  id="role_erorr" class="erorr"></span>
            <div class="roles">
                <label id="label_role_1" for="role_1" onclick="toggleRadio()"> باحث عن استراحة
                    <input id="role_1" type="radio" name="role" value="1"  required>
                </label>
                <label id="label_role_2" for="role_2" onclick="toggleRadio()">صاحب استراحة
                        <input id="role_2" type="radio" name="role" value="2" >
                    </label>
            </div>



            <input type="submit" value="تسجيل حساب جديد">

            <a href="{{ route('login') }}" style="text-align: center;">لديك حساب ؟ سجل دخولك</a>



        </form>



        <script>

            function toggleRadio() {
                var radios = document.getElementsByName("role");
                for (i = 0; i < radios.length; i++) {
                        if (i == 1) {
                            if(radios[i].checked){
                                radios[i].parentElement.classList.add("checked_left");
                            }else{
                                radios[i].parentElement.classList.remove("checked_left");
                            }
                        }else if (i == 0){

                            if(radios[i].checked){
                                radios[i].parentElement.classList.add("checked_right");
                            }else{
                                radios[i].parentElement.classList.remove("checked_right");
                            }

                        }


                    }
                    document.getElementById("role_erorr").innerHTML = "";


            }

            function checkRole() {

                    //Validate the Gender field
                    var radioBoxes = document.getElementsByName("role");
                    var genderSelected = false;
                    for ( var i = 0; i < radioBoxes.length; i++)
                    {
                         if(radioBoxes[i].checked == true)
                         {
                            genderSelected = true;
                            break;
                         }
                    }

                            if (genderSelected == false){
                                document.getElementById("role_erorr").innerHTML = "الرجاء الاختيار";

                            }

                            return genderSelected;

            }




        </script>
@endsection
