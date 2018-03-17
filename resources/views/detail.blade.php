<!-- Modal -->

<div class="modal fade" id="film-{{ $film->film_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Company</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody>
                    {{--@if(isset($user['company']))--}}
                        {{--<tr>--}}
                            {{--<td width="50%">Company Name</td>--}}
                            {{--<td width="50%">{{ $user['company']['name'] }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td width="50%">Company Address</td>--}}
                            {{--<td width="50%">{{ $user['company']['address'] }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td width="50%">Contact Name</td>--}}
                            {{--<td width="50%">{{ $user['company']['contact_name'] }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td width="50%">Contact Mobile</td>--}}
                            {{--<td width="50%">{{ $user['company']['contact_mobile'] }}</td>--}}
                        {{--</tr>--}}
                    {{--@endif--}}
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">close</span></button>
            </div>
        </div>
    </div>
</div>