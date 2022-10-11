<?php

namespace Blazervel\Workspaces\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WorkspaceUserInvited extends Notification // implements ShouldQueue
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $workspaceUserInvite = $notifiable;
        $invitedBy           = $workspaceUserInvite->invitedBy()->first();
        $workspace           = $workspaceUserInvite->workspace;
        $tr                  = 'blazervel_workspaces::invites';

        return (new MailMessage)
                    ->subject(
                         __("{$tr}.user_invited_you_to_app", ['user_name' => $invitedBy->name, 'app_name' => config('app.name')])
                    )
                    ->greeting(
                        __("{$tr}.hey_there")
                    )
                    ->line(
                        __("{$tr}.user_invited_you_to_app_workspace", ['user_name' => $invitedBy->name, 'workspace_name' => $workspace->name, 'app_name' => config('app.name')])
                    )
                    ->action(
                        __("{$tr}.accept_invite"),
                        $workspaceUserInvite->link()
                    )
                    ->line(
                        __("{$tr}.if_this_was_sent_by_mistake")
                    );

    }
}
