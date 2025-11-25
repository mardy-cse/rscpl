<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display list of policies
     */
    public function index()
    {
        $policies = Policy::all();
        return view('admin.policies.index', compact('policies'));
    }

    /**
     * Show edit form for a policy
     */
    public function edit($id)
    {
        $policy = Policy::findOrFail($id);
        return view('admin.policies.edit', compact('policy'));
    }

    /**
     * Update policy content
     */
    public function update(Request $request, $id)
    {
        $policy = Policy::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $policy->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.policies.index')
            ->with('success', 'Policy updated successfully!');
    }
}
