<?php

namespace Blazervel\Workspaces\Models;

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Blazervel\Workspaces\Models\Traits\WithLookupByUuid;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class WorkspaceUserInviteModel extends Model
{
    use WithLookupByUuid, Notifiable;

    public $table = 'workspace_user_invites';

    protected $fillable = [
        'workspace_id',
        'accepted_at',
        'accepted_by',
        'invited_by',
        'email',
    ];

    public function link(): string
    {
        return URL::signedRoute('workspaces.users.invites.accept', [
            'workspace' => $this->workspace,
            'workspaceUserInvite' => $this,
        ]);
    }

    static function intendedUrlIsWorkspaceInviteAccept(): bool
    {
        $intendedUrl = Session::get('url.intended') ?: '';
        $matchStrings = 'users/invites|accept|signature=';

        return (
            Str::containsAll($intendedUrl, explode('|', $matchStrings))
        );
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class);
    }

    public function invitedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'invited_by');
    }
}
