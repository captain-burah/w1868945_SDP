@extends('layouts.appIn')


@section('appIn_css')

@endsection

@section('content')

@include('unit.topNav')

<div style="padding-top: 150px;">

    @include('unit.show.unit_details')

</div>
@endsection

@section('appIn_js')

@endsection
