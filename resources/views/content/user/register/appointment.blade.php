@extends("layouts.ManagerLayout")
@section("content")
    @section('content')
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Đặt lịch khám thú cưng</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <form action="#" method="POST" action="{{ route('user.register.appoint.add') }}">
                    <div class="form">
                        @csrf
                        <div class="">
                            <label for="categoryName">Thú Cưng:</label>
                            <select name="pet_id" class="form-control">
                                <option selected>Chọn thú cưng của bạn</option>
                                @foreach($pet as $pet)
                                    <option value="{{ $pet->id }}">{!! $pet->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mt-3">
                             <label for="time">Nhập giờ:</label>
                             <input type="time" name="time" id="time">
                        </div>
                        <div class="mt-3">
                            <label for="capacity">nhập ngày:</label>
                            <input type="date" class="form-control" id="ngaykham" name="date">
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
