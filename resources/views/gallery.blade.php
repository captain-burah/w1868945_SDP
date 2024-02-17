@extends('layouts.appIn')

@section('content')

{{-- @include('website.community.topNav') --}}

<div style="padding-top: 150px;">

    @include('website.gallery.header')

    @include('website.gallery.show')

</div>
@endsection
