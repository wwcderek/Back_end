@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table>
                <thead>
                <tr>
                    <th style="padding-left: 5px">Search</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select id="search_type" class="btn btn-bitbucket dropdown-toggle" >
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
                    </td>
                    <td style="padding: 5px">
                        <input id="search_value" name="search_value"
                               class="form-control"
                               placeholder="Input single keyword here"
                               type="text"
                               autocomplete="off"
                               style="position: relative;"
                        />
                    </td>
                    <td>
                        <button id="user_search_btn"
                                class="btn btn-bitbucket fa fa-search"
                                type="submit" value="" onclick=""
                        >
                            Search
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>
                        Title
                    </th>
                    <th>
                        Language
                    </th>
                    <th>
                        Rating
                    </th>
                    <th>
                        Running Time
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Published At
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
               @foreach($films as $film)
                <tr class="active">
                    <td>
                        {{ empty($film->title) ? "-" : $film->title }}
                    </td>
                    <td>
                        {{ empty($film->language) ? "-" : $film->language }}
                    </td>
                    <td>
                        {{ empty($film->rating) ? "-" : $film->rating }}
                    </td>
                    <td>
                        {{ empty($film->running_time) ? "-" : $film->running_time." mins" }}
                    </td>
                    <td>
                        {{ empty($film->type) ? "-" : $film->type }}
                    </td>
                    <td>
                        {{ empty($film->publish_time) ? "-" : $film->publish_time }}
                    </td>
                    <td>
                        <button
                                type="button"
                                class="btn btn-primary"
                        >Edit
                        </button>
                    </td>
                </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


{{--@section('scripts')--}}
    {{--<script src="{{ asset('js/film.js') }}"></script>--}}
{{--@endsection--}}
