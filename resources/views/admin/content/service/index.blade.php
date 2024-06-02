@extends("layouts.adminLayout")
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Danh sách dịch vụ:</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">
                            <a href="{{route('admin.typeOfService.add')}}"><button type="button" class="btn btn-outline-success mb-3"><i class="ri-add-fill"></i>Thêm dịch vụ</button></a>
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Dịch Vụ</th>
                                    <th>Mô Tả</th>
                                    <th>Đơn giá</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody class="text-left">
                                @include("admin.content.service.row_table",["service_type"=>$service_type])
                                </tbody>
                            </table>
                        </div>
                        {{ $service_type->onEachSide(10)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
