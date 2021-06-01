@extends('layouts.frontend')

@section('title', 'Yikes - Properties')
@section('meta_description', 'Search for properties by Yikes')

@section('content')
    @include('partials.search_form')

    @forelse($results ?? [] as $property)
        <div class="row mt-5">
            <div class="col-12">
                <h5>Available Property Search Results</h5>
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <dl class="row px-3">
                            <dt class="col-sm-3">Property Name</dt>
                            <dd class="col-sm-3">{{ $property->property_name }} <i>({{ $property->location_name }})</i></dd>
                            <dt class="col-sm-3">Sleeps</dt>
                            <dd class="col-sm-3">{{ $property->sleeps }} <i>({{ $property->beds }} Beds)</i></dd>
                            <dt class="col-sm-3">Near Beach</dt>
                            <dd class="col-sm-3">{{ $property->near_beach ? 'Yes' : 'No' }}</dd>
                            <dt class="col-sm-3">Accepts Pets</dt>
                            <dd class="col-sm-3">{{ $property->accepts_pets ? 'Yes' : 'No' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            {{ $results->links() }}
        </div>
    @empty
        <div class="row mt-5">
            <div class="col-12">
                <h5>No property results for this search data</h5>
            </div>
        </div>
    @endforelse
    <a class="btn btn-secondary mt-2" href="/">Reset</a>
@endsection
