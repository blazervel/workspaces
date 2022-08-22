<?php

namespace Blazervel\Workspaces\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{
  Factories\HasFactory,
  Relations\BelongsToMany,
  SoftDeletes,
  Model,
};

class Workspace extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'name',
    'uuid',
  ];

  public function getRouteKeyName(): string
  {
    return 'uuid';
  }

  protected static function booted()
  {
    static::creating(function ($workspace) {
      $workspace->uuid = (string) Str::orderedUuid();
    });
  }

  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'workspace_users');
  }
}
