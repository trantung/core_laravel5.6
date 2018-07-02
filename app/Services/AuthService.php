<?php
namespace App\Services;

use App\Models\Users\User;
use App\Models\Users\UserToken;
use App\Services\ActivationService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthService {

    public static $message;

    public $user;

    private $request;

    private $response;

    private $model;

    protected $activationService;

    const FULLNAME             = 'fullname';
    const EMAIL                = 'email';
    const PASSWORD             = 'password';
    const PASSWORD_CONFIRM     = 'password_confirmation';
    const G_RECAPTCHA_RESPONSE = 'g-recaptcha-response';
    const DEACTIVE             = 0;

    public function __construct(Request $request, ResponseService $response, User $model, ActivationService $activationService) {
        $this->request           = $request;
        $this->response          = $response;
        $this->model             = $model;
        $this->activationService = $activationService;
    }

    public function login() {
        $data      = $this->request->all();
        $validator = $this->validator($data, self::$loginRules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($data);
        }
        $user = $this->model
            ->where(self::EMAIL, $this->request->input(self::EMAIL))
            ->first();
        if (!$user) {
            return redirect()
                ->back()
                ->withInput($data)
                ->with('error', true)
                ->with('message', trans('messages.account_does_not_exists'));
        }
        if ($user->active == self::DEACTIVE) {
            $this->activationService->sendActivationMail($user);
            // auth()->logout();
            return redirect()
                ->back()
                ->with('error', true)
                ->with('message', trans('messages.you_need_to_authenticate_your_account') . trans('messages.we_sent_authenticate_code_to_your_email') . trans('messages.please_check_and_do_it'));
        }
        if (Auth::attempt(
            [
                self::EMAIL    => $this->request->input(self::EMAIL),
                self::PASSWORD => $this->request->input(self::PASSWORD),
            ]
        )) {
            return redirect()->action('Administrators\Systems\DashboardController@index');
        } else {
            return redirect()
                ->back()
                ->withInput($data)
                ->with('error', true)
                ->with('message', trans('messages.account_or_password_is_wrong'));
        }
        return redirect()->route('login');
    }

    public function logout() {
        Auth::logout();
        return self::redirectLogin();
    }

    public static $loginRules = [
        self::EMAIL    => 'required',
        self::PASSWORD => 'required|min:6',
        //self::G_RECAPTCHA_RESPONSE => 'required|recaptcha',
    ];

    public static $registerRules = [
        self::EMAIL    => 'required|email|max:255',
        self::PASSWORD => 'required|min:6|confirmed',
        self::FULLNAME => 'required|max:60',
    ];

    /**
     * [validator validator]
     * @param  array  $array [all input need validate]
     * @return
     */

    private function validator(array $array, $rules) {
        $messages = [
            'required' => trans('validation.required'),
            'max'      => trans('validation.max.string'),
        ];
        return Validator::make($array, $rules, $messages, \App\Models\Users\User::$fieldVN);
    }

    public static function user() {
        if ($user = Auth::user()) {
            return $user;
        }
        return self::redirectLogin();
    }

    public static function token() {
        if ($user = self::user()) {
            return $user->token;
        }
        return null;
    }

    public static function isLogged() {
        $currentTime = time();
        $userToken   = UserToken::where('token', self::token())
            ->where('expire', '>', $currentTime)->first();
        if (empty($userToken)) {
            return false;
        }
        $user = User::where('id', $userToken->user_id)->first();
        if (!empty($user)) {
            return true;
        }
        return false;
    }

    public static function redirectLogin() {
        return view('administrator.auth.login');
    }

    public function activateUser($token) {
        if ($user = $this->activationService->activateUser($token)) {
            Auth::login($user);
            return redirect(route('login'));
        }
        abort(404);
    }

    public function registerUser() {
        $fieldInput = [
            self::FULLNAME,
            self::EMAIL,
            self::PASSWORD,
            self::PASSWORD_CONFIRM,
        ];
        $input     = $this->request->only($fieldInput);
        $validator = $this->validator($input, self::$registerRules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($input);
        }
        $obj = $this->model->create($input);
        if ($obj) {
            $this->activationService->sendActivationMail($obj);
            return redirect()
                ->back()
                ->with('status', true)
                ->with('message', trans('messages.register_success') . trans('messages.we_sent_authenticate_code_to_your_email') . trans('messages.please_check_and_do_it'));
        }
        return redirect()
            ->back()
            ->withInput($input)
            ->with('error', true)
            ->with('message', trans('messages.create_failed'));
    }

}
