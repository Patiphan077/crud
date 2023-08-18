@extends('layouts.app')

@section('content')
    <div class="container"> <a class="btn btn-primary" href="{{ url('home/create') }}">เพิ่ม</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Position</th>


                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($results as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->position_name }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ url('home/show/' . $item->id) }}">ดูรายละเอียด</a>
                                            <a class="btn btn-primary" href="{{ url('home/show2/' . $item->id) }}">แก้ไข</a>
                                            <a class="btn btn-primary" href=>ลบ</a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection