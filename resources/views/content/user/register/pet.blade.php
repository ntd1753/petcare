@extends("layouts.adminLayout")
@section('content')
    <form method="POST" action="{{route('user.register.pet.store')}}" enctype="multipart/form-data">
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
                                <img class="profile-pic img-fluid" src="https://png.pngtree.com/png-clipart/20200701/original/pngtree-cat-default-avatar-png-image_5416936.jpg" alt="profile-pic">
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
                            <h4 class="card-title">Thông tin thú cưng mới</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class=" row align-items-center">
                                <div class="form-group col-sm-6">
                                    <label for="name">Tên:</label>
                                    <input type="text" class="form-control" id="name" name="name" >
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="age">Tuổi:</label>
                                    <input type="text" class="form-control" id="age" name="age" >
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="gname">Loài:</label>
                                    <select  class="form-control" value="" name="speciesId">
                                        @foreach($species as $species)
                                            <option value="{{$species->id}}">{{$species->speciesName}}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="cname">Màu lông:</label>
                                    <input type="text" class="form-control" id="cname" name="color" >
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="d-block">Giống:</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="Cái" id="customRadio6" name="gender" class="custom-control-input" >
                                        <label class="custom-control-label" for="customRadio6"> Cái </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadio7" value="Đực" name="gender" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio7"> Đực </label>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Lưu</button>
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
