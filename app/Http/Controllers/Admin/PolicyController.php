<?php

namespace App\Http\Controllers\Admin;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PolicyController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display list of policies
     */
    public function index(): View
    {
        $policies = Policy::all();
        return view('admin.policies.index', compact('policies'));
    }

    /**
     * Show edit form for a policy
     */
    public function edit(int $id): View
    {
        $policy = Policy::findOrFail($id);
        return view('admin.policies.edit', compact('policy'));
    }

    /**
     * Update policy content
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $policy = Policy::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000000',
        ]);

        return $this->handleUpdate(
            fn() => $policy->update($validated),
            'policy',
            'admin.policies.index',
            ['policy_id' => $id]
        );
    }
}
