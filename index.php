<?php

require './Fw/init.php';

use Fw\Core\Application;
use Fw\Core\InstanceContainer;


$application = InstanceContainer::get(Application::class);
$application->getPage()->addCss('public/assets/css/bootstrap.min.css');
$application->getPage()->addJs('public/assets/js/bootstrap.bundle.min.js');
$application->getPage()->setProperty('title', 'Framework');
$application->header();
$application->includeComponent(
    'Fw:element.list',
    'default',
    [
        "sort" => "id",
        "limit" => 10,
        "show_title" => "N"
    ]
);

$application->includeComponent(
    'Fw:interface.form',
    'default',
    [
        'additional-class' => 'window--full-form',
        'attr' => [
            'data-form-id' => 'form-123'
        ],
        'method' => 'post',
        'action' => '',
        'elements' => [  //список элементов формы
            [
                'tag' => 'input',
                'type' => 'text',
                'name' => 'login',
                'additional_class' => 'form-control',
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Логин',
                'default' => 'Введите имя'
            ],
            [
                'tag' => 'input',
                'type' => 'text',
                'name' => 'number',
                'additional_class' => 'form-control',
                'title' => 'Номер (multiple)',
                'multiple' => 'multiple'
            ],
            [
                'tag' => 'input',
                'type' => 'password',
                'name' => 'password',
                'additional_class' => 'form-control',
                'title' => 'Пароль'
            ],
            [
                'tag' => 'input',
                'type' => 'number',
                'name' => 'digit',
                'additional_class' => 'form-control',
                'title' => 'Число'
            ],
            [
                'tag' => 'select',
                'type' => 'select',
                'name' => 'server',
                'additional_class' => 'js-login',
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Выберите сервер',
                'list' => [
                    [
                        'title' => 'Онлайнер',
                        'value' => 'onliner',
                        'additional_class' => 'mini--option',
                        'attr' => [
                            'data-id' => '188'
                        ],
                    ],
                    [
                        'title' => 'Тутбай',
                        'value' => 'tut',
                        'selected' => 'selected'
                    ]
                ]
            ],
            [
                'tag' => 'select',
                'type' => 'select',
                'name' => 'multiple-select',
                'title' => 'Выберите что-то и не одно',
                'multiple' => 'multiple',
                'list' => [
                    [
                        'title' => 'Spotify',
                        'value' => 'spotify',
                        'additional_class' => 'mini--option',
                        'attr' => [
                            'data-id' => '188'
                        ],
                    ],
                    [
                        'title' => 'Yandex',
                        'value' => 'yandex',
                        'selected' => 'selected'
                    ],
                    [
                        'title' => 'Boom',
                        'value' => 'boom',
                        'selected' => 'selected'
                    ],
                ]
            ],
            [
                'tag' => 'input',
                'type' => 'radio',
                'name' => 'some-radio',
                'title' => 'Radio'
            ],
            [
                'tag' => 'input',
                'type' => 'checkbox',
                'name' => 'login-checkbox',
                'additional_class' => 'form-check-input',
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Checkbox'
            ],
            [
                'tag' => 'textarea',
                'title' => 'текст',
                'name' => 'big-text',
                'rows' => '10',
                'cols' => '45'
            ]
        ]
    ]
);
$application->footer();