<!-- resources/views/patients/delete.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Delete Patient</h2>
        <p>Are you sure you want to delete this patient?</p>
        <form method="POST" action="{{ route('patients.destroy', $patient->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
