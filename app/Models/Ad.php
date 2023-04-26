<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ad extends Model
{
    protected $fillable = ['title','body','price'];
    use HasFactory;

    public function user () {
        return $this->belongsTo(User::class);
    }
}
