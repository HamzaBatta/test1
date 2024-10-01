<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ar_title','en_title','ar_details','en_details','photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

 }

