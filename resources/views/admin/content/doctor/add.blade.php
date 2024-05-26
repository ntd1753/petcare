@extends("layouts.adminLayout")
@section('content')
    <form method="POST" action="{{route('admin.doctor.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="row">

        <div class="col-lg-3">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Ảnh đại diện</h4>
                    </div>
                </div>

                <div class="iq-card-body">
                        <div class="form-group">
                            <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" src="{{asset('images/user/11.png')}}" alt="profile-pic">
                                <div class="p-image">
                                    <a href="#" id="button-up-image" class="upload-button btn iq-bg-primary">File Upload</a>
                                    <input class="file-upload"  id="upload-image" type="file" accept="image/*" name="image">
                                </div>
                            </div>
                            <div class="img-extension mt-3">
                                <div class="d-inline-block align-items-center">
                                </div>
                            </div>
                        </div>
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


                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Họ và tên</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="First Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobno">Số điện thoại:</label>
                                    <input type="text" class="form-control" id="mobno" name="phoneNum" placeholder="Mobile Number">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="city">Địa chỉ:</label>
                                    <input type="text" class="form-control" id="city" name="address" placeholder="Town/City">
                                </div>
                            </div>
                            <hr>
                            <h5 class="mb-3">Security</h5>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="uname">Tài khoản:</label>
                                    <input type="text" class="form-control" id="uname" name="email" placeholder="User Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pass">Mật khẩu:</label>
                                    <input type="password" class="form-control" name="password" id="pass" placeholder="Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rpass">Nhập lại mật khẩu:</label>
                                    <input type="password" class="form-control" id="rpass" name="rpass" placeholder="Repeat Password">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Add New User</button>

                    </div>
                </div>

            </div>
        </div>

    </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script >
        $(document).ready(function(){
            $('#button-up-image').click(function(){
                $('#upload-image').click();
            });
        });
        $(document).ready(function() {
            // Khi file trong input 'upload-image' thay đổi
            $('#upload-image').change(function(event) {
                // Lấy file được chọn đầu tiên
                var file = event.target.files[0];
                // Tạo đối tượng FileReader
                var reader = new FileReader();
                // Định nghĩa hàm onload để xử lý sau khi file được đọc
                reader.onload = function(e) {
                    // Cập nhật thuộc tính 'src' của thẻ img với dữ liệu ảnh
                    $('.profile-pic').attr('src', e.target.result);

                };
                $('.profile-pic').css({
                    'width': '150px',
                    'height': '150px'
                });
                // Đọc dữ liệu của file đã chọn
                reader.readAsDataURL(file);
            });
        });

    </script>
@endsection
