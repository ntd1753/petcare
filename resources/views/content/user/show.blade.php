<!-- resources/views/users/index.blade.php -->
@extends('layouts.ManagerLayout')

@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Danh sách người dùng</h4>
            </div>
        </div>
        <div class="iq-card-body">
           
                <table class="table">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <td>
                                  {{ $user->avatar }}
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phoneNumber }}</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                       
                    </tbody>
                </table>
           
        </div>
    </div>
@endsection