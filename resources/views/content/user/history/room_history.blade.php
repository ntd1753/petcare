<!-- resources/views/service_history/index.blade.php -->
@extends('layouts.ManagerLayout')

@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Lịch sử đăng ký lưu trữ</h4>
            </div>
        </div>
        <div class="iq-card-body">
            @if ($petRoom->isEmpty())
                <p>Không có lịch sử đăng ký lưu trữ.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>Thú Cưng</th>
                        <th>Số Phòng</th>
                        <th>Ngày Bắt Đầu</th>
                        <th>Ngày Kết Thúc</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($petRoom as $room)
                        <tr>
                            <td>{{ $room->pet->name }}</td>
                            <td>{{ $room->room->RoomNumber }}</td>
                            <td>{{ $room->startTime }}</td>
                            <td>{{ $room->endTime }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
