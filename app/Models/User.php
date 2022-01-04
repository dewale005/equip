<?php

namespace App\Models;

use AshAllenDesign\ShortURL\Classes\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'referred_by',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'gender',
        'state',
        'verification_code',
        'password',
    ];

    protected $appends = ['referral_link'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referred_by', 'id');
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by', 'id');
    }

    public function getReferralLinkAttribute()
    {
        $builder = new Builder();
        $shortUrlObject = $builder->destinationUrl(route('register', ['ref' => bin2hex($this->phone_number)]))->make();
        $shortUrl = $shortUrlObject->default_short_url;
        return $this->referral_link = route('register', ['ref' => strtoupper(dechex($this->phone_number))]);
        // return $this->referral_link = Shorten('https://mux.com/?utm_campaign=carbon_q4_2021&utm_source=carbon&utm_medium=display&utm_content=hmpg');
    }
}
