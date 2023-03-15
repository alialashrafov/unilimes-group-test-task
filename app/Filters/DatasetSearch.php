<?php

namespace App\Filters;

use App\Models\DataSet;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DatasetSearch
{
    public static function apply(Request $filters)
    {
        $dataset = (new DataSet)->newQuery();

        if ($filters->has('category')) {
            $dataset->where('category', $filters->category);
        }

        if ($filters->has('firstname')) {
            $dataset->where('firstname', $filters->firstname);
        }

        if ($filters->has('lastname')) {
            $dataset->where('lastname', $filters->lastname);
        }

        if ($filters->has('email')) {
            $dataset->where('email', $filters->email);
        }

        if ($filters->has('gender')) {
            $dataset->where('gender', $filters->gender);
        }

        if ($filters->has('birthDate')) {
            $dataset->where('birthDate', $filters->birthDate);
        }

        if($filters->has('age') && is_numeric($filters->age)) {
            $currentDate = Carbon::now();
            $currentYear = $currentDate->year;
            $SearchDate = $currentYear - $filters->age;
            $dataset->whereYear('birthDate','=', $SearchDate);
        }

        if($filters->has('first_age') && $filters->has('second_age')) {
            $minDate = Carbon::today()->subYears($filters->second_age);
            $maxDate = Carbon::today()->subYears($filters->first_age)->endOfDay();
            $dataset->whereBetween('birthdate', [$minDate, $maxDate]);
        }

        return $dataset->paginate(20);
    }
}
