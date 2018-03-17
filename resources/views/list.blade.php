@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{ $films }}
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
                        Publish Time
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
