@extends("layouts.ManagerLayout")
@section("content")
    @section('content')
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Đăng kí lưu giữ thú cưng</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <form action="#" method="POST">
                    <div class="form">
                        @csrf
                        <div class="">
                            <label for="categoryName">Thú Cưng:</label>
                            <select name="petId" class="form-control">
                                <option selected>Chọn thú cưng của bạn</option>
                                @foreach($pet as $pet)
                                    <option value="{{$pet->id}}">{!! $pet->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="categoryName">Phòng:</label>
                            <select name="roomId" class="form-control">
                                <option selected>Chọn phòng cho thú cưng</option>
                                @foreach($room as $item)
                                    <option value="{{$item->id}}">phòng số {!! $item->RoomNumber !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="capacity">nhập thời gian nhận phòng:</label>
                            <input type="date" class="form-control" id="ngaykham" name="startTime">
                        </div>
                        <div class="mt-3">
                            <label for="capacity">nhập thời gian trả phòng:</label>
                            <input type="date" class="form-control" id="ngaykham" name="endTime">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection

@endsection
