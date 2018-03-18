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
                        <td style="padding: 5px">
                            <input id="search_value" name="search_value"
                                   class="form-control"
                                   placeholder="Input user name here"
                                   type="text"
                                   autocomplete="off"
                                   style="position: relative;"
                            />
                        </td>
                        <td>
                            <button id="user_search_btn"
                                    class="btn btn-bitbucket fa fa-search"
                                    type="submit" value="" onclick="searchUser()"
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
                            Username
                        </th>
                        <th>
                            Display Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Role
                        </th>
                        <th>
                            Category
                        </th>
                        <th>
                            Created At
                        </th>
                        <th>
                            Updated At
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="active">
                            <td>
                                {{ empty($user->username) ? "-" : $user->username }}
                            </td>
                            <td>
                                {{ empty($user->displayname) ? "-" : $user->displayname }}
                            </td>
                            <td>
                                {{ empty($user->email) ? "-" : $user->email }}
                            </td>
                            <td>
                                {{ empty($user->role) ? "-" : $user->role }}
                            </td>
                            <td>
                                {{ empty($user->category) ? "-" : $user->category }}
                            </td>
                            <td>
                                {{ empty($user->created_at) ? "-" : $user->created_at }}
                            </td>
                            <td>
                                {{ empty($user->updated_at) ? "-" : $user->updated_at }}
                            </td>
                            <td>
                                <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#user-{{ $user->user_id }}"
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
    @foreach ($users as $user)
        @include('userEdit', ['user' => $user])
    @endforeach
@endsection


@section('scripts')
    <script src="{{ asset('js/user.js') }}"></script>
@endsection
