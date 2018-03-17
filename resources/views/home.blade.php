@extends('layouts.app')

@section('content')
    {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<img class="card-img-top" alt="Bootstrap Thumbnail First" src="http://www.layoutit.com/img/people-q-c-600-200-1.jpg" />--}}
                            {{--<div class="card-block">--}}
                                {{--<h5 class="card-title">--}}
                                    {{--Card title--}}
                                {{--</h5>--}}
                                {{--<p class="card-text">--}}
                                    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<img class="card-img-top" alt="Bootstrap Thumbnail Second" src="http://www.layoutit.com/img/city-q-c-600-200-1.jpg" />--}}
                            {{--<div class="card-block">--}}
                                {{--<h5 class="card-title">--}}
                                    {{--Card title--}}
                                {{--</h5>--}}
                                {{--<p class="card-text">--}}
                                    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<img class="card-img-top" alt="Bootstrap Thumbnail Third" src="http://www.layoutit.com/img/sports-q-c-600-200-1.jpg" />--}}
                            {{--<div class="card-block">--}}
                                {{--<h5 class="card-title">--}}
                                    {{--Card title--}}
                                {{--</h5>--}}
                                {{--<p class="card-text">--}}
                                    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<img class="card-img-top" alt="Bootstrap Thumbnail Third" src="http://101.78.175.101:6780/storage/2018-01-05-23-57-43.jpg"  style="width: 350px;height: 200px;" />--}}
                            {{--<div class="card-block">--}}
                                {{--<h5 class="card-title">--}}
                                    {{--Card title--}}
                                {{--</h5>--}}
                                {{--<p class="card-text">--}}
                                    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<img class="card-img-top" alt="Bootstrap Thumbnail Third" src="http://101.78.175.101:6780/storage/2018-01-06-00-26-08.jpg"  style="width: 350px;height: 200px;" />--}}
                            {{--<div class="card-block">--}}
                                {{--<h5 class="card-title">--}}
                                    {{--Card title--}}
                                {{--</h5>--}}
                                {{--<p class="card-text">--}}
                                    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<img class="card-img-top" alt="Bootstrap Thumbnail Third" src="http://101.78.175.101:6780/storage/2018-01-05-23-57-43.jpg"  style="width: 350px;height: 200px;" />--}}
                            {{--<div class="card-block">--}}
                                {{--<h5 class="card-title">--}}
                                    {{--Card title--}}
                                {{--</h5>--}}
                                {{--<p class="card-text">--}}
                                    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card">--}}
                            {{--<img class="card-img-top" alt="Bootstrap Thumbnail Third" src="http://101.78.175.101:6780/storage/2018-01-05-23-57-43.jpg"  style="width: 350px;height: 200px;" />--}}
                            {{--<div class="card-block">--}}
                                {{--<h5 class="card-title">--}}
                                    {{--Card title--}}
                                {{--</h5>--}}
                                {{--<p class="card-text">--}}
                                    {{--Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                    {{--<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel slide" id="carousel-407761">
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#carousel-407761">
                        </li>
                        <li data-slide-to="1" data-target="#carousel-407761">
                        </li>
                        <li data-slide-to="2" data-target="#carousel-407761">
                        </li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img alt="Carousel Bootstrap First" src="http://101.78.175.101:6780/storage/2018-03-17-01-19-17.jpeg" />
                            <div class="carousel-caption">
                                <h4>
                                    Star War
                                </h4>
                                <p>
                                    Star Wars is an American epic space opera media franchise, centered on a film series created by George Lucas.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="Carousel Bootstrap Second" src="http://101.78.175.101:6780/storage/2018-03-17-01-17-55.jpeg" />
                            <div class="carousel-caption">
                                <h4>
                                    Black Panther
                                </h4>
                                <p>
                                    Black Panther is a 2018 American superhero film based on the Marvel Comics character of the same name. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures.                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="Carousel Bootstrap Third" src="http://101.78.175.101:6780/storage/2018-03-17-01-20-13.jpg" />
                            <div class="carousel-caption">
                                <h4>
                                    Epic
                                </h4>
                                <p>
                                    Epic Movie is a 2007 American comedy film directed and written by Jason Friedberg and Aaron Seltzer and produced by Paul Schiff. It was made in a similar style to Date Movie.
                                </p>
                            </div>
                        </div>
                    </div> <a class="left carousel-control" href="#carousel-407761" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-407761" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h3 style="font-family: Times New Roman, Times, serif; margin-left: 50px">
            MOST POPULAR
        </h3>
    </div>
    <div class="row" style="margin: 30px;">
        @if (is_array($films) || is_object($films))
        @foreach ($films as $film)
            {{ $film->title }}
        @endforeach
        @endif
        {{--<div class="col-md-4">--}}
            {{--<img class="card-img-top" alt="Bootstrap Thumbnail Third" src="http://101.78.175.101:6780/storage/2018-01-05-23-57-43.jpg"  style="width: 350px;height: 200px;" />--}}

            {{--<h2>--}}
                {{--Heading--}}
            {{--</h2>--}}
            {{--<p>--}}
                {{--Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.--}}
            {{--</p>--}}
            {{--<p>--}}
                {{--<a class="btn" href="#">View details »</a>--}}
            {{--</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<img class="card-img-top" alt="Bootstrap Thumbnail Third" src="http://101.78.175.101:6780/storage/2018-01-05-23-57-43.jpg"  style="width: 350px;height: 200px;" />--}}

            {{--<h2>--}}
                {{--Heading--}}
            {{--</h2>--}}
            {{--<p>--}}
                {{--Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.--}}
            {{--</p>--}}
            {{--<p>--}}
                {{--<a class="btn" href="#">View details »</a>--}}
            {{--</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<h2>--}}
                {{--Heading--}}
            {{--</h2>--}}
            {{--<p>--}}
                {{--Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.--}}
            {{--</p>--}}
            {{--<p>--}}
                {{--<a class="btn" href="#">View details »</a>--}}
            {{--</p>--}}
        {{--</div>--}}
    </div>
@endsection
