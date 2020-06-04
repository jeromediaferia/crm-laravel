@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Image depuis le public</h1>
                <img src="{{asset('storage/images/5ed8aec457791.jpeg')}}" alt="">
                {{dd($image)}}
            </div>
        </div>
    </div>
@endsection
