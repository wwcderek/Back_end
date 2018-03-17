@extends('layouts.app')

@section('content')
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
            LATEST FILM
        </h3>
    </div>
    <div class="row" style="margin: 30px;">
        @if (is_array($films) || is_object($films))
            @foreach ($films as $film)
                    <div class="col-md-4">
                        <img class="card-img-top" alt="Bootstrap Thumbnail Third" src="{{ $film->path }}"  style="width: 350px;height: 200px;" />
                        <h2>
                        {{ empty($film->title) ? "-" : $film->title }}
                        </h2>
                        <p style="height:100px;">
                            {{ empty($film->description) ? "-" : $film->description  }}
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-md-6">
                                     <a class="btn">View details</a>
                                </div>
                                <div class="col-md-6">
                                    <button
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#film-{{ $film->film_id }}"
                                    >Info
                                    </button>
                                </div>
                            </div>
                        </p>
                    </div>
                @endforeach
            @endif
    </div>

    @foreach ($films as $film)
        @include('detail', ['film' => $film])
    @endforeach
@endsection
