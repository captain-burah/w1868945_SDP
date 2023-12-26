

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
                value="{{ old('price') }}"
                style="font-size: 24px;"
                min="0"
            >
            @error('price')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>


<div class="row mt-4">
    <div class="card-body">
        <h4 class="card-title mb-4">Payment Milestones</h4>
        <div>
            <div class="row">
                <div class="mb-3 col-lg-4">
                    <label for="milestone">Description</label>
                    <input type="text" id="milestone" name="milestone1" class="form-control form-control-sm" value="Downpayment">
                </div>

                <div class="mb-3 col-lg-4">
                    <label for="percentage">Percentage (%)</label>
                    <input type="number" id="percentage" name="percentage1" class="form-control form-control-sm" min=0>
                </div>

                <div class="mb-3 col-lg-4">
                    <label for="amount" id="amnt">Amount</label>
                    <input type="number" id="amount1" name="amount1" class="form-control form-control-sm" min=0>
                </div>
            </div>
        </div>

        <div>
            <div class="row">
                <div class="mb-3 col-lg-4">
                    <label for="milestone">Description</label>
                    <input type="text" id="milestone" name="milestone2" class="form-control form-control-sm" value="After 01 month">
                </div>

                <div class="mb-3 col-lg-4">
                    <label for="percentage">Percentage (%)</label>
                    <input type="number" id="percentage" name="percentage2" on class="form-control form-control-sm" min=0>
                </div>

                <div class="mb-3 col-lg-4">
                    <label for="amount" id="amnt">Amount</label>
                    <input type="number" id="amount1" name="amount2" class="form-control form-control-sm" min=0>
                </div>
            </div>
        </div>
        
    </div>
</div>



<script>
    const numberInput = document.getElementById('percentage1');
    const unitPrice = document.getElementById('price');

    // Add a 'keydown' event listener to the input field
    numberInput.addEventListener('keydown', function() {
        // Delay the calculation to capture the newly entered value
        setTimeout(calculateSum, 0);
    });

    // Function to calculate the sum and display it
    function calculateSum() {
        // Get the current value from the input field
        const inputValue = numberInput.value;

        // Convert the input string into an array of numbers (split by spaces)
        const numbersArray = inputValue.split(' ').map(Number);

        // Calculate the sum of the numbers in the array
        const sum = numbersArray.reduce((total, num) => total + (num || 0), 0); // Using reduce to sum the numbers

        // Display the sum in the output div
        const outputDiv = document.getElementById('output');
        outputDiv.textContent = `Sum: ${sum}`;
    }
</script>