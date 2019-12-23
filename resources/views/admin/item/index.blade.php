@extends('layouts.app')

@section('title','Item')

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
                    <a href="{{ route('item.create') }}" class="btn btn-info">Add New</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">ALL ITEMS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="table">
                                    <thead class=" text-primary">
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $key=>$item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td><img src="{{ asset('uploads/item/'.$item->image) }}" width="50" alt=""></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('item.edit',$item->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>
                                            <button class="btn btn-danger btn-sm" onclick="
    if(confirm('Are You Sure To Delete?')){
        event.preventDefault();
        document.getElementById('delete-form-{{ $item->id }}').submit()
    } else{
        event.preventDefault();
                                                }
"><i class="material-icons">delete</i></button>
                                            <form action="{{ route('item.destroy',$item->id) }}" method="POST" id="delete-form-{{ $item->id }}">@csrf @method('DELETE')</form>
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
