@extends('layouts.app')

@section('title','Reservation')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session('successMsg'))
                        <div class="alert alert-info">
                            <button class="close" data-dismiss="alert" aria-label="close"><i class="material-icons">close</i></button>
                            <span>{{ session('successMsg') }}</span>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">ALL SLIDERS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="table">
                                    <thead class=" text-primary">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Time & Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $key=>$reservation)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->phone }}</td>
                                        <td>{{ $reservation->email }}</td>
                                        <td>{{ $reservation->data_and_time }}</td>
                                        <td>{{ $reservation->message }}</td>
                                        <td>
                                            @if( $reservation->status == true )
                                                <span class="badge badge-success">Confirmed</span>
                                            @else
                                                <span class="badge-danger badge">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $reservation->created_at->diffForHumans() }}</td>
                                        <td class="text-center">
                                            @if($reservation->status == false)
                                                <button class="btn btn-info btn-sm" onclick="
                                                    if(confirm('Are You Verify this request by phone?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $reservation->id }}').submit()
                                                    } else{
                                                    event.preventDefault();
                                                    }
                                                    "><i class="material-icons">done</i></button>
                                                <form action="{{ route('reservation.status',$reservation->id) }}" method="POST" id="delete-form-{{ $reservation->id }}">@csrf</form>

                                            @endif
                                            <button class="btn btn-danger btn-sm" onclick="
    if(confirm('Are You Sure To Delete?')){
        event.preventDefault();
        document.getElementById('delete-form-{{ $reservation->id }}').submit()
    } else{
        event.preventDefault();
                                                }
"><i class="material-icons">delete</i></button>
                                            <form action="{{ route('reservation.destroy',$reservation->id) }}" method="POST" id="delete-form-{{ $reservation->id }}">@csrf</form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
        <script>
            $(document).ready( function () {
                $('#data_table').DataTable();
            } );
        </script>
@endpush
