<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $guard_name
 * @property string $created_at
 * @property string $updated_at
 * @property ModelHasPermission[] $modelHasPermissions
 * @property Role[] $roles
 */
class Permissions extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'guard_name', 'created_at', 'updated_at' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelHasPermissions()
    {
        return $this->hasMany('App\ModelHasPermission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_has_permissions');
    }
}
