<?php

namespace Nddcoder\LaravelSimpleViewable\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Nddcoder\LaravelSimpleViewable\CrawlerDetectAdapter;

trait Viewable
{
    abstract protected static function getTableName();

    public static function bootViewable()
    {
        static::addGlobalScope(function (Builder $builder) {
            $table = static::getTableName();
            $viewsTable = config('simple-viewable.models.view.table_name');
            return $builder->leftJoin(
                $viewsTable,
                function (JoinClause $joinClause) use ($viewsTable, $table) {
                    $joinClause
                        ->on("$table.id", '=', "$viewsTable.viewable_id")
                        ->where("$viewsTable.viewable_type", '=', static::class);
                });
        });

        static::created(function ($model) {
            $model->view()->create(['view_count' => 0]);
        });

        static::deleted(function ($model) {
            $model->view()->delete();
        });
    }

    public function view()
    {
        return $this->morphOne(config('simple-viewable.models.view.model'), 'viewable');
    }

    public function record($amount = 1)
    {
        if (! $this->shouldRecord()) {
            return false;
        }

        return $this->view()->increment('view_count', $amount);
    }

    public function shouldRecord()
    {
        return ! app(CrawlerDetectAdapter::class)->isCrawler();
    }
}
