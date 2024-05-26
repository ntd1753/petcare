@extends("layouts.adminLayout")
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Thêm dịch vụ mới</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{route("admin.appointment.store")}}" method="POST">
                <div class="form">
                    @csrf
                    <div class="">
                        <label for="pet_id">Pet ID</label>
                        <input type="text" class="form-control" id="pet_id" name="pet_id" value="{{ old('pet_id') }}">
                    </div>
                    <div class="mt-3">
                        <label for="doctor_id">Doctor</label>
                        <select class="form-control" id="doctor_id" name="doctor_id">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                    </div>
                    <div class="mt-3">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}">
                    </div>
                    <div class="mt-3 hidden">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ old('status') }}">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
