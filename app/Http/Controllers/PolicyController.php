<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display Privacy Policy
     */
    public function privacyPolicy()
    {
        $policy = Policy::privacyPolicy();
        
        if (!$policy) {
            abort(404, 'Privacy Policy not found');
        }

        return view('policies.show', [
            'policy' => $policy,
            'pageTitle' => 'Privacy Policy'
        ]);
    }

    /**
     * Display Terms of Service
     */
    public function termsOfService()
    {
        $policy = Policy::termsOfService();
        
        if (!$policy) {
            abort(404, 'Terms of Service not found');
        }

        return view('policies.show', [
            'policy' => $policy,
            'pageTitle' => 'Terms of Service'
        ]);
    }
}
