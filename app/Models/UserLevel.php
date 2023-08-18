<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserLevel
 *
 * @property int $id
 * @property int $user_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLevel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLevel whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLevel whereValue($value)
 * @mixin \Eloquent
 */
class UserLevel extends Model
{
    protected $table = 'users__levels';
}
