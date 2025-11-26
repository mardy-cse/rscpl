<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\HandlesTransactions;
use App\Http\Traits\HandlesFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class AdminController extends Controller
{
    use HandlesTransactions, HandlesFileUploads, AuthorizesRequests;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Middleware is applied via routes, not in base controller constructor
    }
}
