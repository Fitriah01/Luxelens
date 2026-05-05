<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team_name',
        'specialization',
        'phone',
        'work_days',
    ];

    protected $casts = [
        'work_days' => 'array',
    ];

    public function availableOnDate($date)
    {
        $weekday = strtolower(
            \Carbon\Carbon::parse($date)->format('l')
        );

        return in_array($weekday, $this->work_days ?? []);
    }
}
