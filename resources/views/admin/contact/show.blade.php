@extends('layouts.app')

@section('title','Contact')

@push('css')

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
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Name: {{ $contact->name }}</strong>
                                    <br>
                                    <b>Email: {{ $contact->email }}</b> <br>
                                    <b>Subject: {{ $contact->subject }}</b>
                                    <hr>
                                    <p>
                                        <strong>Message: </strong> <br>
                                        {{ $contact->message }}
                                    </p>
                                    <hr>

                                </div>
                            </div>
                            <a href="{{ route('contact.index') }}" class="btn btn-success">Back</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
