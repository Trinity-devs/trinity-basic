<?php

namespace src\forms;

use trinity\validator\AbstractFormRequest;

class ExampleForm extends AbstractFormRequest
{

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            [['tonnage', 'month', 'type', 'price'], 'required'],
            ['price', 'number']
        ];
    }
}