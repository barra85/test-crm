<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function getAccountManagersAttribute()
    {
        return $this->where(['sales_manager_id' => $this->id])->get();
    }

    public function getSalesManagerAttribute()
    {
        return $this->where(['id' => $this->sales_manager_id])->first();
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function shops()
    {
        return $this->belongsToMany('App\Shop')->where('visitor_country_id', $this->country_id);
    }

    public function is($p_vRoleName)
    {
        $aRoles = (is_array($p_vRoleName)) ? $p_vRoleName : [$p_vRoleName];

        foreach ($this->roles()->get() as $role)
        {
            if (in_array($role->name, $aRoles)) {
                return true;
            }
        }

        return false;
    }
}
