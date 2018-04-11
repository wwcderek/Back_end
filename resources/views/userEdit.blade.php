<!-- Modal -->

<div class="modal fade" id="user-{{ $user->user_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">User Information</h4>
            </div>
            <div class="modal-body">
                <form id="update-form" action="{{ action('UserController@updateUser') }}" method="POST" >
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}}">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td width="30%">Username</td>
                            <td width="70%"><input type="text" class="form-control" name='username' id="username" value="{{ $user->username }}"/></td>
                        </tr>
                        <tr>
                            <td width="30%">Display Name</td>
                            <td width="70%"><input type="text" class="form-control" name='displayname' id="displayname" value="{{ $user->displayname }}"/></td>
                        </tr>
                        <tr>
                            <td width="50%">Email</td>
                            <td width="70%"><input type="text" class="form-control" name='email' id="email" value="{{ $user->email }}"/></td>
                        </tr>
                        <tr>
                            <td width="50%">Role</td>
                            <td width="70%">
                                <select name="role" id="role" class="btn btn-bitbucket dropdown-toggle" >
                                    <option value="" selected disabled hidden>Choose here</option>
                                    <option value='user'>user</option>
                                    <option value='user'>staff</option>
                                    <option value='admin'>admin</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">close</span></button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>