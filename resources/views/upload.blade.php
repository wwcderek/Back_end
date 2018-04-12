@extends('layouts.master')
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Come and Watch
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (session()->exists('user'))
                        &nbsp;<li><a href="/">Home</a></li>
                        <li><a href="/userList">User List</a></li>
                        &nbsp;<li><a href="/list">Film List</a></li>
                        &nbsp;<li><a href="/film">Create Film</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!session()->exists('user'))
                        <li><a>Login</a></li>
                        <li><a>Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Hello Admin<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="/logout">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

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
</div>
@section('scripts')
    <script src="{{ asset('js/upload.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
@endsection