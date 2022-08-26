<?php

namespace Blazervel\Workspaces\Features\Workspaces;

use Inertia\{
  Inertia,
  Response
};
use Blazervel\Feature\Action;

class Create extends Action
{

  public function handle(): Response
  {
    return Inertia::render('@blazervelWorkspaces/Pages/Create');
  }

}