<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'full_name',
        'course',
        'year_level',
        'email',
    ];

    protected $appends = [
        'year_level_label',
    ];

    public function getYearLevelLabelAttribute(): string
    {
        $suffix = match ((int) $this->year_level) {
            1 => 'st',
            2 => 'nd',
            3 => 'rd',
            default => 'th',
        };

        return "{$this->year_level}{$suffix} Year";
    }
}
