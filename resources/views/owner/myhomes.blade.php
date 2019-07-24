@extends('layouts.app')

@section('content')

<div class="myhomes-container">
    <div class="myhomes-card">
        <div class="title">
            <div></div>
            <h1>مساكني</h1>
            <div>
                <div class="btn-addhome" onclick="window.location.href = '{{ route('home-create') }}'">
                    <i class="fas fa-plus-square "></i>
                    <h4>مسكن جديد</h4>
                </div>
            </div>
        </div>
        @if(Session::has('success-added'))
        <div class="alert alert-success w-100 text-right" role="alert">
            {{Session::get('success-added')}}
        </div>
        @endif

        @if(Session::has('success-removed'))
        <div class="alert alert-danger w-100 text-right" role="alert">
            {{Session::get('success-removed')}}
        </div>
        @endif
        <div class="table-head">
            <h3>العنوان</h3>
            <h3>المدينة</h3>
            <h3>الابعاد</h3>
            <h3>السعر الافتراضي</h3>
            <h3>خصائص</h3>
        </div>

        @foreach ($homes as $home)
        <div class="table-row">
            <h4 onclick="window.location.href = '{{ route('home-show',$home->id) }}'">{{$home->title}}</h4>
            <h4>{{$home->place->city->name}}</h4>
            <h4>{{$home->area}}</h4>
            <h4>{{$home->default_price}} ريال</h4>
            <div class="options">

                <button class="edit" onclick="window.location.href = '{{ route('home-edit',$home->id) }}'">
                    <i class="fas fa-pencil-alt"></i> </button>
                <form action="{{ route('home-destroy',$home->id) }}" method="POST" style="display: inline-block;">
                    @method('delete')
                    @csrf
                    <button class="delete" onclick="return confirm('هل انت متأكد من حذف هذا المنزل ؟');">
                        <i class="fas fa-trash-alt"></i> </button>
                </form>
            </div>
        </div>
        @endforeach

    </div>
</div>

<script>




</script>

@endsection