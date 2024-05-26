@extends("layouts.adminLayout")
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Sửa thông tin phòng</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{route("admin.room.update",$item->id)}}" method="POST">
                <div class="form">
                    @csrf
                    <div class="">
                        <label for="categoryName"> số phòng</label>
                        <input type="number" class="form-control" id="categoryName" name="roomNumber" value="{{$item->RoomNumber}}" placeholder="Nhập số phòng...">
                    </div>

                    <div class="mt-3">
                        <label for="capacity">Sức chứa</label>
                        <input type="number" class="form-control" id="categoryName" name="capacity" value="{{$item->Capacity}}" placeholder="Nhập sức chứa...">
                    </div>
                    <div class="my-3">
                        <label for="capacity">Trạng thái</label>
                        <select id="status" name="status" class="form-control">
                            <option value="available" id="available">Còn trống</option>
                            <option value="unavailable" id="unavailable">đầy</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded',function (){
            const status = "{{$item->status}}";
            document.getElementById(status).selected = true;
        })
    </script>
@endsection
