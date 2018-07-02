<?php
namespace App\Models\Users;

use App\Supports\Search;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable {
    use Notifiable,
    SoftDeletes,
        Search;
    use EntrustUserTrait {restore as private restoreA;}
    use SoftDeletes {restore as private restoreB;}

    public function restore() {
        $this->restoreA();
        // $this->restoreB();
    }

    const ONE           = 1;
    const ZERO          = 0;
    const TABLE         = 'users';
    const FULLNAME      = 'fullname';
    const USERNAME      = 'username';
    const EMAIL         = 'email';
    const PHONE         = 'phone';
    const DEPARTMENT_ID = 'department_id';
    const BRANCH_ID     = 'branch_id';
    const POSITION_ID   = 'position_id';
    const CREATE_BY     = 'create_by';
    const UPDATED_BY    = 'updated_by';
    const AVATAR        = 'avatar';
    const BIRTHDAY      = 'birthday';
    const COMPANY_ID    = 'company_id';
    const GENDER        = 'gender';
    const ADDRESS       = 'address';
    const ACTIVE        = 'active';
    const PASSWORD      = 'password';
    const CURRENT       = 'current';
    const DELETED       = 'deleted';
    const ITEMS         = 'items';
    const TYPE          = 'type';
    const IDENTITY      = 'identity';
    const PROVIDER      = 'provider';
    const PROVIDER_ID   = 'provider_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::USERNAME,
        self::FULLNAME,
        self::EMAIL,
        self::PASSWORD,
        self::ADDRESS,
        self::BRANCH_ID,
        self::DEPARTMENT_ID,
        self::POSITION_ID,
        self::BIRTHDAY,
        self::GENDER,
        self::PHONE,
        self::AVATAR,
        self::IDENTITY,
        self::PROVIDER,
        self::PROVIDER_ID,
        self::ACTIVE,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $fieldVN = [
        self::EMAIL    => 'email',
        self::PASSWORD => 'mật khẩu',
        self::PHONE    => 'điện thoại',
        self::BIRTHDAY => 'ngày sinh',
        self::FULLNAME => 'họ tên',
        self::IDENTITY => 'chứng minh thư',
    ];

    public static $rules = [
        self::EMAIL         => 'required|email|max:255|unique:' . self::TABLE,
        self::FULLNAME      => 'required|max:60',
        self::PHONE         => 'min:8|max:15|regex:/^[0-9]+$/',
        self::GENDER        => 'required',
        self::DEPARTMENT_ID => 'required',
        self::BIRTHDAY      => 'date|date_format:"d-m-Y"',
        self::POSITION_ID   => 'required',
        self::BRANCH_ID     => 'required',
        self::PASSWORD      => 'required|confirmed',
        self::BRANCH_ID     => 'required',
        self::IDENTITY      => 'digits_between:9,12|numeric',
    ];

    public static $rulesUpdate = [
        self::PHONE => 'min:8|max:15|regex:/^[0-9]+$/',
    ];

    public static function getMessages() {
        return [
            'required'    => trans('validation.required'),
            'max:191'     => trans('validation.max.string'),
            'confirmed'   => trans('validation.confirmed'),
            'date_format' => trans('validation.date_format'),
            'regex'       => trans('validation.regex'),
            'between'     => trans('validation.between'),
        ];
    }

    public function setPassWordAttribute($value) {
        $this->attributes[self::PASSWORD] = Hash::make($value);
    }

    public function setEmailAttribute($value) {
        $this->attributes[self::EMAIL] = strtolower($value);
    }

    public function setActiveAttribute($value) {
        $this->attributes[self::ACTIVE] = self::ZERO;
    }

    public function setBirthdayAttribute($value) {
        $this->attributes[self::BIRTHDAY] = \Carbon\Carbon::parse($value);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query) {
        return $query->where(self::ACTIVE, self::ONE);
    }

    public function token() {
        return $this->hasMany('App\Models\Users\UserToken', 'user_id');
    }

    public function getBirthdayAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }

    const MALE   = 1;
    const FEMALE = 2;

    public static $listGender = [
        self::MALE   => 'Nam',
        self::FEMALE => 'Nữ',
    ];
}
