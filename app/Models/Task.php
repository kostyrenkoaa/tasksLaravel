<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App
 *
 * @property int id
 * @property string title
 * @property string status
 * @property string priority_id
 * @property integer user_id
 * @property array tags
 *
 * @property Priority priority
 *
 * @method static \Illuminate\Database\Eloquent\Collection|static[] all()
 */
class Task extends Model
{
    const TABLE_NAME = 'tasks';

    const FIELD_ID = 'id';
    const FIELD_TITLE = 'title';
    const FIELD_STATUS = 'status';
    const FIELD_PRIORITY_ID = 'priority_id';
    const FIELD_TAGS = 'tags';
    const FIELD_USER_ID = 'user_id';

    const STATUS_IN_WORK = 'inWork';
    const STATUS_CLOSED = 'closed';

    const STATUSES = [
        self::STATUS_IN_WORK,
        self::STATUS_CLOSED,
    ];

    protected $table = self::TABLE_NAME;

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }
}
