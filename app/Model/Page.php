<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Page extends Model
{
    //
    use HasRoles;
    protected $table = 'page';
    protected $guard_name = 'web';
}
