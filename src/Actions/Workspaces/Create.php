<?php

namespace Blazervel\Workspaces\Actions\Workspaces;

use Blazervel\Blazervel\Action;
use Inertia\Inertia;
use Inertia\Response;

class Create extends Action
{
    public function handle(): Response
    {
        return Inertia::render('@blazervel-workspaces/Pages/Create');
    }
}
