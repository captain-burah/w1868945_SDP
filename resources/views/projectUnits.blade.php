@extends('layouts.appIn')

@section('content')

@include('unit.topNav')

<div style="padding-top: 150px;">

    @include('unit.project_units')

    @include('unit.unitList')
</div>


@if( Auth::user()->roles[0]->name == "Developer")
    @include('unit.topNav')
    <div style="padding-top: 150px;">
        @include('unit.activeUnits')
        @include('unit.unitList')
    </div>
@elseif( Auth::user()->roles[0]->name == "Real Estate Agent")

    <div style="padding-top: 100px;">
        @include('unit.unitList')
    </div>
@endif
@endsection
