<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class AddDocuments extends AbstractAction
{
    public function getTitle()
    {
        return 'Documentos';
    }

    public function getIcon()
    {
        return 'voyager-certificate';
    }

    public function getPolicy()
    {
        return 'add';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-default pull-right',
            'style' => 'margin: 5px'
        ];
    }

    public function getDefaultRoute()
    {
        return route('hotels.documents', ['hotel' => $this->data->id]);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'hotels';
    }
}
