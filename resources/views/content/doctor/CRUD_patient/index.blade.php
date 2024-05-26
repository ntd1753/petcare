@extends("layouts.ManagerLayout")
@section("header")
  @include("content.doctor.CRUD_patient.form_search")
@endsection
@section("content")
    @include("content.doctor.CRUD_patient.pestlist")

@endsection
