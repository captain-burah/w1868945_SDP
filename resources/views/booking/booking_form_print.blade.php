<!DOCTYPE html>
<html lang="en">
<head>
    <title>ESNAAD Real Estate Booking Form</title>
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
        span {
            font-weight: 200 !important;
        }
        p{
            line-height: 1.6 !important;
        }
        body {
            background-color: #fff;
            font-family: 'Optima LT W02 Roman';
        }

        h4{
            font-size: 20px;
        }

        .padding {
            padding: 4vw !important
        }
        
        

        .page-break-before {
            page-break-before: always;
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2
        }

        h3 {
            font-size: 16px
        }

        h5 {
            font-size: 14px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Times New Roman'
        }

        .text-dark {
            color: #3d405c !important
        }
        @media print {
        /* style sheet for print goes here */
        .noprint {
            visibility: hidden;
        }
        }




    </style>

</head>
<body >
    <div>
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding" id="content">
    <div class="invoice-box">
            <style>

                @media print 
                {
                    @page {
                        size: A4;
                        margin: 100;
                    }
                }

                @page { size: A4;  margin: 100; }

                @media print {
                    html, body {
                        width: 210mm;
                        height: 297mm;        
                    }
                }
                
                .offer-headings {
                    font-weight: 0;
                    padding: 0;
                    margin: 0;
                    font-size: 14px;
                }

                span{
                    font-size: 14px;
                }
                

                .booking-form-para {
                    text-align: justify;
                    margin: 0;
                    font-size: 14px;
                }

                .booking-form-para-ar {
                    text-align: justify;
                    margin: 0;
                    font-size: 14px;
                }

                .offer-headings-ar {
                    font-size: 14px;
                    padding: 0;
                    margin: 0;
                }
            </style>


            <div class="card ">
                <div class="card-body">
                    <div class="row mb-4 d-flex justify-content-between w-full">
                        <div class="float-left my-auto">
                            <h1>BOOKING FORM</h1>
                        </div>
                        <div class="">
                            <img src="{{ asset('logo-dark.png')}}" alt="" height="62">
                        </div>
                    </div>


                        <div class="row my-4 mx-2 d-flex justify-content-between w-full">
                            <div class="float-left my-auto">
                                <h4 class=" m-0 font-weight-bold">01 - Seller Details</h4>
                            </div>
                            <div class  ="">
                                <h4 class=" m-0 font-weight-bold">01 - بيانات البائع </h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Seller Entity Name: &nbsp; &nbsp;</p> <span>ESNAAD Real Estate Development L.L.C.</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        إسم البائع
                                    </p> 
                                    &nbsp; &nbsp;</p> <span>ESNAAD Real Estate Development L.L.C</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Developer Name: &nbsp; &nbsp;</p> <span>ESNAAD Real Estate Development L.L.C.</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        اسم المطور
                                    </p> 
                                    &nbsp; &nbsp;</p> <span>ESNAAD Real Estate Development L.L.C</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Address: &nbsp; &nbsp;</p> <span>Unit G07, City Walk Building #1, Al Wasl, Dubai</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        العنوان
                                    </p> 
                                    &nbsp;:&nbsp; <span>Unit G07, City Walk Building #1, Al Wasl, Dubai</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Contact No.: &nbsp; &nbsp;</p> <span>+971 4 287 9506</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        رقم الاتصال                        
                                    </p> 
                                    &nbsp;:&nbsp; <span dir="ltr">+971 4 287 9506</span>
                                </div>
                            </div>
                        </div>

                        
                        
                        
                        
                        <div class="row my-4 mx-2 d-flex justify-content-between w-full">
                            <div class="float-left my-auto">
                                <h4 class=" m-0 font-weight-bold">02 - Property Details</h4>
                            </div>
                            <div class  ="">
                                <h4 class=" m-0 font-weight-bold">02 - بيانات العقار   </h4>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Date: &nbsp; &nbsp;</p> <span>{{ \Carbon\Carbon::now()->format('jS \of F Y') }}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        التاريخ
                                    </p> 
                                    &nbsp; &nbsp;</p> <span>{{ \Carbon\Carbon::now()->format('jS \of F Y') }}</span>
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Project: &nbsp; &nbsp;</p> <span>{{$unit->project->name}}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        المشروع
                                    </p> 
                                    &nbsp;:&nbsp; <span>{{$unit->project->name}}</span>
                                </div>
                            </div>
                        </div>
            
                        {{-- <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Property: &nbsp; &nbsp;</p> <span>fdsdf</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        العقار
                                    </p> 
                                    &nbsp;:&nbsp; <span>fdsa</span>
                                </div>
                            </div>
                        </div> --}}
            
                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Unit: &nbsp; &nbsp;</p> <span>{{$unit->name}}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        الوحدة
                                    </p> 
                                    &nbsp;:&nbsp; <span>{{$unit->name}}</span>
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">No. of Bedrooms: &nbsp; &nbsp;</p> <span>{{$unit->bedroom}}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        عدد الغرف
                                    </p> 
                                    &nbsp;:&nbsp; <span>{{$unit->bedroom}}</span>
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Total Area: &nbsp; &nbsp;</p> <span>{{$unit->unit_size_range}}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                    اجمالي المساحة
                                    </p> 
                                    &nbsp;:&nbsp; <span>{{$unit->unit_size_range}}</span>
                                </div>
                            </div>
                        </div>
            
                        {{-- <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">No. of Car Parking Spaces: &nbsp; &nbsp;</p> <span>{{$unit->carpark}}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        عدد مواقف السيارات
                                    </p> 
                                    &nbsp;:&nbsp; <span>{{$unit->carpark}}</span>
                                </div>
                            </div>
                        </div> --}}
            
                        {{-- <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Plot Number: &nbsp; &nbsp;</p> <span>fdsdf</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        رقم الأرض
                                    </p> 
                                    &nbsp;:&nbsp; <span>fdsa</span>
                                </div>
                            </div>
                        </div> --}}
            
                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Project Number: &nbsp; &nbsp;</p> <span>{{$unit->project->id}}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        رقم المشروع
                                    </p> 
                                    &nbsp;:&nbsp; <span>{{$unit->project->id}}</span>
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Purchase Price: &nbsp; &nbsp;</p> <span>AED {{number_format($unit->unit_price, 2)}}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        سعر الشراء
                                    </p> 
                                    &nbsp;:&nbsp; <span>AED {{number_format($unit->unit_price, 2)}}</span>
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">Registration Fees: &nbsp; &nbsp;</p> <span>AED {{number_format($unit->oqood_amount, 2)}}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        مصاريف التسجيل
                                    </p> 
                                    &nbsp;:&nbsp; <span>AED {{number_format($unit->oqood_amount, 2)}}</span>
                                </div>
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="offer-headings">First Payment (Deposit): &nbsp; &nbsp;</p> <span>AED {{ number_format($unit->unit_paymentplan->unit_paymentplan_files[0]->amount, 2)}}</span>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="offer-headings-ar">
                                        الدفعة الأولى العربون  
                                    </p> 
                                    &nbsp;:&nbsp; <span>AED {{ number_format($unit->unit_paymentplan->unit_paymentplan_files[0]->amount, 2)}}</span>
                                </div>
                            </div>
                        </div>








                    <div class="row my-0 mx-2 d-flex justify-content-between w-full">
                            <div class="float-left my-auto">
                                <h4 class=" m-0 font-weight-bold">03 - Purchaser Details</h4>
                            </div>
                            <div class  ="">
                                <h4 class=" m-0 font-weight-bold">03 - بيانات المشتري</h4>
                            </div>
                        </div> 



                        @foreach($unit->clienteles as $clients)

                            <div class="row mt-5 mb-2 mx-2 d-flex justify-content-between w-full">
                                <div class="float-left my-auto">
                                    <h5 class=" m-0"><u>Purchaser {{$loop->iteration}} </u></h5>
                                </div>
                                <div class  ="">
                                    <h5 class=" m-0"><u>Purchaser {{$loop->iteration}} </u></h5>
                                </div>
                            </div>

                            <div class="row border">
                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Name: &nbsp; &nbsp;</p> <span>{{$clients->name}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            الاسم
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->name_ar)
                                                {{$clients->name_ar}}
                                            @else
                                                {{$clients->name}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            
                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">License No. (For Legal Entities): &nbsp; &nbsp;</p><span>fdsdf</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            رقم الرخصة ان وجد
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Country of Incorporation: &nbsp; &nbsp;</p> <span>{{$clients->country_of_residence}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            بلد التأسيس
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->country_of_residence_ar)
                                                {{$clients->country_of_residence_ar}}
                                            @else
                                                {{$clients->country_of_residence}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Nationality: &nbsp; &nbsp;</p> <span>{{$clients->nationality}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            الجنسية
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->nationality_ar)
                                                {{$clients->nationality_ar}}
                                            @else
                                                {{$clients->nationality}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Passport No.: &nbsp; &nbsp;</p> <span>{{$clients->passport}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            رقم الجواز
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->passport)
                                                {{$clients->passport}}
                                            @else
                                                {{$clients->passport}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Address: &nbsp; &nbsp;</p> <span>{{$clients->address1}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            رقم صندوق البريد  
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->address1)
                                                {{$clients->address1}}
                                            @else
                                                {{$clients->address1}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Address: &nbsp; &nbsp;</p> <span>{{$clients->address2}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            رقم صندوق البريد
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->address2)
                                                {{$clients->address2}}
                                            @else
                                                {{$clients->address2}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Contact 01: &nbsp; &nbsp;</p> <span>{{$clients->contact1}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            اتصل بالرقم 01
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->contact1)
                                                {{$clients->contact1}}
                                            @else
                                                {{$clients->contact1}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Contact 02: &nbsp; &nbsp;</p> <span>{{$clients->contact2}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            اتصل بالرقم 02
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->contact2)
                                                {{$clients->contact2}}
                                            @else
                                                {{$clients->contact2}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Contact 03: &nbsp; &nbsp;</p> <span>{{$clients->contact3}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            اتصل بالرقم 03
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->contact3)
                                                {{$clients->contact3}}
                                            @else
                                                {{$clients->contact3}}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Email: &nbsp; &nbsp;</p> <span>{{$clients->email}}</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            الايميل
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->email)
                                                {{$clients->email}}
                                            @else
                                                {{$clients->email}}
                                            @endif
                                        </span>
                                    </div>
                                </div>


                                <div class="col-6 p-3 ">
                                    <div class="d-flex">
                                        <p class="offer-headings">Agency Name: &nbsp; &nbsp;</p> <span>fdsdf</span>
                                    </div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="d-flex" dir="rtl">
                                        <p class="offer-headings-ar">
                                            الوكالة العقارية
                                        </p> 
                                        &nbsp;:&nbsp; <span>
                                            @if($clients->agency)
                                                {{$clients->agency}}
                                            @else
                                                {{$clients->agency}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="row border my-4 ">
                            <div class="col-6 p-3 ">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        3.1 The Purchaser agrees and acknowledges that the address and contact details
                                        set out above are considered to be the Purchaser's primary address and domicile
                                        and shall be included on the Purchaser's Sale and Purchase Agreement and used
                                        for all communications/correspondence with the Purchaser.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 ">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para">
                                        3.1 يوافق المشتري ويقر بأن العنوان وتفاصيل االتصال الموضحة أعاله تعتبر عنوان المشتري
                                        الرئيسي ومحل إقامته ويجب تضمينها في اتفاقية البيع والشراء الخاصة بالمشتري واستخدامها في
                                        جميع االتصاالت/المراسالت مع المشتري.
                                    </p>
                                </div>
                            </div>
                        </div>








                        <div class=" mt-5 pt-5 row my-0 mx-2 d-flex justify-content-between w-full">
                            <div class="float-left my-auto">
                                <h4 class=" m-0 font-weight-bold">04 - Payment Schedule</h4>
                            </div>
                            <div class  ="">
                                <h4 class=" m-0 font-weight-bold">04 - طريقة الدفع</h4>
                            </div>
                        </div> 

                        
                        <div class="row border my-4">
                            <div class="col-6 p-3 ">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        4.1 The Purchaser unconditionally, irrevocably, and finally agrees to
                                        purchase the Property from the Vendor at the above Purchase Price, in
                                        accordance with the below Payment Schedule.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        4.1 يوافق المشتري بشكل غير مشروط وغير قابل للنقض وأخيرًا على شراء العقار من البائع بسعر الشراء المذكور أعلاه، وفقًا لجدول الدفع أدناه.
                                    </p>
                                </div>
                            </div>
                        </div>



                        <div class="row my-4">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Serial No.<br>رقم القسط</th>
                                    <th>Milestone<br>مرحلة الدفع</th>
                                    <th>Payment Percentage<br>نسبة الدفع </th>
                                    <th>Due Date<br>تاريخ الاستحقاق</th>
                                    <th>Amount<br>المبلغ</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Downpayment</td>
                                    <td>20%</td>
                                    <td>On Booking</td>
                                    <td>{{ number_format( $unit->unit_price * 0.2) }}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>1st Installment</td>
                                    <td>5%</td>
                                    <td>
                                        @foreach($units_paymentplans as $pp)
                                            @if($pp[0] == $unit->id)
                                                @isset($pp[1])
                                                    {{$pp[1]}}
                                                @endisset
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ number_format( $unit->unit_price * 0.05) }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2nd Installment</td>
                                    <td>10%</td>
                                    <td>
                                        @foreach($units_paymentplans as $pp)
                                            @if($pp[0] == $unit->id)
                                                @isset($pp[2])
                                                    {{$pp[2]}}
                                                @endisset
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ number_format( $unit->unit_price * 0.10) }}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>3rd Installment</td>
                                    <td>10%</td>
                                    <td>
                                        @foreach($units_paymentplans as $pp)
                                            @if($pp[0] == $unit->id)
                                                @isset($pp[3])
                                                    {{$pp[3]}}
                                                @endisset
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ number_format( $unit->unit_price * 0.10) }}</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>4th Installment</td>
                                    <td>5%</td>
                                    <td>
                                        @foreach($units_paymentplans as $pp)
                                            @if($pp[0] == $unit->id)
                                                @isset($pp[4])
                                                    {{$pp[4]}}
                                                @endisset
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ number_format( $unit->unit_price * 0.05) }}</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>5th Installment</td>
                                    <td>10%</td>
                                    <td>
                                        @foreach($units_paymentplans as $pp)
                                            @if($pp[0] == $unit->id)
                                                @isset($pp[5])
                                                    {{$pp[5]}}
                                                @endisset
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ number_format( $unit->unit_price * 0.10) }}</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>6th Installment</td>
                                    <td>10%</td>
                                    <td>
                                        @foreach($units_paymentplans as $pp)
                                            @if($pp[0] == $unit->id)
                                                @isset($pp[6])
                                                    {{$pp[6]}}
                                                @endisset
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ number_format( $unit->unit_price * 0.10) }}</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Final Payment</td>
                                    <td>30%</td>
                                    <td>
                                        On Completion
                                    </td>
                                    <td>{{ number_format( $unit->unit_price * 0.30) }}</td>
                                </tr>
                            </table>
                        </div>


                        <div class="row  my-4">

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        4.2 All payments shall be made to the Seller to such account prescribed by
                                        the Seller from time to time in United Arab Emirates dirhams (AED).
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        4.2 أن كافة الدفعات التي يقوم بدفعها المشتري للبائع بموجب عرض الشراء هذا تتم بالدرهم الإماراتي (العملة القانونية لدولة الإمارات العربية المتحدة).
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        4.3 All payments made by the Purchaser shall be paid free of exchange,
                                        encumbrance and/or any bank charges and without any deduction or set-
                                        off
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        4.3 يتم سداد جميع المدفوعات التي يقوم بها المشتري بدون عمولات صرف و/أو أعباء و/أو أي رسوم مصرفية ودون أي خصم أو مقاصة.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        4.4 The Purchaser shall pay the above Deposit by means of payment
                                        acceptable to the Vendor on the date of signing hereof (or on any other
                                        date specified by the Vendor in writing for this purpose). The Vendor may,
                                        at its sole discretion, request the Purchaser to pay the above Deposit by
                                        more than one means of payment (such as, and without limitation, to pay a
                                        portion of the Deposit by credit card or cheque and the balance to be
                                        affected by wire transfer to the Vendor's bank account). The Purchaser
                                        agrees to and accepts the foregoing provisions and that except
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar" dir="rtl">
                                        4.4 يقوم المشتري بدفع العربون المذكور أعلاه بواسطة وسيلة دفع مقبولة من البائع بتاريخ توقيع عرض الشراء هذا (أو بأي تاريخ آخر يحدده البائع خطيا لهذه الغالية). ويحق للبائع، وفقا لتقديره المطلق، الطلب من المشتري دفع العربون المذكور أعلاه بواسطة أكثر من وسيلة دفع (على سبيل المثال لا الحصر أن يتم دفع جزء من العربون بواسطة بطاقة الائتمان أو الشيك والرصيد المتبقي بواسطة حوالة بنكية إلى حساب البائع المصرفي). قبل المشتري ووافق على
                            جميع ما تقدم وبأن العربون (أو أي جزء مدفوع منه) باستثناء جميع ما تقدم وبأن العربون أو أي جزء مدفوع منه .
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        4.5 In addition to the Purchase Price, the Purchaser agrees to pay on the
                                        date of this Offer to Purchase, all pre-registration/registration charges, and
                                        any other related amounts, as may be levied by the Land Department from
                                        time to time, for the pre-registration/registration of the Property with the
                                        Land Department. The pre-registration and/or final registration charges
                                        may be changed by the Land Department and/or the Vendor from time to
                                        time, and the Purchaser undertakes to pay any additional or changed
                                        charges. Moreover, the Purchase Price is exclusive of all taxes which shall
                                        be borne by the Purchaser.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        4.5 بالإضافة إلى ثمن الشراء، يوافق المشتري على دفع بتاريخ عرض الشراء هذاء كافة رسوم التسجيل الميتني التسجيل النهائي واية مبالغ أخرى ذات الصلة قد تفرضها دائرة الأراضي والأملاك من وقت إلى آخر لتسجيل الوحدة العقارية لدى دائرة الأراضي والأملاك وقد تقوم دائرة الأراضي والأملاك والو الباقع من وقت لآخر بتعديل مبلغ التسجيل المبدئي و/أو رسوم التسجيل النهائي، ويتعهد المشتري بدفع أي رسم تسجيل إضافي  علاوة على ذلك فإن ثمن الشراء لا يشمل الضرائب وسوف يتحملها المشتري.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        4.6 The Seller reserves the right to charge interest of an annual 5%
                                        (compounded daily) for any payment that is not received in cleared funds
                                        on or before its due date.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        4.6 يحتفظ البائع بالحق في تحصيل فائدة سنوية بنسبة 5% (متراكمة يوميًا) مقابل أي دفعة لم يتم استلامها في أموال المقاصة في تاريخ استحقاقها أو قبله.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        4.7 Under no circumstances may the Purchaser make cash payments
                                        which total in the aggregate more than forty thousand Dirhams (AED
                                        40,000). This aggregate limit applies to each Purchaser regardless of how
                                        many Units are purchased.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        4.7 لا يجوز للمشتري تحت أي ظرف من الظروف سداد دفعات نقدية يبلغ مجموعها أكثر من أربعين ألف درهم (40,000 درهم إماراتي). ينطبق هذا الحد الإجمالي على كل مشتري بغض النظر عن عدد الوحدات المشتراة.
                                    </p>
                                </div>
                            </div>
                        </div>




                        
                    


                        <div class="page-break-before mt-5 pt-5 row my-0 mx-2 d-flex justify-content-between w-full">
                            <div class="float-left my-auto">
                                <h4 class=" m-0 font-weight-bold">05 - Terms & Conditions</h4>
                            </div>
                            <div class  ="">
                                <h4 class=" m-0 font-weight-bold">05 - الشروط والأحكام  </h4>
                            </div>
                        </div> 

                        
                        <div class="row  my-4">
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.1 This unconditional and irrevocable Offer to Purchase the Property is
                                        made by the above-mentioned purchaser(s) (the "Purchaser") to the
                                        seller and is binding on the Purchaser.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.1 يتم تقديم هذا العرض غير المشروط وغير القابل للإلغاء لشراء العقار من قبل المشتري المذكور أعلاه ("المشتري") إلى البائع وهو ملزم للمشتري.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.2 The parties should initial all the pages and sign on the Execution
                                        Page.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.2 يجب على الأطراف كتابة الأحرف الأولى على جميع الصفحات والتوقيع على صفحة التنفيذ.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.3 This Reservation Agreement only reserves the Unit for the Purchaser
                                        (the Reservation) and grants the Purchaser the right to purchase the Unit
                                        subject to the fulfilment of the conditions herein. No other right, title or
                                        ownership is granted by this Reservation Agreement.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.3 تحتفظ اتفاقية الحجز هذه بالوحدة للمشتري فقط (الحجز) وتمنح المشتري الحق في شراء الوحدة بشرط استيفاء الشروط الواردة هنا. لا تمنح اتفاقية الحجز هذه أي حق أو سند ملكية أو ملكية أخرى.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.4 The final plans for the Project and the Unit are subject to approval by
                                        competent authorities including the Master Developer, and at the time of
                                        this Reservation Agreement, the design, size, number and layout of the
                                        Unit and the floors in the Project and Unit area may be subject to change.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.4 تخضع المخططات النهائية للمشروع والوحدة لموافقة السلطات المختصة بما في ذلك المطور الرئيسي، وفي وقت اتفاقية الحجز هذه، يتم تحديد تصميم الوحدة وحجمها وعددها وتخطيطها والطوابق في المشروع والوحدة قد تكون المنطقة عرضة للتغيير.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.5 The Seller shall have all rights to freely assign at any time
                                        this Offer to Purchase or any part thereof or any benefit,
                                        right, obligation or interest therein or thereunder to any of its
                                        affiliates and subsidiaries (including to any joint venture
                                        company in which the Vendor, its parent company or any of their 
                                        affiliates or subsidiaries is a shareholder) without the
                                        need for the Purchaser's consent.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.5 يتمتع البائع بجميع الحقوق في التنازل بحرية في أي وقت عن عرض الشراء هذا أو أي جزء منه أو أي منفعة أو حق أو التزام أو مصلحة فيه أو بموجبه لأي من الشركات التابعة له والشركات التابعة له (بما في ذلك أي شركة مشروع مشترك يكون فيها البائع البائع أو الشركة الأم أو أي من الشركات التابعة له أو الشركات التابعة له هو مساهم) دون الحاجة إلى موافقة المشتري.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.6 The Purchaser agrees and acknowledges that the information it has
                                        provided in this Booking Form is complete and accurate and the
                                        Purchaser can be contacted by way of the contact details provided. If
                                        the Purchaser wishes to make a change to such information the
                                        Purchaser will require to issue to the Seller a formal written request
                                        signed by the Purchaser.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.6 يوافق المشتري ويقر بأن المعلومات التي قدمها في نموذج الحجز هذا كاملة ودقيقة ويمكن الاتصال بالمشتري عن طريق تفاصيل الاتصال المقدمة. إذا كان المشتري يرغب في إجراء تغيير على هذه المعلومات، فسوف يطلب المشتري أن يصدر للبائع طلبًا كتابيًا رسميًا موقعًا من المشتري.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.7 If the Purchaser is a company, only companies incorporated in any
                                        Economic Department or Freezones (Dubai Land Department “DLD”
                                        approved Freezones) in UAE will be entitled to enter into this Reservation
                                        Agreement and the Purchaser must comply with the DLD requirements
                                        for attestation of any documents from the Ministry of Foreign Affairs in
                                        UAE as and when required.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.7 إذا كان المشتري شركة، يحق فقط للشركات المدرجة في أي دائرة اقتصادية أو مناطق حرة (المناطق الحرة المعتمدة من دائرة الأراضي والأملاك في دبي) في دولة الإمارات العربية المتحدة الدخول في اتفاقية الحجز هذه ويجب على المشتري الالتزام بمتطلبات دائرة الأراضي والأملاك في دبي للتصديق على أي مستندات من وزارة الخارجية في دولة الإمارات العربية المتحدة عند الطلب
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.8 The Purchaser acknowledges and agrees that the Purchaser shall
                                        be solely liable for the payment of all the Additional Fees (including
                                        Registration Fee and Oqood Fee payable to DLD) net of any Incentives
                                        and for any and all other fees and charges that may be levied by the DLD
                                        or any other relevant authority in respect of the Property.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.8 يقر المشتري ويوافق على أنه سيكون مسؤولاً وحده عن دفع جميع الرسوم الإضافية (بما في ذلك رسوم التسجيل ورسوم العقود المستحقة لدائرة الأراضي والأملاك) صافية من أي رسوم وعن أي وجميع الرسوم والمصاريف الأخرى التي قد تفرضها دائرة الأراضي والأملاك في دبي أو أي سلطة أخرى ذات صلة فيما يتعلق بالعقار .
                                    </p>
                                </div>
                            </div>

                            <div class=" col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.9 The Purchaser guarantees at the Purchaser's sole responsibility that
                                        all payments of any kind made under or pursuant to this Agreement,
                                        including the Installment Payments, whether made by the Purchaser or
                                        by a third party payor on the Purchaser's behalf, are paid by funds of
                                        legitimate source and that the same are not the proceeds of any crime
                                        or illegal activity and are not, or could not reasonably be considered to
                                        be, the subject matter of money laundering in any way whatsoever
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.9 يضمن المشتري على مسؤوليته المنفردة بأن جميع الدفعات من أي نوع كانت التي تتم عملاً بهذه الاتفاقية، بما في ذلك  اقساط ثمن البيع، سواء تم سدادها من قبل المشتري أو من قبل أي شخص آخر نيابة عن المشتري، يتم دفعها بواسطة أموال من مصدر شرعي، وأن هذه المبالغ ليست من عائدات أي جريمة أو نشاط غير قانوني وليست أو لا يمكن اعتبارها بشكل معقول، موضوع غسيل الأموال بأي شكل من الأشكال.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.10 The Purchaser hereby confirms that its payment obligations under
                                        this Booking Form is not subject to its ability to secure a mortgage loan
                                        or financing.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.10 يؤكد المشتري بموجب هذا أن التزامات الدفع الخاصة به بموجب نموذج الحجز هذا لا تخضع لقدرته على تأمين قرض رهن عقاري أو تمويل
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.11 The Purchaser hereby agrees and undertakes to enter into an SPA
                                        in the form procured to be provided with such agreement by the Seller.
                                        The Purchaser shall pay the Deposit by means of payment that are
                                        acceptable to the Seller on the signing of this Booking Form. by signing
                                        this Booking form The Purchaser agrees and acknowledges that the
                                        Deposit and the required Dubai Land Department fees for pre-
                                        registration are not refundable to the Purchaser for any reason
                                        whatsoever.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.11 يوافق المشتري بموجب هذه الاتفاقية ويتعهد بالدخول في اتفاقية البيع والشراء بالشكل الذي تم توفيره مع هذه الاتفاقية من قبل البائع. يجب على المشتري دفع الوديعة عن طريق الدفع المقبول لدى البائع عند التوقيع على نموذج الحجز هذا. من خلال التوقيع على نموذج الحجز هذا، يوافق المشتري ويقر بأن الوديعة ورسوم دائرة الأراضي والأملاك في دبي المطلوبة للتسجيل المسبق غير قابلة للاسترداد إلى المشتري لأي سبب كان
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.12 This Booking Form has been drafted in English and in the event of
                                        any discrepancy between the English language and the Arabic
                                        translation, the provisions set out in English shall prevail and be
                                        applicable.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.12 تمت صياغة نموذج الحجز هذا باللغتين الإنجليزية والعربية، وفي حالة وجود أي تعارض بين اللغة الإنجليزية والترجمة العربية، تسري الأحكام المنصوص عليها باللغة الإنجليزية وتطبق.
                                    </p>
                                </div>
                            </div>


                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.13 This Booking Form shall be governed by and construed in
                                        accordance with the laws of the Emirate of Dubai and the applicable
                                        Federal Laws of the United Arab Emirates. All disputes between the
                                        Seller and the Purchaser shall be referred to the Dubai Courts (excluding
                                        the DIFC Courts who will have no jurisdiction over such disputes.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.13 يخضع عرض الشراء هذا ويفسر وفقاً لقوانين إمارة دبي والقوانين الاتحادية لدولة الإمارات العربية المتحدة كما هي معمول بها في إمارة دبي. وتحال جميع المنازعات بين الطرفين فيما يختص أو يتعلق بعرض الشراء هذا لمحاكم دبي. ومنعا للشك، فإن قوانين مركز دبي المالي العالمي غير مطبقة ومحاكم مركز دبي المالي العالمي لا اختصاص لها.
                                    </p>
                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex">
                                    <p class="booking-form-para">
                                        5.14 By signing this Booking Form, the Purchaser acknowledges that the
                                        Agency stated under Section 2 above has introduced the Purchaser to
                                        the Seller in respect of the Property.
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex" dir="rtl">
                                    <p class="booking-form-para-ar">
                                        5.14 من خلال التوقيع على نموذج الحجز هذا، يقر المشتري بأن الوكالة المذكورة في القسم 2 أعلاه قد قدمت المشتري إلى البائع فيما يتعلق بالعقار.
                                    </p>
                                </div>
                            </div>
                        </div>












                        <div class=" page-break-before mt-5 pt-5 row mt-0 mx-2 d-flex justify-content-between w-full">
                            <div class="float-left my-auto">
                                <h4 class=" m-0 font-weight-bold">06 - The Agency Information</h4>
                            </div>
                            <div class  ="">
                                <h4 class=" m-0 font-weight-bold">06 - معلومات الوكيل العقاري</h4>
                            </div>
                        </div> 
                        
                        <div class="row my-4">
                            <div class="col-6 p-3 border">
                                <div class="d-flex my-4">
                                    <p class="booking-form-para">Are you being assisted by any of Vendor's registered agents: </p>

                                </div>
                                <div class="d-flex my-4">
                                    <p class="booking-form-para">Ageny Name: </p>

                                </div>
                                <div class="d-flex my-4">
                                    <p class="booking-form-para">Ageny Representative's Name: </p>

                                </div>
                                <div class="d-flex my-4">
                                    <p class="booking-form-para">Ageny Representative's Signature: </p>

                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex my-4" dir="rtl">
                                    <p class="booking-form-para">هل تمت معرفتك بالبائع من خلال وكلاء البائع المسجلين :   </p>

                                </div>
                                <div class="d-flex my-4" dir="rtl">
                                    <p class="booking-form-para">اسم الوكالة :</p>

                                </div>
                                <div class="d-flex my-4" dir="rtl">
                                    <p class="booking-form-para">اسم ممثل الوكالة :</p>

                                </div>
                                <div class="d-flex my-4" dir="rtl">
                                    <p class="booking-form-para">توقيع ممثل الوكالة : </p>

                                </div>
                            </div>

                            <div class="col-6 p-3 border">
                                <div class="d-flex my-5">
                                    <p class="booking-form-para">Purchaser Signature: </p>

                                </div>
                                <div class="d-flex my-5">
                                    <p class="booking-form-para">Sales Advisor Name & Signature:: </p>

                                </div>
                            </div>
                            <div class="col-6 p-3 border">
                                <div class="d-flex my-5">
                                    <p class="booking-form-para">توقيع المشتري : </p>

                                </div>
                                <div class="d-flex my-5">
                                    <p class="booking-form-para">اسم وتوقيع مستشار المبيعات : </p>

                                </div>
                            </div>
                        </div>


                        <div class="row my-5">
                            <div class="col-6 p-3 ">
                                <div class="d-flex my-5">
                                    <p class="booking-form-para">Seller Signature: </p>

                                </div>
                            </div>
                            <div class="col-6 p-3 ">
                                <div class="d-flex my-5">
                                    <p class="booking-form-para">Purchaser Signature: </p>

                                </div>
                            </div>
                        </div>
                    {{-- </form> --}}


                    <div class="page-break-before row mt-5 pt-5 mb-5 mx-2 d-flex justify-content-between w-full">
                        <div class="float-left my-auto">
                            <h4 class=" m-0 font-weight-bold">07 - Floor Plan</h4>
                        </div>
                        <div class  ="">
                            <h4 class=" m-0 font-weight-bold">07 - مخطط الطابق</h4>
                        </div>
                    </div> 



                    {{-- {{$unit_floorplan[0]->unit_floorplan_files}} --}}

                    @if(isset($unit_floorplan))
                        <div style="width: 100%; text-align: center;" class="border">
                            <img src="{{ asset('uploads/units/floorplans/'.$unit_secondary_floorplan_id.'/'.$unit_floorplan_booking->unit_floorplan_files[0]->name)}}" class="mx-auto text-center" style="width: 80%; padding: 35px; margin-bottom: 10px">
                        </div>
                    @endif


                    

                </div>
            </div>

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


<script>
    // Function to trigger print after a delay
    function delayedPrint() {
      setTimeout(function() {
        window.print();
      }, 2000); // Adjust delay time in milliseconds (2000 milliseconds = 2 seconds)
    }

    // Call the delayedPrint function when the page loads
    window.onload = function() {
      delayedPrint();
    };
  </script>
</html>
