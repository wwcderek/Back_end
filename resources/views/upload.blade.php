@extends('layouts.app')
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
                        <label for="publish">
                            Category
                        </label>
                        <select name="category" id="category" class="btn btn-bitbucket dropdown-toggle" >
                            <option value="" selected disabled hidden>Choose here</option>

                            <option value=1>Action</option>
                            <option value=2>Horror</option>
                            <option value=3>Drama</option>
                            <option value=4>Fiction</option>
                            <option value=5>War</option>
                            <option value=6>Thriller</option>
                            <option value=7>Animation</option>
                            <option value=8>History</option>
                            <option value=9>Romance</option>
                        </select>
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
        </div>
    </div>
@endsection

@section('scripts')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="{{ asset('js/upload.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
@endsection