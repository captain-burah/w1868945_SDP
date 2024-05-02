@extends('layouts.appIn')

@section('content')

@include('leads.topNav')

<div style="padding-top: 150px;">

    @include('leads.activeProjects')

    {{-- @include('project.ProjectList') --}}

</div>
@endsection
 