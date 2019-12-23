@extends('layouts.app')

@section('title','Contact')

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
                            <h4 class="card-title ">ALL CONTACT MESSAGE</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="table">
                                    <thead class=" text-primary">
                                    <th>Id</th>
                                    <th>Subject</th>
                                    <th>Email</th>
                                    <th>Sent At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $key=>$contact)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('contact.show',$contact->id) }}" class="btn btn-sm btn-info">
                                                <i class="material-icons">details</i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" onclick="
    if(confirm('Are You Sure To Delete?')){
        event.preventDefault();
        document.getElementById('delete-form-{{ $contact->id }}').submit()
    } else{
        event.preventDefault();
                                                }
"><i class="material-icons">delete</i></button>
                                            <form action="{{ route('contact.destroy',$contact->id) }}" method="POST" id="delete-form-{{ $contact->id }}">@csrf</form>
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
