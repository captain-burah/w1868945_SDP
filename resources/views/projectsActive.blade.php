@extends('layouts.appIn')

@section('content')

@if( Auth::user()->roles[0]->name == "Developer")
    @include('project.topNav')

    <div style="padding-top: 150px;">

        @include('project.activeProjects')

        @include('project.ProjectList')
    </div>
@elseif( Auth::user()->roles[0]->name == "Real Estate Agent")

    <div style="padding-top: 100px;">
        @include('project.ProjectList')
    </div>
@elseif( Auth::user()->roles[0]->name == "Master Administrator")
    @include('project.topNav')

    <div style="padding-top: 150px;">

        @include('project.activeProjects')

        @include('project.ProjectList')
    </div>
@endif

@endsection
