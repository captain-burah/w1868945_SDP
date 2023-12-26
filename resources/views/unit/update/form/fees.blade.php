<div class="row mt-5">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price">Dubai Land Department &#40;DLD&#41; Fees <span class="text-muted font-weight-light">&#40;do not use any number format&#41;</span></label>
            <input
                type="number"
                name="dld_fees"
                class="form-control
                @error('dld_fees') border border-solid border-danger  @enderror"
                id="dld_fees"
                placeholder="ex: 2700000"
                value="{{ $unit->dld_fees }}"
            >
            @error('dld_fees')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>



<div class="row mt-5">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price">OQOOD Amount <span class="text-muted font-weight-light">&#40;do not use any number format&#41;</span></label>
            <input
                type="number"
                name="oqood"
                class="form-control
                @error('oqood') border border-solid border-danger  @enderror"
                id="oqood"
                placeholder="ex: 2700000"
                value="{{ $unit->oqood_amount }}"
            >
            @error('oqood')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>



