<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Services\ActionService;
use App\Services\ValidatorService;

class ActionController extends Controller
{
    public function __construct(
        protected ActionService $actionService,
        protected ValidatorService $validatorService
    )
    {
    }

    public function store(ValidationRequest $request)
    {
        $validated = $request->collect('fields');
        $fields = $this->actionService->getFields($validated);
        $result = $this->validatorService->validateAll($fields);

        if (!$result['success']) {
            return response()->json($result)->setStatusCode(422);
        }

        return response()->json($result);
    }
}
