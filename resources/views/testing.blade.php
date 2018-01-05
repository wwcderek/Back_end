@extends('layouts.master')
@section('content')
<div>
{!! QrCode::size(200)->generate('test'); !!}
</div>
@endsection

