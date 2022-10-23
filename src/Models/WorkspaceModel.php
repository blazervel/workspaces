<?php

namespace Blazervel\Workspaces\Models;

use App\Models\User;
use Blazervel\Workspaces\Models\Traits\WithLookupByUuid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class WorkspaceModel extends Model
{
    use HasFactory, SoftDeletes, WithLookupByUuid;

    public $table = 'workspaces';

    protected $fillable = [
        'uuid',
        'name',
        'subdomain',
    ];

    protected static function booted()
    {
        static::creating(function ($workspace) {
            $workspace->subdomain = Str::slug($workspace->name);
            $workspace->uuid = (string) Str::orderedUuid();
        });
    }

    public function setCurrent(): void
    {
        Cookie::queue('current_workspace_id', $this->id, 1000);
    }

    public static function current(): self|null
    {
        $workspace = null;

        if (!$user = Auth::user()) {
            return null;
        }
        
        if ($workspaceId = Cookie::get('current_workspace_id')) {
            $workspace = $user->workspaces()->find($workspaceId);
        }

        return $workspace ?: $user->workspaces()->first();
    }

    static function workspaceNameFromUserName(User $user): string
    {
        $firstName = $user->first_name ?? explode(' ', $user->name)[0];
        $endsWithS = Str::endsWith(Str::lower($firstName), 's');
        $userFirstNamePossessive = implode('', [$firstName, "'", $endsWithS ? '' : 's']);

        return $userFirstNamePossessive;
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'workspace_users');
    }

    public function invites(): HasMany
    {
        return $this->hasMany(WorkspaceUserInviteModel::class);
    }
}
