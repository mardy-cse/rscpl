<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function edit()
    {
        $terms = TermsCondition::first();
        return view('admin.terms-conditions.edit', compact('terms'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        TermsCondition::updateContent($request->content);

        return redirect()->route('admin.terms-conditions.edit')
            ->with('success', 'Terms and Conditions updated successfully!');
    }
}
