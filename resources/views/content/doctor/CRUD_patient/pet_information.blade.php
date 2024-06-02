@extends("layouts.ManagerLayout")
@section("content")
    <div class="row">
        @include("content.doctor.CRUD_patient.card_information")

        @include("content.doctor.CRUD_patient.table_patient")
    </div>

@endsection
