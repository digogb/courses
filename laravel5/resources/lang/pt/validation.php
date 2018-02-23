<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => 'O campo :attribute deve ser preenchido.',
    "numeric"  => "O campo :attribute deve ser numérico.",


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'credits.*.name' => [
            'required' => 'Cada campo nome de crédito deve ser preenchido.',
        ],
        'credits.*.value' => [
            'required' => 'Cada campo valor de crédito deve ser preenchido.',
            'numeric' => 'Cada campo valor de crédito deve ser numérico.'
        ],
        'debits.*.name' => [
            'required' => 'Cada campo nome de débito deve ser preenchido.',
        ],
        'debits.*.value' => [
            'required' => 'Cada campo valor de débito deve ser preenchido.',
            'numeric' => 'Cada campo valor de débito deve ser numérico.'
        ],
        'debits.*.status' => [
            'required' => 'Cada campo status de débito deve ser preenchido.'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

        'name'   => 'nome',
        'month'  => 'mês',
        'year'   => 'ano',
        'value'  => 'valor'

    ],


];
