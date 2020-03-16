<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wandxx\Support\Traits\UuidForKey;

class UserFeedback extends Model
{
    use UuidForKey;

    protected $guarded = ["id"];
    public $incrementing = false;
}
