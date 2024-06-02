@extends("layouts.adminLayout")
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Danh sách bác sĩ</h4>
                    </div>

                </div>
            </div>
            <div class="iq-header-title">
                <a href="{{route('admin.doctor.add')}}"><button type="button" class="btn btn-outline-success mb-3"><i class="ri-add-fill"></i>Thêm bác sĩ</button></a>
            </div>
        </div>

       @foreach($doctor as $doctor)
            <div class="col-sm-6 col-md-3">
                <div class="iq-card">
                    <div class="iq-card-body text-center">
                        <div class="doc-profile">
                            <img class="rounded-circle img-fluid avatar-80" src="@if(is_null($doctor->avatar)) https://cdn.sforum.vn/sforum/wp-content/uploads/2023/10/avatar-trang-4.jpg @else {!! $item->avatar !!} @endif" alt="profile">
                        </div>
                        <div class="iq-doc-info mt-3">
                            <h4> Dr.{{$doctor->name}}</h4>
                            <p class="mb-0" >Cardiologists</p>
                            <a href="#">{{$doctor->email}}</a>
                        </div>
{{--                        <a href="profile.html" class="btn btn-primary">View Profile</a>--}}
                        <a href="{{route("admin.doctor.edit",$doctor->id)}}" class="btn btn-warning">Edit Profile</a>
                        <a href="{{route("admin.doctor.destroy",$doctor->id)}}" class="btn btn-danger">Delete</a>

                    </div>
                </div>
            </div>

       @endforeach


    </div>
@endsection
