<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Priority
 * @package App
 *
 * @property string title
 * @property integer id
 * @method static find(int $id)
 */
class Priority extends Model
{
    const TABLE_NAME = 'priorities';
    const FIELD_TITLE = 'title';
    const FIELD_ID = 'id';

    protected $table = self::TABLE_NAME;

    public $timestamps = false;
}
