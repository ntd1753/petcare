@extends("layouts.adminLayout")
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Add New User</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <form >
                        @csrf
                        <div class="form-group">
                            <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" src="{{asset('images/user/11.png')}}" alt="profile-pic">
                                <div class="p-image">
                                    <a href="#" id="upload-avatar" class="upload-button btn iq-bg-primary">File Upload</a>
                                    <input class="file-upload" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="img-extension mt-3">
                                <div class="d-inline-block align-items-center">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Thông tin người dùng</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <form method="POST" action="{{route('admin.doctor.update',$doctor->id)}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Họ và tên</label>
                                    <input type="text" class="form-control" value="{{$doctor->name}}" id="name" name="name" placeholder="First Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobno">Số điện thoại:</label>
                                    <input type="text" class="form-control" id="mobno" value="{{$doctor->phoneNumber}}" name="phoneNum" placeholder="Mobile Number">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$doctor->email}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="city">Địa chỉ:</label>
                                    <input type="text" class="form-control" id="city"  name="address" placeholder="Town/City" value="{{$doctor->adress}}">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
