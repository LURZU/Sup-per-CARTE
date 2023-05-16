<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function favorites()
    {
        return $this->belongsToMany(Card::class, 'student_card_fav', 'user_id', 'card_id');
    }

    
    public function matieres()
    {
        return $this->belongsToMany(Matiere::class, 'matiere_user', 'user_id', 'matiere_id');
    }

    public function card_status_user()
    {
        return $this->belongsToMany(Card::class, 'user_status_card', 'user_id', 'card_id');
    }

    public function getCardStatus($card, $user_id) {
        //Query to obtain the status of card with join 3 tables 
        $query = $this->join('user_status_card', 'users.id', '=', 'user_status_card.user_id')
        ->join('card', 'user_status_card.card_id', '=', 'card.id')
        ->join('status_card', 'user_status_card.status_card_id', '=', 'status_card.id')
        ->select('status_card.id', 'status_card.label', 'user_status_card.user_id')
        ->where('users.id', $user_id)
        ->where('card.id', $card->id)
        ->first();
        $card->auth_id_user = $query->user_id;
        $card->status_card = $query->label;
        $card->status_card_id = $query->id;
        return $card;
        
    }
    
    public function hasRole($role): bool {
        if($this->roles()->first()->name === $role) {
            return true;
        }
        return false;
    }

    
}
