<h4 class="card-title mt-5">Banking Information</h4>

<div class="my-4">
    <div class="table-responsive table-hover table-bordered">
        <table class="table mb-0">
            <tbody>
                <tr>
                    <th class="text-left" style="width: 300px">Bank Name</th>
                    <td class="text-left" style="width: 300px">: &nbsp;{{$resource->authorized_p_name}}</td>

                    <th class="text-left" style="width: 300px">Country</th>
                    <td class="text-left" style="width: 300px">: &nbsp;{{$resource->authorized_p_country}}</td>
                </tr>

                <tr>
                    <th class="text-left">City</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_passport}}</td>

                    <th class="text-left">Account Number</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_position}}</td>
                </tr>

                <tr>
                    <th class="text-left">IBAN</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_email}}</td>

                    <th class="text-left">Account Title</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_contact}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>