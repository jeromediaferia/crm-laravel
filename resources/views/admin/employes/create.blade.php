@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.employes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Document</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">
                            Envoyer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
