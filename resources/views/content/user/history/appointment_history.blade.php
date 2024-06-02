<!-- resources/views/service_history/index.blade.php -->
@extends('layouts.ManagerLayout')

@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Lịch sử đăng ký lịch khám</h4>
            </div>
        </div>
        <div class="iq-card-body">
            @if ($petAppointment->isEmpty())
                <p>Không có lịch sử đăng ký khám.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>Thú Cưng</th>
                        <th>Giờ Khám</th>
                        <th>Ngày Khám</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($petAppointment as $appointment)
                        <tr>
                            <td>{{ $appointment->pet->name }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>{{ $appointment->date }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
