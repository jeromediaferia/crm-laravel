@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Image depuis le public</h1>
                <img src="{{ route('admin.image', $image->name) }}" alt="">
            </div>
        </div>
    </div>
@endsection
