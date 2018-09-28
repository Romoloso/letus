@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form action="{{ route('files.store') }}" enctype="multipart/form-data" method="POST">
                            <p>
                                <label for="photo">
                                    <input type="file" name="photo" id="photo">
                                </label>
                                <label for="photo">
                                    <input type="file" name="photo[]" id="photo">
                                </label>
                                <label for="name">
                                    <input type="text" name="name" value="">
                                </label>
                                <label for="age">
                                    <input type="text" name="age" value="">
                                </label>
                            </p>
                            <button>Upload</button>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
