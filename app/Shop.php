<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function accountManagers()
    {
        return $this->belongsToMany('App\User');
    }

    public function visitor_country()
    {
        return $this->belongsTo('App\Country');
    }

    public function invoice_country()
    {
        return $this->belongsTo('App\Country');
    }
}
