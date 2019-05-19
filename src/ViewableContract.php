<?php

namespace Nddcoder\LaravelSimpleViewable;

interface ViewableContract
{
    public function view();

    public function record($amount);

    public function shouldRecord();
}
