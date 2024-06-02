@extends("layouts.adminLayout")
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Thêm dịch vụ mới</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{route("admin.room.store")}}" method="POST">
                <div class="form">
                    @csrf
                    <div class="">
                        <label for="categoryName">Thêm số phòng</label>
                        <input type="number" class="form-control" id="categoryName" name="roomNumber" placeholder="Nhập số phòng...">
                    </div>

                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
