<?php

namespace Nddcoder\LaravelSimpleViewable;

class LaravelSimpleViewable
{
    public function record(ViewableContract $model, $amount = 1)
    {
        return $model->record($amount);
    }
}
