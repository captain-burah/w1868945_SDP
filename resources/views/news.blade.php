@extends('layouts.appIn')

@section('content')

{{-- @include('website.community.topNav') --}}

<div style="padding-top: 150px;">

    @include('website.news.header')

    @include('website.news.show')

</div>
@endsection
