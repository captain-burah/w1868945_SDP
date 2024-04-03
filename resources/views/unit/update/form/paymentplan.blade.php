

<div class="row mt-5">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price">Unit Price in AED  <span class="text-muted font-weight-light">&#40;do not use any number format&#41;</span></label>
            <input
                type="number"
                name="price"
                class="form-control
                @error('price') border border-solid border-danger  @enderror"
                id="price"
                placeholder="0"
                value="{{ $unit->unit_price }}"
                style="font-size: 24px;"
                min="0"            >
            @error('price')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

<div id="validatedSection">
<div class="row mt-5">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="price">Dubai Land Department &#40;DLD&#41; Fees </label>
            <input
                type="number"
                name="dld_fees"
                class="form-control
                @error('dld_fees') border border-solid border-danger  @enderror"
                id="dld_fees"
                value="{{  $unit->dld_fees }}"
                step="0.01"
                disabled
            >
            <span class="text-muted font-weight-light pt-2">&#40;do not use any number format&#41;</span>
            @error('dld_fees')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="price">Admin Fees <span class="text-muted font-weight-light pt-2">&#40;including VAT&#41;</span></label>
            <input
                type="number"
                name="admin_fees"
                class="form-control
                @error('oqood') border border-solid border-danger  @enderror"
                id="admin_fees"
                value="5250"
                disabled
            >
            <span class="text-muted font-weight-light pt-2">&#40;do not use any number format&#41;</span>
            @error('admin_fees')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="card-body">
        <h4 class="card-title mb-4">Milestones</h4>

        <div class="row" id="disabledSection">

            <div class="mb-3 col-lg-4">
                <label>Description</label>
            </div>

            <div class="mb-3 col-lg-4">
                <label>Percentage (%)</label>
            </div>

            <div class="mb-3 col-lg-4">
                <label id="amnt">Amount</label>
            </div>
        </div>

        @if($unit->unit_paymentplan->unit_paymentplan_files->isNotEmpty())
            @foreach($unit->unit_paymentplan->unit_paymentplan_files as $paymentplan)
                <div class="row" id="disabledSection">
                
                    <div class="mb-1 col-lg-4">
                        <p>{{$paymentplan->name}}</p>
                    </div>

                    <div class="mb-1 col-lg-4">
                        <p>{{$paymentplan->percentage}}</p>
                    </div>

                    <div class="mb-1 col-lg-4">
                        <p>{{$paymentplan->amount}}</p>
                    </div>
                </div>
            @endforeach
        @endif


    </div>
</div>



<div class="row mt-4">
    <div class="card-body">
        <h4 class="card-title mb-4">Update Milestones</h4>

        <div class="row" id="disabledSection">
            
            <div class="mb-3 col-lg-3">
                <label for="milestone">Opening Balance</label>
                <input type="text" id="hiddenOutstandingBalance_0" name="hiddenOutstandingBalance_0" class="form-control form-control-sm" value="0" style="opacity: 0.6; pointer-events: none; ">
            </div>

            <div class="mb-3 col-lg-3">
                <label for="milestone">Description</label>
                <div class="d-flex justify-content-start">
                    <input type="text" id="milestone_1" name="group_a[1][milestone]" class="form-control form-control-sm" value="Down Payment on Booking" disabled>
                </div>
            </div>

            <div class="mb-3 col-lg-3">
                <label for="percentage">Percentage (%)</label>
                <input type="number" id="percentage_0" name="group_a[0][percentage]" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>

            <div class="mb-3 col-lg-3">
                <label for="amount" id="amnt">Amount</label>
                <input type="number" id="amount_0" name="group_a[0][amount]" value="" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Remaining Balance</label> --}}
                <input type="text" id="hiddenOutstandingBalance_1" name="hiddenOutstandingBalance_1" class="form-control form-control-sm" value="0" style="opacity: 0.6; pointer-events: none; ">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Description</label> --}}
                <div class="d-flex justify-content-start">
                    <input type="text" id="milestone_1" name="group_a[1][milestone]" class="form-control form-control-sm" value="3" disabled>
                    <span class="text-nowrap my-auto h-full" style="font-size: 12px;">&nbsp; 03 Months from Booking</span>
                </div>
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="percentage">Percentage (%)</label> --}}
                <input type="number" id="percentage_1" name="group_a[1][percentage]" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="amount" id="amnt">Amount</label> --}}
                <input type="number" id="amount_1" name="group_a[1][amount]" value="" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>
        </div>


        <div class="row">
            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Remaining Balance</label> --}}
                <input type="text" id="hiddenOutstandingBalance_2" name="hiddenOutstandingBalance_2" class="form-control form-control-sm" value="0" style="opacity: 0.6; pointer-events: none; ">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Description</label> --}}
                <div class="d-flex justify-content-start">
                    <input type="text" id="milestone_2" name="group_a[2][milestone]" class="form-control form-control-sm" value="6" disabled>
                    <span class="text-nowrap my-auto h-full" style="font-size: 12px;">&nbsp; 06 Months from Booking</span>
                </div>
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="percentage">Percentage (%)</label> --}}
                <input type="number" id="percentage_2" name="group_a[2][percentage]" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="amount" id="amnt">Amount</label> --}}
                <input type="number" id="amount_2" name="group_a[2][amount]" value="" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Remaining Balance</label> --}}
                <input type="text" id="hiddenOutstandingBalance_3" name="hiddenOutstandingBalance_3" class="form-control form-control-sm" value="0" style="opacity: 0.6; pointer-events: none; ">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Description</label> --}}
                <div class="d-flex justify-content-start">
                    <input type="text" id="milestone_3" name="group_a[3][milestone]" class="form-control form-control-sm" value="9" disabled>
                    <span class="text-nowrap my-auto h-full" style="font-size: 12px;">&nbsp; 09 Months from Booking</span>
                </div>
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="percentage">Percentage (%)</label> --}}
                <input type="number" id="percentage_3" name="group_a[3][percentage]" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="amount" id="amnt">Amount</label> --}}
                <input type="number" id="amount_3" name="group_a[3][amount]" value="" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Remaining Balance</label> --}}
                <input type="text" id="hiddenOutstandingBalance_4" name="hiddenOutstandingBalance_4" class="form-control form-control-sm" value="0" style="opacity: 0.6; pointer-events: none; ">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Description</label> --}}

                <div class="d-flex justify-content-start">
                    <input type="text" id="milestone_4" name="group_a[4][milestone]" class="form-control form-control-sm" value="12" disabled>
                    <span class="text-nowrap my-auto h-full" style="font-size: 12px;">&nbsp; 12 Months from Booking</span>
                </div>
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="percentage">Percentage (%)</label> --}}
                <input type="number" id="percentage_4" name="group_a[4][percentage]" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="amount" id="amnt">Amount</label> --}}
                <input type="number" id="amount_4" name="group_a[4][amount]" value="" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Remaining Balance</label> --}}
                <input type="text" id="hiddenOutstandingBalance_5" name="hiddenOutstandingBalance_5" class="form-control form-control-sm" value="0" style="opacity: 0.6; pointer-events: none; ">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Description</label> --}}
                <div class="d-flex justify-content-start">
                    <input type="text" id="milestone_5" name="group_a[5][milestone]" class="form-control form-control-sm" value="15" disabled>
                    <span class="text-nowrap my-auto h-full" style="font-size: 12px;">&nbsp; 15 Months from Booking</span>
                </div>
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="percentage">Percentage (%)</label> --}}
                <input type="number" id="percentage_5" name="group_a[5][percentage]" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="amount" id="amnt">Amount</label> --}}
                <input type="number" id="amount_5" name="group_a[5][amount]" value="" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Remaining Balance</label> --}}
                <input type="text" id="hiddenOutstandingBalance_6" name="hiddenOutstandingBalance_6" class="form-control form-control-sm" value="0" style="opacity: 0.6; pointer-events: none; ">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Description</label> --}}
                <div class="d-flex justify-content-start">
                    <input type="text" id="milestone_6" name="group_a[6][milestone]" class="form-control form-control-sm" value="18" disabled>
                    <span class="text-nowrap my-auto h-full" style="font-size: 12px;">&nbsp; 18 Months from Booking</span>
                </div>
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="percentage">Percentage (%)</label> --}}
                <input type="number" id="percentage_6" name="group_a[6][percentage]" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="amount" id="amnt">Amount</label> --}}
                <input type="number" id="amount_6" name="group_a[6][amount]" value="" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Remaining Balance</label> --}}
                <input type="text" id="hiddenOutstandingBalance_7" name="hiddenOutstandingBalance_7" class="form-control form-control-sm" value="0" style="opacity: 0.6; pointer-events: none; ">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="milestone">Description</label> --}}
                <input type="text" id="milestone_7" name="group_a[7][milestone]" class="form-control form-control-sm" value="Final Payment Completion Q3 2025" disabled>
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="percentage">Percentage (%)</label> --}}
                <input type="number" id="percentage_7" name="group_a[7][percentage]" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>

            <div class="mb-3 col-lg-3">
                {{-- <label for="amount" id="amnt">Amount</label> --}}
                <input type="number" id="amount_7" name="group_a[7][amount]" value="" class="form-control form-control-sm"  min=0 disabled step="0.01">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-lg-3">

            </div>

            <div class="mb-3 col-lg-3">
                
            </div>

            <div class="mb-3 col-lg-3">
                <label for="percentage">Total Percentage: <span id="total_percentage"></span>%</label>
            </div>

            <div class="mb-3 col-lg-3">
                <label for="amount" id="amnt">Total Amount: <span id="total_amount"></span></label>
            </div>
        </div>
        
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function() {
        // Function to check the value of the trigger input
        $('#price').on('keyup', function() {
            // Get the value of the specific input field
            var inputValue = $(this).val() // Trim any whitespace

            // Check if the input value matches the specific condition (e.g., "enable")
            if (inputValue > 0) {
                // Enable the section of input fields
                $('#disabledSection input').prop('disabled', false);
                $('#validatedSection input').prop('disabled', false);

                var price = parseFloat($('#price').val());
                var dldVal = parseFloat(price * 0.04);
                var adminFeeVal = parseFloat(5250);
                $('#dld_fees').val(dldVal);
                $('#admin_fees').val(adminFeeVal);
                $('#hiddenOutstandingBalance_0').val(price);
                
            } else {
                // Disable the section of input fields
                $('#disabledSection input').prop('disabled', true);
                $('#validatedSection input').prop('disabled', true);
            }
        });


        $('input[id^="percentage_"]').on('blur', function() {
            // Extract the index from the ID
            var index = $(this).attr('id').split('_')[1];
            
            // Call the function when the focus is lost from the percentage field
            getCurrentIndex2(index);
        });

    });

    function getCurrentIndex2(index) {
        $(document).ready(function() {
            var percentage = '#percentage_' + index;
            var amount = '#amount_' + index;
            var outstandingBalanceIndex = '#hiddenOutstandingBalance_' + index;
            var price = parseFloat($('#price').val());
            var total_amount_text = $('#total_amount').text().trim();
            var total_percentage_text = $('#total_percentage').text().trim();

            var total_amount = parseFloat(total_amount_text) || 0;
            var total_percentage = parseFloat(total_percentage_text) || 0;

            if(total_amount == price) return;
            if(total_percentage == 100) return;
            

            // GET PRICE

            // GET OUTSTANDING BALANCE
            var outstandingBalance = parseFloat($(outstandingBalanceIndex).val());
            console.log('initial balance value ' + outstandingBalance);

            // RETURN NOTHING IF OUTSTANDING IS ZERO
            if(outstandingBalance <= 0) return;

            // GET ENTERED PERCENTAGE
            var percentageValue = parseFloat($(percentage).val());

            // If the percentageValue is not a valid number, return early
            if (isNaN(percentageValue)) return;

            // CALCULATE FINAL AMOUNT
            var finalAmount = (percentageValue * price) / 100;
            console.log(finalAmount);

            // GET THE NEW OUTSTANDING BALANCE
            var newOutstandingBalance = outstandingBalance - finalAmount;

            // INCREMENT THE INDEX BY ONE
            var newIndex = parseInt(index)+1;
            var newIndexString = newIndex.toString();
            var nextOutstandingBalance = '#hiddenOutstandingBalance_' + newIndex;

            // RETURN NOTHING IF NEW OUTSTANDING IS ZERO
            if (newOutstandingBalance < 0) return;

            
            console.log(total_amount, total_percentage);

            var new_total_amount = parseFloat(total_amount) + finalAmount;
            var new_total_percentage = parseFloat(total_percentage) + percentageValue;
            console.log(new_total_amount,new_total_percentage);
            $('#total_amount').text(new_total_amount.toFixed(2));
            $('#total_percentage').text(new_total_percentage.toFixed(2));

            // ASIGN THE AMOUNT TO 02 DECIMALS
            $(amount).val(finalAmount.toFixed(2));

            // Update the hidden outstanding balance field
            $(nextOutstandingBalance).val(newOutstandingBalance.toFixed(2)); // Fixed to 2 decimal places
        });
    }

</script>