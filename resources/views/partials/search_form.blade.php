<h1>Search for a property</h1>

<form method="GET" role="search" action="{{ route('search') }}">
    {{-- @csrf --}}
    <div class="form-group row">
        <label for="location_search" class="col-md-4 col-form-label text-md-right">Location Search</label>
        <div class="col-md-6">
            <input id="location_search" type="text" class="form-control" name="location_search" value="{{ request()->location_search }}">
        </div>
    </div>

    <div class="form-check row">
        <div class="col-md-8 offset-md-4">
            <div class="ml-2">
                <input class="form-check-input" type="checkbox" name="near_beach" value="1" id="near_beach" {{ request()->near_beach == true? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="near_beach">
                    Near beach <span class="small">(uncheck for any)</span>
                </label>
            </div>
        </div>
    </div>

    <div class="form-check row my-3">
        <div class="col-md-8 offset-md-4">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="accepts_pets_yes" name="accepts_pets" class="custom-control-input" value="1" {{ request()->accepts_pets == 1 ? 'checked="checked"' : '' }}>
                <label class="custom-control-label" for="accepts_pets_yes">Accepts Pets</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="accepts_pets_no" name="accepts_pets" class="custom-control-input" value="0" {{ request()->accepts_pets == 0 ? 'checked="checked"' : '' }}>
                <label class="custom-control-label" for="accepts_pets_no">No Pets</label>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="sleeps" class="col-md-4 col-form-label text-md-right">Sleeps</label>
        <div class="col-md-6">
            <input id="sleeps" type="number" class="form-control{{ $errors->has('sleeps') ? ' is-invalid' : '' }}" name="sleeps" value="{{ request()->sleeps ?? 2 }}" required />
            @if ($errors->has('sleeps'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sleeps') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="beds" class="col-md-4 col-form-label text-md-right">Beds</label>
        <div class="col-md-6">
            <input id="beds" type="number" class="form-control {{ $errors->has('beds') ? ' is-invalid' : '' }}" name="beds" value="{{ request()->beds ?? 1 }}" required />
            @if ($errors->has('beds'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('beds') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="start_date" class="col-md-4 col-form-label text-md-right">start_date</label>
        <div class="col-md-6">
            <input id="start_date" type="date" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" value="{{ request()->start_date }}"
                required />
            @if ($errors->has('start_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('start_date') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="end_date" class="col-md-4 col-form-label text-md-right">end_date</label>
        <div class="col-md-6">
            <input id="end_date" type="date" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" value="{{ request()->end_date }}" required />
            @if ($errors->has('end_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('end_date') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div>
        <input type="submit" class="btn btn-primary" value="Search" />
    </div>
</form>