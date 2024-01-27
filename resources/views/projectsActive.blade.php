@extends('layouts.appIn')

@section('content')

@include('project.topNav')

<div style="padding-top: 150px;">

    @include('project.activeProjects')

    @include('project.ProjectList')

</div>
@endsection
