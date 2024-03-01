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
        @font-face {
            font-family: 'Optima LT W02 Roman';
            font-style: normal;
            font-weight: normal;
            src: url("https://db.onlinewebfonts.com/t/c78d5ac2e0567f3d7abc24629e42741f.eot");
            src: url("https://db.onlinewebfonts.com/t/c78d5ac2e0567f3d7abc24629e42741f.eot?#iefix")format("embedded-opentype"),
            url("https://db.onlinewebfonts.com/t/c78d5ac2e0567f3d7abc24629e42741f.woff2")format("woff2"),
            url("https://db.onlinewebfonts.com/t/c78d5ac2e0567f3d7abc24629e42741f.woff")format("woff"),
            url("https://db.onlinewebfonts.com/t/c78d5ac2e0567f3d7abc24629e42741f.ttf")format("truetype"),
            url("https://db.onlinewebfonts.com/t/c78d5ac2e0567f3d7abc24629e42741f.svg#Optima LT W02 Roman")format("svg");
        }

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
            font-family: 'Optima LT W02 Roman', sans-serif;
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

        .table{
            margin: 0;
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
            border: 0 !important;
            /* background-clip: border-box; */
            /* border: 1px solid rgba(30,46,80,.09); */
            border-radius: 0 !important;
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
            font-size: 16px;
            color: #000
        }

        .body-p{
            font-size: 16px;
            color: #000
        }

        .body-table-p{
            font-size: 16px;
            text-align: center !important;
            color: #000;
            font-weight: 100 !important;

        }
        
        .body-heading {
            font-size: 24px;
            text-align:center;
            color: #000
        }

        .body-p-sub{
            font-size: 14px;
            color: #000

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
        <div class="col-lg-12 col-xl-7" style="background-color: #fff">
            <div class="shadow-none m-5" style="background-color: #fff; border: 0;">
                <div class="card-header px-0 py-4 rounded-0 shadown-none" style="background-color: #fff; color: #000; border: 0 !important;">
                    <div class="d-flex justify-content-between">
                        <div class="float-left my-auto">
                            <h1 style="font-size: 38px; font-family: 'Helvetica Neu'" class="m-0">Sales Offer</h1>
                        </div>
                        <div class="">
                            <img src="{{ asset('logo-dark.png')}}" alt="" height="70">
                        </div>
                    </div>
                    
                </div>
                <div class="card-body p-0 mt-2">
                    <div class="p-0">
                        <div class="">
                            <p class="heading-p m-0 mt-1 mb-3" style="line-height: 3" >
                                Thank you for your interest in ESNAAD Developments. We are sending here our offer based on our discussion.
                            </p>
                        </div>
                        <table class="table" style="">
                            <tr>
                                <th style="width: 0px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px; text-align:left">Project</span>
                                </th>
                                <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Unit</span>
                                </th>
                                <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Type</span>
                                </th>
                                <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Saleable Area (Sq ft)</span>
                                </th>
                                <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Selling Price (AED)</span>
                                </th>
                            </tr>
                            <tr>
                                <td style="width: 300px !important; border-bottom: 1.5px #dbdbdb solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px; ">{{ $unit->project->name }}</span>
                                </td>
                                <td style="width: 300px !important; border-bottom: 1.5px #dbdbdb solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px;">D11-SPARK-{{ $unit->name }}</span>
                                </td>
                                <td style="width: 300px !important; border-bottom: 1.5px #dbdbdb solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px; color: #095edb;">{{ $unit->bedroom }} bedroom</span>
                                </td>
                                <td style="width: 300px !important; border-bottom: 1.5px #dbdbdb solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px; color: #095edb;">{{$unit->unit_size_range }}</span>
                                </td>
                                <td style="width: 300px !important; border-bottom: 1.5px #dbdbdb solid !important;" class="text-center">
                                    <span class="body-table-p font-weight-semibold" style="font-size: 16px; color: #095edb;">{{ number_format($unit->unit_price) }}</span>
                                </td>
                            </tr>
                        </table>
                        
                        {{-- 
                            <table class="table table-bordered" style="border-top: 4px #dbdbdb solid; ">
                                
                                <tr>
                                    <td style="width: 150px; border: 1.5px #dbdbdb solid !important;" class="text-center">
                                        <span class="body-table-p font-weight-semibold font-italic" style="font-family: 'Times New Roman'; font-size: 16px;">Bedrooms</span>
                                    </td>
                                    <td style="width: 150px; border: 1.5px #dbdbdb solid !important;" class="text-center">
                                        <span class="body-table-p font-weight-semibold font-italic" style="font-family: 'Times New Roman'; font-size: 16px;">Total Area</span>
                                    </td>
                                    <td style="width: 150px; border: 1.5px #dbdbdb solid !important;" class="text-center">
                                        <span class="body-table-p font-weight-semibold font-italic" style="font-family: 'Times New Roman'; font-size: 16px;">Price (AED)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px; border: 1.5px #dbdbdb solid !important;" class="text-center">
                                        <span class="body-table-p">{{ $unit->bedroom }} bedroom</span>
                                    </td>

                                    <td style="width: 150px; border: 1.5px #dbdbdb solid !important;" class="text-center">
                                        <span class="body-table-p">{{$unit->unit_size_range }}</span>
                                    </td>
                                    <td style="width: 150px; border: 1.5px #dbdbdb solid !important;" class="text-center">
                                        <span class="body-table-p">{{ number_format($unit->unit_price) }}</span>
                                    </td>
                                </tr>
                            </table> 
                        --}}

                        <div class="mt-3">
                            <p class="body-p-sub m-0" style="line-height: 3">* Applicable fees to Dubai Land Department are: 4% of the property net price + AED 5,150 (VAT inc.) oqood fee.</p>
                            <p class="body-p-sub m-0" style="line-height: 2">* Prices and availability are subject to change, offer valid for 48 hours.</p>
                        </div>
                    </div>


                    <div style="background-color: #fff">
                        <div class="px-0 pb-4 my-5">
                            <div class=" pt-4 pb-4" >
                                <p class="body-heading m-0">Standard Payment Plan</p>
                            </div>
                            

                            <table class="table "> 
                                <tr>
                                    <th style="width: 0px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                        <span class="body-table-p font-weight-semibold" style="font-size: 16px; text-align:left">Installment</span>
                                    </th>
                                    <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                        <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Milestone</span>
                                    </th>
                                    <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                        <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Percentage</span>
                                    </th>
                                    <th style="width: 300px !important; border: 1.5px #dbdbdb solid !important; background-color: #d6d6d6 !important;" class="text-center">
                                        <span class="body-table-p font-weight-semibold" style="font-size: 16px;">Amount (AED)</span>
                                    </th>
                                </tr>
                                @foreach($unit_paymentplan[0]->unit_paymentplan_files as $data)
                                    <tr>
                                        <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                            <span class="body-table-p">{{ $loop->index+1 }}</span>
                                        </td>

                                        <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                            <span class="body-table-p">{{ $data->name }}</span>
                                        </td>

                                        <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                            <span class="body-table-p">{{ $data->percentage }}%</span>
                                        </td>

                                        <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                            <span class="body-table-p" style="color: #095edb;">{{ number_format($data->amount, 2) }}</span>
                                        </td>

                                    </tr>
                                @endforeach

                                <tr>
                                    <td style="border-bottom: 1.5px #dbdbdb solid !important;">
                                    </td>
                                    <td style="border-bottom: 1.5px #dbdbdb solid !important;">
                                    </td>
                                    <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important;">
                                        <span class="body-table-p ">Purchase Price</span>
                                    </td>
                                    <td class="text-center" style="border-bottom: 1.5px #dbdbdb solid !important; text-align:;">
                                        <span class="body-table-p" style="color: #095edb;">{{ number_format($unit->unit_price) }}</span>
                                    </td>
                                </tr>

                            </table>
                        </div>

                    </div>


                    <div class="page-break-before pt-5 pb-4 ">
                        <p class="body-heading m-0">Floor Plans</p>
                    </div>
                    @if($unit->unit_floorplan != null)
                        @foreach($unit->unit_floorplan->unit_floorplan_files as $floorplan)
                            <div style="width: 100%; text-align: center;">
                                <img src="{{ asset('uploads/units/floorplans/'.$unit->unit_floorplan->id.'/'.$floorplan->name)}}" class="m-0 text-center" style="width: 100%; margin-bottom: 10px; height: 100%; z-index: -19;">
                            </div>
                        @endforeach
                    @endif
                    
                    

                    
                </div>
            </div>
        </div>
    </div>

    <div class="divFooter px-0 pb-3">
        <div class="mx-5 d-flex justify-content-between">
            <div class=" my-auto">
                <p style="font-size: 12px">
                    This offer is valid for 48 hours from the date of generation and subject to availability of the unit.
                </p>
            </div>
            <div class=" my-auto">
                <p style="font-size: 12px">
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
