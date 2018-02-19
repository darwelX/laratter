<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar','private',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relacion uno a muchos.
     * Un usuario tiene muchos mensajes
     */
    public function messages(){
        return $this->hasMany(Message::class)->orderBy('created_at', 'desc');
    }

    /**
     * Quienes me siguen
     */
    public function follows(){
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'followed_id');
    }

    /**
     * A quien sigo yo
     */
    public function followers(){
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'user_id');
    }

    public function isFollowing(User $user){
        return $this->follows->contains($user);
    }

    /**
     * Un usuario tiene muchos perfiles (google plus, facebook, twiter..)
     */
    public function socialProfiles()
    {
        return $this->hasMany(\App\SocialProfile::class);
    }

    public function invitations(){
        return $this->belongsToMany(User::class, 'invitations', 'user_id' , 'user_for_id')->orderBy('created_at', 'desc')->withPivot('accepted');
    }

    public function invitationFrom()
    {
        return $this->belongsToMany(User::class, 'invitations', 'user_for_id' , 'user_id')->withPivot(['accepted','created_at', 'updated_at'])->orderBy('created_at', 'desc');
    }

    public function isInvitation(User $user){
        $flag = false;
        foreach($this->invitations as $invitation){
            if($invitation->pivot->accepted == 0 && $invitation->id == $user->id){
                $flag = true;
                break;
            }
        }
        return $flag;
    }

    public function isInvitationAccepted(USer $user)
    {
        $flag = false;
        foreach($this->invitationFrom as $invitation)
        {
            if($invitation->pivot->accepted == 1 && $invitation->id == $user->id){
                return true;
            }
        }
        return $flag;
    }

    public function notInvitation(User $user)
    {
        return !$this->invitationFrom->contains($user);
    }
}
