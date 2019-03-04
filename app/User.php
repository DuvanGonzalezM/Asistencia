<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta accion no esta autorizada');
    }

    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('name',$role)->first()) {
            return true;
        }
        return false;
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'UsType', 'UsAvatar', 'UsStatus', 'UsSlug', 'UsRol', 'UsRolDesc', 'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getRouteKeyName()
    {
        return 'UsSlug';
    }
    //se especifica la raclacion con la tabla declaraciones
    public function ArticuloProv()
    {
        return $this->hasMany('App\ArticuloPorProveedor', 'ID_ArtiProve', 'id');//como user tiene muchas declaraciones
    }
    public function OrdenCompras()
    {
        return $this->hasMany('App\ordenCompra', 'ID_Orden', 'id');
    }
}
