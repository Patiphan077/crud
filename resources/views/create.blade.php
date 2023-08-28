@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">information</div>
                    <div class="card-body">
                        <form action="{{ url('store')}}" method="POST">
                            @csrf
                                <div class="form-row">
                                  <div class="col-md-4 mb-3">
                                    <label for="validationServer01">First name</label>
                                    <input type="text" name="First name" class="form-control"  required>
                                    <div class="valid-feedback">
                                </div>        
                                <div class="form-group">
                                    <label for="exampleInputName1">Email address</label>
                                    <div class="form-control">
                                      <div class="exampleInputName1">
                                      <input type="text" name="Email address"  class="form-control" i required>
                                      <div class="invalid-feedback">                                       
                                      </div>
                                  </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" >

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
                                            <button type="submit" a class="btn btn-primary" href="{{ url('home') }}">Submit</button>
                                            <a class="btn btn-primary" href="{{ url('home') }}"> back </a>
                                    </form>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection