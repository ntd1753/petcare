<!-- resources/views/patients/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Patient</h2>
        <form method="POST" action="{{ route('patients.update', $patient->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="pet_id">Pet ID:</label>
                <input type="text" class="form-control" id="pet_id" name="pet_id" value="{{ $patient->pet_id }}">
            </div>
            <div class="form-group">
                <label for="ngaykham">Ngày khám:</label>
                <input type="date" class="form-control" id="ngaykham" name="ngaykham" value="{{ $patient->ngaykham }}">
            </div>
            <div class="form-group">
                <label for="symptoms">Symptoms:</label>
                <textarea class="form-control" id="symptoms" name="symptoms">{{ $patient->symptoms }}</textarea>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
