<!-- Modal -->

<div class="modal fade" id="film-{{ $film->film_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Film Information</h4>
            </div>
            <div class="modal-body">
                <img class="card-img-top" alt="Bootstrap Thumbnail Third" src="{{ $film->path }}"  style="width: 300px;height: 150px;padding:0px; margin:0 auto; left: 0; right: 0; text-align: center; margin-bottom: 30px; margin-left: 50px" />
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td width="30%">Film Title</td>
                        <td width="70%"><input type="text" class="form-control" id="title" value="{{ $film->title }}"/></td>
                    </tr>
                    <tr>
                        <td width="30%">Film Language</td>
                        <td width="70%"><input type="text" class="form-control" id="language" value="{{ $film->language }}"/></td>
                    </tr>
                    <tr>
                        <td width="50%">Film Rating</td>
                        <td width="50%">{{ $film->rating }}</td>
                    </tr>
                    <tr>
                        <td width="50%">Film Running Time</td>
                        <td width="50%">{{ $film->running_time.' mins' }}</td>
                    </tr>
                    <tr>
                        <td width="50%">Film Publish Time</td>
                        <td width="50%">{{ $film->publish_time }}</td>
                    </tr>
                    <tr>
                        <td width="50%">Film Description</td>
                        <td width="50%">{{ $film->description }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">close</span></button>
            </div>
        </div>
    </div>
</div>