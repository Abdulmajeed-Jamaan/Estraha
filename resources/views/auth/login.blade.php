@extends('layouts.app')

@section('content')




    <!-- --------------------------------------------------------------- -->
    <!-- -------------------------- Login ------------------------------ -->
    <!-- --------------------------------------------------------------- -->



    <form class="login_form" action="{{ route('login') }}" method="POST">
            @csrf
            <h1>مرحبا</h1>

            @error('email')
                <span class="erorr">{{ $message }}</span>
            @enderror
            <input type="email" placeholder="اسم المستخدم" name="email" value="{{ old('email') }}" required autocomplete="email" >



            @error('password')
                <span class="erorr">{{ $message }}</span>
            @enderror
            <input type="password" placeholder="كلمة المرور" name="password" required autocomplete="current-password">


            @if (Route::has('password.request'))

                 <a href="{{ route('password.request') }}">هل نسيت كلمة المرور ؟</a>

        @endif

            <label>تذكرني
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}></label>


            <input type="submit" value="تسجيل الدخول">
            <a href="{{ route('register') }}" style="text-align: center;">تسجيل حساب جديد
            </a>



        </form>




@endsection
