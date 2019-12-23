@extends('layouts.app')

@section('title','Category')

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
                    <a href="{{ route('category.create') }}" class="btn btn-info">Add New</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">ALL CATEGORIES</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table" class="table">
                                    <thead class=" text-primary">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>
                                            <button class="btn btn-danger btn-sm" onclick="
    if(confirm('Are You Sure To Delete?')){
        event.preventDefault();
        document.getElementById('delete-form-{{ $category->id }}').submit()
    } else{
        event.preventDefault();
                                                }
"><i class="material-icons">delete</i></button>
                                            <form action="{{ route('category.destroy',$category->id) }}" method="POST" id="delete-form-{{ $category->id }}">@csrf @method('DELETE')</form>
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
