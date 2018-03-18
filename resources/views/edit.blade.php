<!-- Modal -->

<div class="modal fade" id="film-{{ $film->film_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Film Information</h4>
            </div>
            <div class="modal-body" style="  padding:0px; margin:0 auto; left: 0; right: 0; text-align: center;">
                <img class="card-img-top" alt="Bootstrap Thumbnail Third" src="{{ $film->path }}"  style="width: 350px;height: 200px;padding:0px; left: 0; right: 0; text-align: center; margin-bottom: 20px; margin-left: 100px; margin-right: 100px" />
                <form id="update-form" action="{{ action('FilmController@updateFilm') }}" method="POST" style="display: none;" >
                    {{ csrf_field() }}
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td width="30%">Film Title</td>
                        <td width="70%"><input type="text" class="form-control" name='title' id="title" value="{{ $film->title }}"/></td>
                    </tr>
                    <tr>
                        <td width="30%">Film Language</td>
                        <td width="70%"><input type="text" class="form-control" id="language" value="{{ $film->language }}"/></td>
                    </tr>
                    <tr>
                        <td width="50%">Film Rating</td>
                        <td width="70%"><input type="text" class="form-control" id="rating" value="{{ $film->rating }}"/></td>
                    </tr>
                    <tr>
                        <td width="50%">Film Running Time</td>
                        <td width="70%"><input type="text" class="form-control" id="running" value="{{ $film->running_time }}"/></td>
                    </tr>
                    <tr>
                        <td width="50%">Film Publish Time</td>
                        <td width="70%"><input type="text" class="form-control" id="publish" value="{{ $film->publish_time }}"/></td>
                    </tr>
                    <tr>
                        <td width="50%">Film Description</td>
                        <td width="70%"><input type="text" class="form-control" id="description" value="{{ $film->description }}"/></td>
                    </tr>
                    </tbody>
                </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">close</span></button>
                <button type="button" class="btn btn-success" id="update-settlement" value="123">Update</button>
            </div>
        </div>
    </div>
</div>