<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $fillable = [
        'name', 'created_at', 'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
