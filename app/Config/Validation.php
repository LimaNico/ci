<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $signIn =[
        'email' => 'required',
        'password' => 'required',
        'agb' => 'required'
    ];

    public $signIn_errors = [
        'email' => [
            'required' => 'Bitte tragen Sie eine E-Mail-Adresse ein',
            'valid_email' => 'Bitte tragen Sie eine korrekte E-Mail-Adresse ein'
        ],
        'password' => [
            'required' => 'Bitte geben Sie ein Passwort ein.'
        ],
        'agb' => [
            'required' => 'Sie müssen die AGBs akzeptieren, um fortzufahren.'
        ]
    ];
}
