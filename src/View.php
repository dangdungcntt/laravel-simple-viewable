<?php

namespace Nddcoder\LaravelSimpleViewable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class View extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = false;

    public function getTable()
    {
        return config('simple-viewable.models.view.table_name', parent::getTable());
    }

    public function getConnectionName()
    {
        return config('simple-viewable.models.view.connection', parent::getConnectionName());
    }

    public function viewable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeOf($builder, $class)
    {
        return $builder->where('viewable_type', $class);
    }
}
