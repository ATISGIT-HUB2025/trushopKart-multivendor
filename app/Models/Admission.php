<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
        'full_name',
        'date_of_birth',
        'state',
        'district',
        'taluka',
        'cluster',
        'school_name',
        'medium',
        'standard',
        'email',
        'gender',
        'parent_mobile',
        'teacher_mobile',
        'photo',
        'selected_exam',
        'exam_type',
        'admission_fee',
        'additional_fee',
        'total_fee',
        'payment_status',
        'transaction_id',
        'status',
        'center_id',

        'user_type',
        'division',
        'sr_no',
   
        'udise_no_school',
        'student_serial_id',
        'barcode',
        'seat_no',
        'paper_1',
        'paper_2'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'admission_fee' => 'decimal:2',
        'additional_fee' => 'decimal:2',
        'total_fee' => 'decimal:2'
    ];

    public function center()
{
    return $this->belongsTo(Center::class);
}


public function scopeFilterByState($query, $state)
{
    return $query->where('state', $state);
}

public function scopeFilterByDistrict($query, $district)
{
    return $query->where('district', $district);
}

public function scopeFilterByTaluka($query, $taluka)
{
    return $query->where('taluka', $taluka);
}

public function scopeFilterByCluster($query, $cluster)
{
    return $query->where('cluster', $cluster);
}

public function scopeFilterBySchool($query, $school)
{
    return $query->where('school_name', $school);
}

public function admition()
{
    return $this->hasOne(Admission::class, 'email');
}


}
