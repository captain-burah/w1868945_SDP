@extends('layouts.appIn')

@section('content')

{{-- @include('website.community.topNav') --}}

<div style="padding-top: 150px;">

    @include('website.blogs.header')

    @include('website.blogs.show')

</div>
@endsection
