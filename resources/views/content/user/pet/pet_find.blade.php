{{-- resources/views/pets/index.blade.php --}}

@extends("layouts.ManagerLayout")

@section('content')
<div class="container">
    <h1>Search for Pets</h1>
    <form action="{{ route('pets.search') }}" method="GET">
        <div class="form-group">
            <label for="search">Pet Name:</label>
            <input type="text" class="form-control" id="search" name="search" required placeholder="Enter pet name">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(isset($pets) && $pets->count() > 0)
        <h2>Search Results</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Species</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pets as $pet)
                    <tr>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->age }}</td>
                        <td>{{ $pet->species->species_name }}</td>
                        <td>{{ $pet->user->user_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(isset($pets))
        <p>No results found for your search.</p>
    @endif
</div>
@endsection
