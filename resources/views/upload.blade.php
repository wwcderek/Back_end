@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="{{route('upload.file')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">

                        <label for="title">
                            Film Title
                        </label>
                        <input type="text" class="form-control" id="title" name="title" />
                    </div>
                    <div class="form-group">

                        <label for="description">
                            Description
                        </label>
                        <input type="text" class="form-control" id="description" name="description" />
                    </div>
                    <div class="form-group">

                        <label for="language">
                            Language
                        </label>
                        <input type="text" class="form-control" id="language" name="language" />
                    </div>
                    <div class="form-group">

                        <label for="run">
                            Running Time
                        </label>
                        <input type="text" class="form-control" id="run" name="run" />
                    </div>
                    <div class="form-group">

                        <label for="publish">
                            Publish Time
                        </label>
                        <input class="form-control" id="publish" name="publish"
                               placeholder="YYYY-MM-DD" type="text"
                               value="{{empty($_GET['publish']) ? "" : $_GET['publish']}}"
                               autocomplete="off"
                               style="position: relative;"
                        />
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
            {{--<div>--}}
                {{--<h2>Show Image</h2>--}}
                {{--<img src="{{ asset('storage/publish/upload/') }}"/>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/upload.js') }}"></script>
@endsection