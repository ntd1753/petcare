@extends("layouts.adminLayout")
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Danh sách phòng lưu trữ:</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">
                            <a href="{{route('admin.room.add')}}"><button type="button" class="btn btn-outline-success mb-3"><i class="ri-add-fill"></i>Thêm phòng</button></a>
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Số phòng</th>
{{--                                    <th>Sức chứa</th>--}}
                                    <th>Trạng thái</th>
{{--                                    <th>Đơn giá</th>--}}
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                @include("admin.content.room.row_table",["room"=>$room])
                                </tbody>
                            </table>
                        </div>
                        {{ $room->onEachSide(10)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
