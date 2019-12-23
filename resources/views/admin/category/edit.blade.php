@extends('layouts.app')

@section('title','Slider')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="close"><i class="material-icons">close</i></button>
                                <span>{{ $error }}</span>
                            </div>
                        @endforeach
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">ADD NEW SLIDER</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.update',$category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                            <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group bmd-form-group">
                                                <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{ $category->name }}">
                                            </div>
                                        </div>
                                    </div>
                            <br>
                                    <a href="{{ route('category.index') }}" class="btn btn-danger pull-left">Back</a>
                                    <button type="submit" class="btn btn-primary pull-right">Update Category</button>
                                    <div class="clearfix"></div>
                            </form>
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

