<?php

namespace L56S;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address_one', 'address_two', 'city', 'state', 'postal_code', 'phone_number', 'phone_ext', 'gravatar',
        'email', 'password', 'email_token', 'et_created_at'
    ];

    /**
     * Additional fields to treat as Carbon instances.
     *
     * @var array
     */
    protected $dates = ['created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Scope queries to users that have a specific role.
     *
     * @param $query
     */
    public function scopeHasRole($query)
    {
        $query->where('approved', 1)->orderBy('start_date', 'asc');
    }

    /**
     * Get the human readable created at date this user was created.
     *
     * @return mixed
     */
    public function getCreatedAtAttribute($date) {

        return Carbon::parse($date)->diffForHumans();

    }

    /**
     * Get the users first name only.
     *
     * @return mixed
     */
    public function getFirstNameAttribute() {

        $first_last = explode(" ", $this->attributes['name']);
        if (count($first_last) >= 2) {
            return ucfirst($first_last[0]);
        } else {
            return ucfirst($this->attributes['name']);
        }

    }

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    /**
     * A user hasOne state.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne('L56S\State');
    }

}
