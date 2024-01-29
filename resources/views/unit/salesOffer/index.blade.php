<!DOCTYPE html>
<html lang="en">
<head>
    <title>SALES OFFER | ESNAAD Real Estate Development</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <style>
        @page {
            size: A4;
        }
        @page:right{
            @bottom-right {
                content: counter(page);
            }
        }
        @font-face {
            font-family: 'Optima';
            src: local('Optima'), url({{asset('fonts/OptimaLite.woff')}}) format('opentype');
        }

        @page {
            margin: 0;
        }

        
        body{
            font-family: 'Optima', sans-serif;
            margin: 0;
            padding: 0;
            border: 1px #eee solid;
        }

        .card-footer-btn {
            display: flex;
            align-items: center;
            /* border-top-left-radius: 0!important; */
            /* border-top-right-radius: 0!important; */
        }

        .text-uppercase-bold-sm {
            text-transform: uppercase!important;
            font-weight: 500!important;
            letter-spacing: 2px!important;
            font-size: .85rem!important;
        }
        
        .justify-content-center {
            justify-content: center!important;
        }


        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            /* background-clip: border-box; */
            /* border: 1px solid rgba(30,46,80,.09); */
            /* border-radius: 0.25rem; */
            /* box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%); */
        }

        .p-5 {
            padding: 3rem!important;
        }


        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .table td, .table th {
            border-bottom: 0;
            border-top: 1px solid #edf2f9;
        }

        .px-0 {
            padding-right: 0!important;
            padding-left: 0!important;
        }

        .table thead th, tbody td, tbody th {
            vertical-align: middle;
        }

        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .mt-5 {
            margin-top: 3rem!important;
        }

        .heading-p{
            font-size: 14px;
        }

        .body-p{
            font-size: 14px;
        }

        .body-table-p{
            font-size: 14px;
            text-align: center !important;
        }
        
        .body-heading {
            font-size: 24px;
            text-align:center;
        }

        .body-p-sub{
            font-size: 14px;

        }

        .page-break-before {
            page-break-before: always;
        }



        @media screen {
            div.divFooter {
                display: none;
            }
        }
        @media print {
            div.divFooter {
                position: fixed;
                bottom: 0;
                width: 100vw;
            }
            
        }
    </style>
</head>
<body >
    <div class="mt-6 mb-7 px-0">
        <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-7">
            <div class="card border-2 m-4">
                <div class="card-header px-5" style="background-color: #e6e6e6">
                    <div class="d-flex justify-content-between">
                        <div class="float-left my-auto">
                            <h1 style="font-size: 34px" class="m-0">SALES OFFER</h1>
                        </div>
                        <div class="">
                            <img src="{{ asset('logo-dark.png')}}" alt="" height="80">
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="heading-p m-0 mt-3">{{ \Carbon\Carbon::now('Asia/Dubai')->format('d.m.Y ') }}</p>
                        <p class="heading-p m-0 mt-3">Dear Customer,</p>
                        <p class="heading-p m-0 mt-1">
                            Thank you for your interest in Esnaad Properties. We are sending here our offer based on our discussion.
                        </p>
                    </div>
                </div>
                <div class="card-body p-0">
                
                    <div class="p-5">
                        <table class="table table-bordered" >
                            <tr>
                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-bold">Project Name</span>
                                </td>

                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-bold">Unit</span>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    <span class="body-table-p">{{ $unit->project->name }}</span>
                                </td>
                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    @if($unit->project->name == "The Spark by ESNAAD")
                                    <span class="body-table-p">D11-SPARK-{{ $unit->name }}</span>
                                    @endif
                                </td>   
                            </tr>
                        </table>

                        <table class="table table-bordered">
                            
                            <tr>
                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-bold">Bedrooms</span>
                                </td>
                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-bold">Total Area</span>
                                </td>
                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-bold">Price (AED)</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    <span class="body-table-p">{{ $unit->bedroom }}</span>
                                </td>

                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    <span class="body-table-p">{{$unit->unit_size_range }}</span>
                                </td>
                                <td style="width: 150px; border: 1.5px #000 solid !important;" class="text-center">
                                    <span class="body-table-p">{{ number_format($unit->unit_price) }}</span>
                                </td>
                            </tr>
                        </table>

                        <div class="">
                            <p class="body-p-sub m-0" style="line-height: 2">*Applicable fees to Dubai Land Department are: 4% of the property net price + AED 3,150 (VAT inc.) oqood fee.</p>
                            <p class="body-p-sub m-0" style="line-height: 2">*Prices and availability are subject to change without notice.</p>
                        </div>
                    </div>
                    <div style="background-color: #e6e6e6">
                        <div class="px-5 pb-4">
                        <div class="border-top border-gray-200 pt-4 pb-4 mt-4" >
                            <p class="body-heading m-0">Payment Plans</p>
                        </div>
                        

                        <table class="table table-bordered "> 
                            <tr>
                                <td class="text-center" style="border: 1.5px #000 solid !important;">
                                    <span class="body-table-p font-weight-bold">Installment</span>
                                </td>
                                <td class="text-center" style="border: 1.5px #000 solid !important;">
                                    <span class="body-table-p font-weight-bold">Milestone</span>
                                </td>
                                <td class="text-center" style="border: 1.5px #000 solid !important;">
                                    <span class="body-table-p font-weight-bold">Percentage</span>
                                </td>
                                <td class="text-center" style="border: 1.5px #000 solid !important;">
                                    <span class="body-table-p font-weight-bold">Amount (AED)</span>
                                </td>
                            </tr>
                            @foreach($unit_paymentplan[0]->unit_paymentplan_files as $data)
                                <tr>
                                    <td class="text-center" style="border: 1.5px #000 solid !important;">
                                        <span class="body-table-p">{{ $loop->index+1 }}</span>
                                    </td>

                                    <td class="text-center" style="border: 1.5px #000 solid !important;">
                                        <span class="body-table-p">{{ $data->name }}</span>
                                    </td>

                                    <td class="text-center" style="border: 1.5px #000 solid !important;">
                                        <span class="body-table-p">{{ $data->percentage }}%</span>
                                    </td>

                                    <td class="text-center" style="border: 1.5px #000 solid !important;">
                                        <span class="body-table-p ">{{ number_format($data->amount, 2) }}</span>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                        </div>

                    </div>


                    <div class="page-break-before pt-5 pb-4 ">
                        <p class="body-heading m-0">Floor Plans</p>
                    </div>
                    @if($unit->unit_floorplan != null)
                        @foreach($unit->unit_floorplan->unit_floorplan_files as $floorplan)
                            <div style="width: 100%; text-align: center;">
                                <img src="{{ asset('uploads/units/floorplans/'.$unit->unit_floorplan->id.'/'.$floorplan->name)}}" class="mx-auto text-center" style="width: 80%; padding: 35px; margin-bottom: 10px; height: 100%; z-index: -19;">
                            </div>
                        @endforeach
                    @endif
                    
                    

                    
                </div>
            </div>
        </div>
    </div>

    <div class="divFooter px-5 pb-3">
        <div class="d-flex justify-content-between">
            <div class=" my-auto">
                <p style="font-size: 10px">
                    This offer is valid for 24 hours from the date of generation and subject to availability of the unit.
                </p>
            </div>
            <div class=" my-auto">
                <p style="font-size: 10px">
                    Issued by: {{ Auth::user()->name }} | Timestamp: {{ \Carbon\Carbon::now('Asia/Dubai')->format('d.m.Y h:i:s A') }}


                </p>
            </div>
        </div>
    </div>

</body>

<script>
var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
</script>
</html>
