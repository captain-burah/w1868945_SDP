@extends('layouts.appIn')

@section('content')

{{-- @include('broker.topNav') --}}

<div style="padding-top: 150px;">

    {{-- @include('broker.project_units') --}}

    @include('clients.clientList')
</div>
@endsection
