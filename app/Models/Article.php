<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'description','image','created_by','status'];
    public function details()
    {
        return $this->hasMany('App\Models\arcticalDetails', 'arctical_id', 'id');
    }
    public function flags()
    {
        return $this->hasMany('App\Models\arcticalFlags', 'arctical_id', 'id');
    }
    protected $table = 'arcticals';
    use HasFactory;
}
