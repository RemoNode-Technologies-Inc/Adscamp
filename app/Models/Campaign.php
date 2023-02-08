<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable=['name','from_date','to_date','total_budget','daily_budget','image'];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }

    public function getImageAttribute($value)
    {
        return json_decode($value, true);
    }
}

