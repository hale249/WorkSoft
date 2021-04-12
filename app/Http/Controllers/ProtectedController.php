<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProtectedController extends Controller
{
    protected $currentUser = null;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->currentUser = Auth::user();

            if ($this->currentUser) {
                View::share('currentUser', $this->currentUser);
            }

            return $next($request);
        });
    }
}
