<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PropertyService
{
    public function search($data)
    {
        $start_date = Carbon::createFromFormat('Y-m-d', $data['start_date']);
        $end_date = Carbon::createFromFormat('Y-m-d', $data['end_date']);

        $query = DB::table('properties')
            ->select([
                'properties.__pk',
                'property_name',
                'location_name',
                'near_beach',
                'accepts_pets',
                'sleeps',
                'beds',
            ])
            ->leftJoin('locations', 'locations.__pk', '=', 'properties._fk_location')
            ->leftJoin('bookings', 'properties.__pk', '=', 'bookings._fk_property');

        if (isset($data['location_search'])) {
            $query->where('locations.location_name', 'like', "%{$data['location_search']}%");
        }

        if (isset($data['near_beach']) && $data['near_beach']) {
            $query->where('properties.near_beach', true);
        }

        $query->where('properties.accepts_pets', $data['accepts_pets'])
            ->where('properties.sleeps', '>=', $data['sleeps'])
            ->where('properties.beds', '>=', $data['beds'])
            ->where(function ($q) use ($start_date, $end_date) {
                $q->whereNotBetween('bookings.start_date', [$start_date, $end_date])
                    ->orWhereNull('bookings.start_date');
            })
            ->where(function ($q) use ($start_date, $end_date) {
                $q->whereNotBetween('bookings.end_date', [$start_date, $end_date])
                    ->orWhereNull('bookings.end_date');
            })
            ->groupBy('properties.__pk')
            ->orderBy('properties.property_name');

        return $query->paginate(1);
    }
}
