<!-- Modal -->

<div class="modal fade" id="film-{{ $film->film_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Film Information</h4>
            </div>
            <div class="modal-body">
                <form id="update-form" action="{{ action('FilmController@updateFilm') }}" method="POST" >
                    {{ csrf_field() }}
                    <input type="hidden" name="film_id" id="film_id" value="{{ $film->film_id }}}">
                    <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td width="30%">Film Title</td>
                        <td width="70%"><input type="text" class="form-control" name='title' id="title" value="{{ $film->title }}"/></td>
                    </tr>
                    <tr>
                        <td width="30%">Category</td>
                        <td width="70%">
                            <select name="category" id="category" class="btn btn-bitbucket dropdown-toggle" >
                                <option value="" selected disabled hidden>{{ $film->type }}</option>
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
                    </tr>
                    <tr>
                        <td width="30%">Film Language</td>
                        <td width="70%"><input type="text" class="form-control" name='language' id="language" value="{{ $film->language }}"/></td>
                    </tr>
                    <tr>
                        <td width="50%">Film Rating</td>
                        <td width="70%"><input type="text" class="form-control" name='rating' id="rating" value="{{ $film->rating }}"/></td>
                    </tr>
                    <tr>
                        <td width="50%">Film Running Time</td>
                        <td width="70%"><input type="text" class="form-control" name='running' id="running" value="{{ $film->running_time }}"/></td>
                    </tr>
                    <tr>
                        <td width="50%">Film Description</td>
                        <td width="70%"><input type="text" class="form-control" name='description' id="description" value="{{ $film->description }}"/></td>
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