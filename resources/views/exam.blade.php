@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">information</div>
                <div class="card-body">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ url('home') }}"> Back</a>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>name:</strong>
                                <input type="text" name="name" value="{{$filter->name}}" class="form-control" placeholder="your name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>email:</strong>
                                <input type="email" name="email" value="{{$filter->email}}" class="form-control" placeholder="your email">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>position:</strong>
                                <input type="text" name="position" value="{{$filter->position_name}}" class="form-control" placeholder="your position">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection