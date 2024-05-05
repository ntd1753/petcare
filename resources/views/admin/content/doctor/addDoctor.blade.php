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
                    <form>
                        <div class="form-group">
                            <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" src="images/user/11.png" alt="profile-pic">
                                <div class="p-image">
                                    <a href="#" id="upload-avatar" class="upload-button btn iq-bg-primary">File Upload</a>
                                    <input class="file-upload" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="img-extension mt-3">
                                <div class="d-inline-block align-items-center">
                                    <span>Only</span>
                                    <a href="#">.jpg</a>
                                    <a href="#">.png</a>
                                    <a href="#">.jpeg</a>
                                    <span>allowed</span>
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
                        <h4 class="card-title">Thông tin người dùng mới</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="fname">Họ và tên</label>
                                    <input type="text" class="form-control" id="fname" placeholder="First Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobno">Số điện thoại:</label>
                                    <input type="text" class="form-control" id="mobno" placeholder="Mobile Number">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="city">Địa chỉ:</label>
                                    <input type="text" class="form-control" id="city" placeholder="Town/City">
                                </div>
                            </div>
                            <hr>
                            <h5 class="mb-3">Security</h5>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="uname">Tài khoản:</label>
                                    <input type="text" class="form-control" id="uname" placeholder="User Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pass">Mật khẩu:</label>
                                    <input type="password" class="form-control" id="pass" placeholder="Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rpass">Nhập lại mật khẩu:</label>
                                    <input type="password" class="form-control" id="rpass" placeholder="Repeat Password ">
                                </div>
                            </div>
                            <div class="checkbox">
                                <label><input class="mr-2" type="checkbox">Enable Two-Factor-Authentication</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Add New User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
