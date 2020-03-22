<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\House
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int $storeys
 * @property int $garages
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House whereGarages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House whereStoreys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\House whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class House extends Model
{
    //
}
