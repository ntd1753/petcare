<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $pets = Pet::where('name', 'like', '%' . $search . '%')->get();
//dd($pets);
        return view('content.search.searchPet.search_pet', ['pets' => $pets]);
    }

}
