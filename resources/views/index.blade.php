@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($homes as $home)
                        <img src="{{asset('storage/img/'.$home->images->first()->file_name)}}" width= "100px" height=100px alt="images">

                    @endforeach
                    You are in index screen yaaay !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


