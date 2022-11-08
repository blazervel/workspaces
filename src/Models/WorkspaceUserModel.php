<?php

namespace Blazervel\Workspaces\Models;

use Blazervel\Blazervel\Casts\EnumArray;
use Illuminate\Database\Eloquent\Model;

class WorkspaceUser extends Model
{
    public $table = 'workspace_users';

    protected $fillable = [
        'workspace_id',
        'user_id',
        'role',
    ];

    protected $casts = [
        'role' => EnumArray::class,
    ];

    protected $roles = [
        'admin',
        'owner',
    ];
}
