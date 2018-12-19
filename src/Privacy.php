<?php

namespace Tsubasarcs\Privacier;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    protected $table = 'privacies';
    protected $fillable = ['uid'];
}
