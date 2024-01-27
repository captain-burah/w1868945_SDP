@extends('layouts.appIn')


@section('appIn_css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/repeaterjs@1.5.5/dist/repeater.css">

@endsection





@section('content')
    <div style="padding-top: 100px;">

        @if($form_type == 'form0')
            @include('booking.create.form0_projects')
        @elseif($form_type == 'form0_units')
            @include('booking.create.form1_units')
        @elseif($form_type == 'form1')
            @include('booking.create.form2_clients')
        @elseif($form_type == 'form2')
            @include('booking.create.form3_agency')
        @elseif($form_type == 'form3')
            @include('booking.create.form4_offer')
        @elseif($form_type == 'form4')
            @include('booking.create.form4')
        @endif

    </div>
@endsection





@section('appIn_js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/repeaterjs@1.5.5/dist/repeater.js"></script>

    {{-- <script src="{{ asset('js/repeater.js')}}"></script> --}}

    @yield('booking-form-one-js')

    

    
@endsection
