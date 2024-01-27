<style>
    td, th {
        text-align: center !important;
    }
    .tableFixHead { overflow: auto; height: 450px; }
    .tableFixHead thead { position: sticky; top: 0; z-index: 1; }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

</style>

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
    </div>
@endif


@if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
@endif



<div class="card w-100" style="min-height: 100vh">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if(!isset($count_status))
                        @foreach($resources as $key => $value)

                            <?php $status = $value->status; ?>
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->title }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-light rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('website-constructions.edit', ['website_construction' => $value->id]) }}"><i class="bx bx-edit text-dark"></i> &nbsp;Update</a>
                                            <form action="{{ route('website-constructions.destroy', ['website_construction' => $value->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger rounded-0 btn-block">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan='11' class="text-muted">*** End of the Line ***</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan='11' class="text-muted">{{$count_status}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
