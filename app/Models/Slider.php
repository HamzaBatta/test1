<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','ar_title','en_title','ar_sub_title','en_sub_title','photo'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
