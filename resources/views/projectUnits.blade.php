@extends('layouts.appIn')

@section('content')

@include('unit.topNav')

<div style="padding-top: 150px;">

    @include('unit.project_units')

    @include('unit.unitList')
</div>
@endsection
