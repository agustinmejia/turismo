<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class AddActivities extends AbstractAction
{
    public function getTitle()
    {
        return 'Actividades';
    }

    public function getIcon()
    {
        return 'voyager-logbook';
    }

    public function getPolicy()
    {
        return 'add';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-dark pull-right',
            'style' => 'margin: 5px'
        ];
    }

    public function getDefaultRoute()
    {
        return route('hotels.activities', ['hotel' => $this->data->id]);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'hotels';
    }
}