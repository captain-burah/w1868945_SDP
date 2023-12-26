@extends('layouts.appIn')


@section('appIn_css')

@endsection

@section('content')

@include('project.topNav')

<div style="padding-top: 150px;">

    @include('project.video.create.form')

    {{-- @include('project.activeProjectsTable') --}}
</div>
@endsection

@section('appIn_js')
    <script src="{{asset('js/pages/form-repeater.int.js')}}"></script>
    <script src="{{asset('libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
