@extends("layouts.ManagerLayout")
@section("header")
    @include("content.search.searchPet.form_search")
@endsection
@section("content")
    @include("content.search.searchPet.search_edit")

@endsection
