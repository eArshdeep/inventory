<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'collections';

    // declare relationship with items
    public function items()
    {
      return $this->hasMany('App\Item');
    }
}
