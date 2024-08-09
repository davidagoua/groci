<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Actions\SendSms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function paniers(): HasMany
    {
        return $this->hasMany(Panier::class);
    }

    public function boutiques(): HasMany{
        return $this->hasMany(Boutique::class);
    }

    public function boutique(): HasOne
    {
        return $this->hasOne(Boutique::class)->ofMany();
    }

    public function generateCode()
    {

        $code = rand(1000, 9999);

        $this->otp = $code;
        $this->save();
        $message = "Code d'authentification: ". $code;

        $contact = Str::remove('+', $this->contact);
        $contact = Str::startsWith($contact, '225') ? $contact : '225'.$contact;
        $contact = Str::remove(' ', $contact);
        try {

            SendSms::run([$contact], $message);
        }catch (\Exception $e){

        }
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

}
