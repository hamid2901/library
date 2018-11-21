<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sex
 * @property PersonalData[] $personalDatas
 */
class Gender extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'gender';

    /**
     * @var array
     */
    protected $fillable = ['sex'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personalDatas()
    {
        return $this->hasMany('App\Models\PersonalData');
    }
}
