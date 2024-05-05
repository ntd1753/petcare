<!-- resources/views/patients/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Patient Details</h2>
        <ul>
            <li>Pet ID: {{ $patient->pet_id }}</li>
            <li>Ngày khám: {{ $patient->ngaykham }}</li>
            <li>Symptoms: {{ $patient->symptoms }}</li>
            <!-- Add other fields as needed -->
        </ul>
    </div>
@endsection
