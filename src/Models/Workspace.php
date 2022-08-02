<?php

namespace Blazervel\Workspaces\Models\Workspace;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{
  Factories\HasFactory,
  Relations\BelongsToMany,
  Relations\HasMany,
  SoftDeletes,
  Model,
};
use Illuminate\Database\Eloquent\Relations\HasOne;

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

  public function scorecards(): HasMany
  {
    return $this->hasMany(Scorecard::class);
  }

  public function stripeConnector(): HasOne
  {
    return $this->hasOne(StripeConnector::class);
  }
}
