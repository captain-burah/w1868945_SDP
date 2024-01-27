

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
        <h4 class="card-title mb-4">Milestones</h4>
        <form class="repeater" enctype="multipart/form-data">
            <div data-repeater-list="group-a">
                <div data-repeater-item="" class="row">
                    <div class="mb-3 col-lg-4">
                        <label for="milestone">Description</label>
                        <input type="text" id="milestone" name="group_a[0][milestone]" class="form-control form-control-sm" value="1st Installment">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="percentage">Percentage (%)</label>
                        <input type="number" id="percentage" name="group_a[0][percentage]" class="form-control form-control-sm" placeholder="100" min=0>
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="amount" id="amnt">Amount</label>
                        <input type="number" id="amount1" name="group_a[0][amount]" class="form-control form-control-sm" placeholder="ex: 148500" min=0>
                    </div>
                </div>
            </div>
            <input data-repeater-create="" type="button" class="btn btn-success btn-sm mt-3 mt-lg-0" value="Add More" id="repeater-create">
        </form>
    </div>
</div>

