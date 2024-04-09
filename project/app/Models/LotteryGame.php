<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @property int $id Идентификатор игры
 * @property string $name Название игры
 * @property int $gamer_count Количество игроков
 * @property int $reward_points Количество баллов за победу
 * @property bool $is_finished Статус игры
 */
class LotteryGame extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'gamer_count',
        'reward_points',
        'is_finished'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [];

    public function wonMatches(): HasMany
    {
        return $this->hasMany(LotteryGameMatch::class);
    }
}
