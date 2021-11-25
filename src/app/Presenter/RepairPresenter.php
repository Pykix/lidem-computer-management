<?php

namespace App\Presenter;

trait RepairPresenter
{
    public function getBreakdownsLabelAttribute()
    {
        $list = "";
        foreach ($this->breakdowns as $breakdown) {
            $list .= $breakdown->label;
        }
        return $list;
    }
}
