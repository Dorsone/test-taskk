<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Services\ActionService;
use App\Services\ValidatorService;
use Illuminate\Http\RedirectResponse;

class ActionController extends Controller
{
    public function __construct(
        protected ActionService $actionService,
        protected ValidatorService $validatorService
    )
    {
    }

    public function store(ValidationRequest $request): RedirectResponse
    {
        $validated = $request->collect('fields');
        $fields = $this->actionService->getFields($validated);
        $result = $this->validatorService->validateAll($fields);

        if (!$result['success']) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($result['errors']);
        }

        $saved = $this->actionService->store($result['data']);

        // какие-то манипуляции или респонсе

        return to_route('');
    }
}
