<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    // THIS WILL ALLOW FOR THE USE OF SOFT DELETES IN OUR MODEL
    use SoftDeletes;

    protected $fillable = ['title', 'completed'];


    /**

     * The attributes that should be mutated to dates.

     *

     * @var array

     */

    protected $dates = ['deleted_at'];
}
