<style>
    td{
        padding: 0 !important;
    }
    tr{
        width: 100%;
    }
</style>
<div class="table-responsive">
    <table class="table table-borderless mb-0">
        <tbody>
            <tr>
                <td>Date: </td>
                <td>{{ date('Y-m-d') }}</td>
                <td class="text-right" dir="rtl">{{ date('Y-m-d') }}</td>
                <td class="text-right" dir="rtl"></td>
            </tr>
            <tr>
                <td>Vendor </td>
                <td>ESNAAD Real Estate Development</td>
                <td class="text-right" dir="rtl">ESNAAD Real Estate Development</td>
                <td class="text-right" dir="rtl">Vendor</td>
            </tr>
            <tr>
                <td>Project </td>
                <td>{{ $project->name }}</td>
                <td class="text-right" dir="rtl">{{ $project->name }}</td>
                <td class="text-right" dir="rtl">Project</td>
            </tr>
            <tr>
                <td>Unit </td>
                <td>{{ $unit->name }}</td>
                <td class="text-right" dir="rtl">{{ $unit->name }}</td>
                <td class="text-right" dir="rtl">Unit</td>
            </tr>
            <tr>
                <td>Purchase Price </td>
                <td>{{ $unit->unit_price }}</td>
                <td class="text-right" dir="rtl">{{ $unit->unit_price }}</td>
                <td class="text-right" dir="rtl">Purchase Price</td>
            </tr>
            <tr>
                <td>Deposit </td>
                <td>{{ $unit->unit_payment_plan }}</td>
                <td class="text-right" dir="rtl">{{ $unit->unit_payment_plan }}</td>
                <td class="text-right" dir="rtl">Deposit</td>
            </tr>
        </tbody>
    </table>
</div>
