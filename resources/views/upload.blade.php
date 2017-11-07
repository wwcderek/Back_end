@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="{{route('upload.file')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">

                        <label for="exampleInputEmail1">
                            Film Title
                        </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" />
                    </div>
                    <div class="form-group">

                        <label for="exampleInputPassword1">
                            Description
                        </label>
                        <input type="password" class="form-control" id="exampleInputPassword1" />
                    </div>
                    <div class="form-group">

                        <label for="exampleInputFile">
                            File input
                        </label>
                        <input type="file" id="exampleInputFile" name="file"/>
                        <p class="help-block">
                            Example block-level help text here.
                        </p>
                    </div>
                    <div class="checkbox">

                        <label>
                            <input type="checkbox" /> Check me out
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">
                        Submit
                    </button>
                </form>
            </div>
            <div>
                <h2>Show Image</h2>
                <img src="{{ asset('storage/publish/upload/') }}"
            </div>
        </div>
    </div>
@stop