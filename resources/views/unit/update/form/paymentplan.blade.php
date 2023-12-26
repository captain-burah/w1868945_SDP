

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
        @if(isset($unit->unit_paymentplan))
            <form class="repeater" enctype="multipart/form-data">
                <div data-repeater-list="group-a">
                    @foreach($unit->unit_paymentplan->unit_paymentplan_files as $milestones)
                        <div data-repeater-item="" class="row my-2">
                                <div class="mb-3 col-lg-2">
                                    <label for="milestone">Description</label>
                                    <input type="text" id="milestone" name="group-a[0][milestone]" class="form-control form-control-sm" value="{{$milestones->name}}">
                                </div>

                                <div class="mb-3 col-lg-2">
                                    <label for="percentage">Percentage (%)</label>
                                    <input
                                        type="number"
                                        id="percentage"
                                        name="group-a[0][percentage]"
                                        class="form-control form-control-sm"
                                        value="{{$milestones->percentage}}"
                                        placeholder="100"
                                        min=0
                                        max=100
                                        size="4"
                                        maxlength="3"
                                        onchange="changeHandler(this)"
                                    >
                                </div>

                                <div class="mb-3 col-lg-2">
                                    <label for="amount" id="amnt">Amount</label>
                                    <input type="number" id="amount" name="group-a[0][amount]" class="form-control form-control-sm" value="{{$milestones->amount}}" placeholder="ex: 148500" min=0>
                                </div>

                                <div class="mb-3 col-lg-2">
                                    <label for="date" id="date-label">Date</label>
                                    <input type="date" id="date" name="group-a[0][date]" class="form-control form-control-sm" value="{{$milestones->date}}">
                                </div>
                                
                                <input type="hidden" id="amount" name="group-a[0][id]" class="form-control form-control-sm" value="{{$milestones->id}}" placeholder="ex: 148500" min=0>
                                <div class="mb-3 col-lg-2 my-auto">
                                    <input data-repeater-delete type="button" class="btn btn-outline-danger btn-sm" value="Delete"/>
                                </div>
                        </div>
                    @endforeach
                </div>
                <input data-repeater-create="" type="button" class="btn btn-success btn-sm mt-3 mt-lg-0" value="Add More" id="repeater-create">
            </form>
        @else
            <form class="repeater" enctype="multipart/form-data">
                <div data-repeater-list="group-a">
                    <div data-repeater-item="" class="row">
                        <div class="mb-3 col-lg-2">
                            <label for="milestone">Description</label>
                            <input type="text" id="milestone" name="group-a[0][milestone]" class="form-control form-control-sm" >
                        </div>

                        <div class="mb-3 col-lg-2">
                            <label for="percentage">Percentage (%)</label>
                            <input
                                type="number"
                                id="percentage"
                                name="group-a[0][percentage]"
                                class="form-control form-control-sm"

                                placeholder="100"
                                min=0
                                max=100
                                size="4"
                                maxlength="3"
                                onchange="changeHandler(this)"
                            >
                        </div>

                        <div class="mb-3 col-lg-2">
                            <label for="amount" id="amnt">Amount</label>
                            <input type="number" id="amount" name="group-a[0][amount]" class="form-control form-control-sm"  placeholder="ex: 148500" min=0>
                        </div>

                        <div class="mb-3 col-lg-2">
                            <label for="date" id="date-label">Date</label>
                            <input type="date" id="date" name="group-a[0][date]" class="form-control form-control-sm" >
                        </div>
                        
                        <input type="hidden" id="amount" name="group-a[0][id]" class="form-control form-control-sm"  placeholder="ex: 148500" min=0>
                        <div class="mb-3 col-lg-2 my-auto">
                            <input data-repeater-delete type="button" class="btn btn-outline-danger btn-sm" value="Delete"/>
                        </div>
                    </div>
                </div>
                <input data-repeater-create="" type="button" class="btn btn-success btn-sm mt-3 mt-lg-0" value="Add More" id="repeater-create">
            </form>
        @endif
    </div>
</div>

@if(isset($unit->unit_paymentplan))
    {{-- {{$unit->unit_paymentplan->unit_paymentplan_files}} --}}
    <input type="hidden" name="paymentplan_id" value="{{$unit->unit_paymentplan->id}}">
@endif
<script>
  function changeHandler(val)
  {
    if (Number(val.value) > 100)
    {
      val.value = 100
    }
  }
</script>
