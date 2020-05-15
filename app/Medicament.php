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

    public function exempt() {
        return $this->belongsTo('App\Exempt');
    }

    public function release() {
        return $this->belongsTo('App\Release');
    }
}
