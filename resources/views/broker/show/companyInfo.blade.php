<h4 class="card-title">Company Information</h4>
<div class="my-4">
    <div class="table-responsive table-hover table-bordered">
        <table class="table mb-0">
            <tbody>
                <tr>
                    <th class="text-left" style="width: 300px">Company Type</th>
                    <td class="text-left" style="width: 300px">: &nbsp;{{$resource->company_type}}</td>

                    <th class="text-left" style="width: 300px">Company Name</th>
                    <td class="text-left" style="width: 300px">: &nbsp;{{$resource->company_name}}</td>
                </tr>

                <tr>
                    <th class="text-left">State</th>
                    <td class="text-left">: &nbsp;{{$resource->state}}</td>

                    <th class="text-left">Trade License</th>
                    <td class="text-left">: &nbsp;{{$resource->trade_license}}</td>
                </tr>

                <tr>
                    <th class="text-left">Trade License Expiry</th>
                    <td class="text-left">: &nbsp;{{$resource->trade_license_expiry}}</td>

                    <th class="text-left">Rera Certificate</th>
                    <td class="text-left">: &nbsp;{{$resource->rera_certificate}}</td>
                </tr>

                <tr>
                    <th class="text-left">Rera Certificate Expiry</th>
                    <td class="text-left">: &nbsp;{{$resource->rera_certificate_expiry}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>