@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">information</div>
                <div class="card-body">
                    <div class="pull-right">
                    <form action="{{ url('update')}}" method="POST">
                        @csrf
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" value="{{$filter->name}}" class="form-control" placeholder="your name">
                            </div>
                            <input type="hidden" name="id" value="{{$filter->id}}"  >    
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>email:</strong>
                                <input type="email" name="email" value="{{$filter->email}}" class="form-control" placeholder="your email">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="from-group">
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Position</label>
                                        <select  name="position" class="form-control" placeholder="your position"aria-describedby="inputGroupPrepend3" >
                                            <option selected>Choose...</option>
                                            @foreach($position as $item)
                                            <option value="{{$item->position_id}}">{{$item->position_name}}</option>
                                            @endforeach
                                            
                                        </div>
                                        <div class="col-auto my-1">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                <label class="custom-control-label" for="customControlAutosizing">Remember my
                                                    position</label>
                                            </div>
                                        </div>
                                        <button type="submit"  class="btn btn-success" >Submit</button>
                                        <a class="btn btn-primary" href="{{ url('home') }}"> back </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection