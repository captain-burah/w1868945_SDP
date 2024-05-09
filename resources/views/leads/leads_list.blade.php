
@extends('layouts.appIn')
@section('content')

    <div class="row" style="padding-top: 100px;">
        <div class="col-lg-12 margin-tb mt-10">
            <div class="pull-left">
                <h2>Leads List</h2>
            </div>

        </div>
    </div>
    <div class="card w-100" style="min-height: 100vh">
        <div class="card-header">
            <form action="{{ route('leads.domain_filter') }}" method="POST">
                @csrf
                <div class="row">
                    @php
                    // Define options array
                    $options = [];

                    // Add "All" option to the beginning of the options array
                    $options['All Domains'] = 'All Domains';

                    // Loop through domains and build options array
                    foreach ($domain_lists as $domain => $url) {
                        $url = $url->url;
                        $parsedUrl = parse_url($url);
                        $domain = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';

                        // Remove 'www.' if present
                        $domain = str_replace('www.', '', $domain);

                        // Display the domain only if it's not empty
                        if (!empty($domain)) {
                            // Store both domain and URL in options array
                            $options[$domain] = $url;
                        }
                    }
                    @endphp
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Domain Filter:</strong>
                            {!! Form::select('domain', $options, null, ['placeholder' => 'Select an option', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12"></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </form>

        </div>

   <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="280px">Phone Number</th>
                <th width="280px">Bedrooms</th>
                <th width="280px">URL</th>
                <th width="280px">Domain</th>
                <th width="280px">Question</th>
                <th width="280px">Created At</th>
            </tr>
            @foreach ($leds as $lead)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $lead->name}}</td>
                <td>{{ $lead->email}}</td>
                <td>{{ $lead->country_code}}{{$lead->phone}}</td>
                <td>{{ $lead->bedrooms}}</td>
                <td>{{ $lead->url}}</td>
                <td>
                    @php
                    $url = $lead->url;
                    $parsedUrl = parse_url($url);
                    $domain = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';

                    // Remove 'www.' if present
                    $domain = str_replace('www.', '', $domain);

                    // Display the domain only if it's not empty
                    if (!empty($domain)) {
                        echo $domain;
                    }
                    @endphp
                </td>

                <td>{{ $lead->question1}}</td>
                <td>{{ $lead->created_at->format('j F, Y H:i:s') }}</td>

            </tr>
            @endforeach
        </table>

        </div>
    </div>
@endsection
