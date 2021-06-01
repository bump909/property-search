<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = '__pk';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the bookings for the property.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, '_fk_property', '__pk');
    }

    /**
     * Get the location for the property.
     */
    public function location()
    {
        return $this->belongsTo(Location::class, '_fk_location');
    }

    /**
     * Scope a query to only include properties near a beach.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    // public function scopeNearBeach($query)
    // {
    //     return $query->where('near_beach', 1);
    // }
}
