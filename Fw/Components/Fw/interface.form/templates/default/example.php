<?php

return [
    'additional_class' => 'window--full-form', //доп класс на контейнер формы
    'attr' => [  // доп атрибуты
        'data-form-id' => 'form-123'
    ],
    'method' => 'post',
    'action' => '', //url отправки
    'elements' => [  //список элементов формы
        [
            'type' => 'text',
            'name' => 'login',
            'additional_class' => 'js-login',
            'attr' => [
                'data-id' => '17'
            ],
            'title' => 'Логин',
            'default' => 'Введите имя'
        ],
        [
            'type' => 'password',
            'name' => 'password',
            'title' => 'пароль'
        ],
        [
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
                    'selected' => true
                ],
                [
                    'title' => 'Тутбай',
                    'value' => 'tut',
                ]
            ]
        ],
        [
            'type' => 'checkbox',
            'name' => 'login',
            'additional_class' => 'js-login',
            'attr' => [
                'data-id' => '17'
            ],
            'title' => 'Логин'
        ],
    ]
];
