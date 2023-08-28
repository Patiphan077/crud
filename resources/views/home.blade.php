
@extends('layouts.app')

@section('content')
    <div class="container"> <a class="btn btn-info" href="{{ url('create') }}">เพิ่ม</a>
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
                                            <a class="btn btn-primary"href="{{ url('home/show/' . $item->id) }}">ดูรายละเอียด</a>
                                            <a class="btn btn-warning" href="{{ url('home/show2/' . $item->id) }}">แก้ไข</a>
                                            
                                            <form accept-charset="UTF-8" style="display:inline">
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">ลบ</button>               
                                            </form>
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                console.log("id");
                e.preventDefault();
                
                var formData = new FormData(this);
                $.ajax({
                    method: 'POST',
                    url: "{{ url('delete') }}",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                           swal.fire({
                            icon: 'success',
                            title: `ลบข้อมูล ${response.data.name}`,
                            text: 'You clicked the button!'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(response) {
                        // console.log(response.responseJSON.data.name);
                        swal.fire({
                            icon: 'error',
                            title:  `ลบไม่สำเร็จ ${response.responseJSON.data.name}`,
                            text: 'You clicked the button!'
                        });
                    }
                });
            });
        });
    </script>
    @endsection

