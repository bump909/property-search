<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\PropertyService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('property.index');
    }

    public function search(SearchRequest $request, PropertyService $property)
    {
        $results = $property->search($request->validated());

        return view('property.results', [
            'results' => $results->appends($request->validated()),
        ]);
    }
}
