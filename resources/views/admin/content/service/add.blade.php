@extends("layouts.adminLayout")
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Thêm dịch vụ mới</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{route("admin.typeOfService.store")}}" method="POST">
                <div class="form">
                    @csrf
                    <div class="">
                        <label for="categoryName">Tên dịch vụ</label>
                        <input type="text" class="form-control" id="categoryName" name="name" placeholder="Nhập tên dịch vụ...">
                    </div>

                    <div class="mt-3">
                        <label for="description">mô tả</label>
                        <textarea id="Seo" class="form-control" name="description"></textarea>
                    </div>
                    <div class="my-3">
                        <label for="price">Đơn giá</label>
                        <input type="number" required class="form-control" id="price" name="price" placeholder="Nhập đơn giá...">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
