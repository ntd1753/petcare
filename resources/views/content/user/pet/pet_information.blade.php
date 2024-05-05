@extends("layouts.ManagerLayout")
@section("content")
    <div class="row">
        @include("content.user.pet.card_information")

        @include("content.user.pet.table_patient")
    </div>

@endsection
