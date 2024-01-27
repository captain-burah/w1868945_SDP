<h4 class="card-title mt-5">Authorized Person</h4>

<div class="my-4">
    <div class="table-responsive table-hover table-bordered">
        <table class="table mb-0">
            <tbody>
                <tr>
                    <th class="text-left" style="width: 300px">Name</th>
                    <td class="text-left" style="width: 300px">: &nbsp;{{$resource->authorized_p_name}}</td>

                    <th class="text-left" style="width: 300px">Country</th>
                    <td class="text-left" style="width: 300px">: &nbsp;{{$resource->authorized_p_country}}</td>
                </tr>

                <tr>
                    <th class="text-left">Passport No.</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_passport}}</td>

                    <th class="text-left">Position</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_position}}</td>
                </tr>

                <tr>
                    <th class="text-left">Email</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_email}}</td>

                    <th class="text-left">Contact</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_contact}}</td>
                </tr>

                <tr>
                    <th class="text-left">Address</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_address}}</td>

                    <th class="text-left">City</th>
                    <td class="text-left">: &nbsp;{{$resource->authorized_p_city}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>