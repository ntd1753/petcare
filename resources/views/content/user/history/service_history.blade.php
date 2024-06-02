<!-- resources/views/service_history/index.blade.php -->
@extends('layouts.ManagerLayout')

@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Lịch sử đăng ký dịch vụ</h4>
            </div>
        </div>
        <div class="iq-card-body">
            @if ($petServices->isEmpty())
                <p>Không có lịch sử đăng ký dịch vụ.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Thú Cưng</th>
                            <th>Loại Dịch Vụ</th>
                            <th>Ngày</th>
                            <th>Giá Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petServices as $service)
                            <tr>
                                <td>{{ $service->pet->name }}</td>
                                <td>{{ $service->serviceType->name }}</td>
                                <td>{{ $service->date }}</td>
                                <td>{{ $service->serviceType->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
