<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RolePage extends Model
{
    //
    protected $table = 'role_page';

    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function page()
    {
        return $this->belongsTo('App\Model\Page', 'page_id');
    }
}
