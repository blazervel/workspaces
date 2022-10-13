<?php

namespace Blazervel\Workspaces\Features\Workspaces;

use Blazervel\Features\Action;
use Inertia\Inertia;
use Inertia\Response;

class Create extends Action
{
    public function handle(): Response
    {
        return Inertia::render('@blazervel/workspaces/Pages/Create');
    }
}
