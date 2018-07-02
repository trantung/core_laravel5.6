<?php
namespace App\Http\Controllers\Administrators\Auth;

use App\Http\Controllers\Controller;
use App\Models\Systems\Company;
use App\Models\Users\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthsController extends Controller {

    private $request;

    private $response;

    private $user;

    public function __construct(Request $request, User $user, AuthService $auth) {
        $this->request = $request;
        $this->user    = $user;
        $this->auth    = $auth;
        $this->middleware('auth', ['except' => ['postLogin', 'getLogin', 'getActiveUser', 'postRegister']]);
    }

    public function postLogin() {
        return $this->auth->login();
    }

    public function getLogout() {
        return $this->auth->logout();
    }

    public function getLogin() {
        if (Auth::check()) {
            return redirect()->action('Administrators\Systems\DashboardController@index');
        }
        return AuthService::redirectLogin();
    }

    public function getActiveUser($token) {
        return $this->auth->activateUser($token);
    }

    public function postRegister() {
        return $this->auth->registerUser();
    }
}
