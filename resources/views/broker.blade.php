@extends('layouts.appIn')

@section('content')

@include('broker.topNav')

<div style="padding-top: 150px;">

    {{-- @include('broker.project_units') --}}

    @include('broker.brokerList')
</div>
@endsection
