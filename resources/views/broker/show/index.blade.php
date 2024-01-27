@extends('layouts.appIn')

@section('appIn_css')
    <style>

        th {
            /* background-color: #f4f4f4 !important; */
        }

        h4 {
            text-decoration: underline;
        }

        .modal-backdrop {
            z-index: 1;
        }

        .modal-content {
            z-index: 2;
        }
    </style>
@endsection

@section('content')

@include('broker.show.topNav')

<div style="padding-top: 150px;">

    {{-- @include('broker.project_units') --}}

    @include('broker.show.brokerBody')
    
</div>
@endsection
