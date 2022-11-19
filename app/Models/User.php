<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    /**
     * Get contacts for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Contact>
     */
    public function contacts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Get phones for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Contact>
     */
    public function phones(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Contact::class)->where('contacts.type', 'phone');
    }

    /**
     * Get emails for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Contact>
     */
    public function emails()
    {
        return $this->hasMany(Contact::class)->where('contacts.type', 'email');
    }

    /**
     * Sync phones for the user.
     *
     * @param array<int, string> $phones
     */
    public function syncPhones(array $phones)
    {
        $phonesCount = count($phones);
        $userPhonesCount = $this->phones()->count();

        for ($i = 0; $i < max($phonesCount, $userPhonesCount); $i++) {
            if ($i < $phonesCount) {
                if ($i < $userPhonesCount) {
                    $this->phones[$i]->update([
                        'value' => $phones[$i],
                    ]);
                } else {
                    $this->contacts()->create([
                        'value' => $phones[$i],
                        'type' => 'phone',
                    ]);
                }
            } else {
                $this->phones[$i]->delete();
            }
        }
    }

    /**
     * Sync emails for the user.
     *
     * @param array<int, string> $emails
     */
    public function syncEmails(array $emails)
    {
        $phonesCount = count($emails);
        $userPhonesCount = $this->phones()->count();

        for ($i = 0; $i < max($phonesCount, $userPhonesCount); $i++) {
            if ($i < $phonesCount) {
                if ($i < $userPhonesCount) {
                    $this->emails[$i]->update([
                        'value' => $emails[$i],
                    ]);
                } else {
                    $this->contacts()->create([
                        'value' => $emails[$i],
                        'type' => 'email',
                    ]);
                }
            } else {
                $this->emails[$i]->delete();
            }
        }
    }
}
