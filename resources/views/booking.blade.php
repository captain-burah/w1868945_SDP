@extends('layouts.appIn')

@section('content')

{{-- @include('booking.topNav') --}}

<div style="padding-top: 100px;">

    {{-- @include('booking.activeBookings') --}}

    @include('booking.bookingList')
</div>
@endsection
