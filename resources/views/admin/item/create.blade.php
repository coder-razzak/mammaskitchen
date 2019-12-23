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
                            <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                        <div class="col-md-12">
                                        <select name="category" class="form-control">
                                            <option>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group bmd-form-group">
                                                <input type="text" class="form-control" placeholder="Item Name" name="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group bmd-form-group">
                                                <textarea name="description" cols="30" rows="5" class="form-control" placeholder="Write Item Description..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group bmd-form-group">
                                                <input type="text" name="price" class="form-control" placeholder="Enter Price">
                                            </div>
                                        </div>
                                    </div>
                                <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <label class="">Item Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                <br><br>
                                    <a href="{{ route('item.index') }}" class="btn btn-danger pull-left">Back</a>
                                    <button type="submit" class="btn btn-primary pull-right">Save Slide</button>
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

