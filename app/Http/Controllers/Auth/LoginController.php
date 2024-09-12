<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Handle the post-login redirect based on user role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    protected function authenticated($request, $user)
    {
        // Check if the user is an admin
        if ($user->isAdmin == 1) {
            // Redirect to the admin dashboard
            return redirect()->route('dashboard');
        } else {
            // Redirect to the user profile or another user-specific route
            return redirect()->route('dashboarduser');
        }
    }
}
