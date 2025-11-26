<?php

namespace App\Http\Controllers\Admin;

use App\Models\TermsCondition;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTermsConditionRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TermsConditionController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function edit()
    {
        $terms = TermsCondition::first();
        return view('admin.terms-conditions.edit', compact('terms'));
    }

    public function update(UpdateTermsConditionRequest $request): RedirectResponse
    {
        return $this->handleUpdate(
            fn() => TermsCondition::updateContent($request->validated('content')),
            'terms and conditions',
            'admin.terms-conditions.edit'
        );
    }
}
