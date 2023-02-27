<?php

require './Fw/init.php';

use Fw\Core\Application;
use Fw\Core\InstanceContainer;


$application = InstanceContainer::get(Application::class);
$application->getPage()->addCss('public/assets/css/main.css');
$application->getPage()->setProperty('title', 'Framework');
$application->header();
?>

<pre>
-------- 23.02.2023 --------
1) создан Page класс для работы с содержимым страницы
2) добавлена инициализация Page в классе приложения
3) заложена страница истории изменения проекта
4) добавлены стили

-------- 22.02.2023 --------
1) создан класс контейнер для инстансов других классов
2) добавлены базовые элементы сайта (header&footer)
3) внедрён буфер в класс приложения

-------- 20.02.2023 --------
1) создана функции авто регистрации классов
2) созданы руты и класс для работы с ними
3) создан основной класс приложения
4) созданы конфиги и класс для работы с ними

</pre>

<?php
$application->footer();