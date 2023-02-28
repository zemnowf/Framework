<?php
$form = $this->component;
$formParams = $form->params;
$formParamsElements = $formParams['elements'];

$inputMap = [];
$selectMap = [];
$textAreaMap = [];

foreach ($formParamsElements as $element) {
    if ($element['tag'] == 'input') {
        $name = $element['name'];
        $inputMap[$name] = $element;
    }
}

foreach ($formParamsElements as $element) {
    if ($element['tag'] == 'select') {
        $name = $element['name'];
        $selectMap[$name] = $element;
    }
}

foreach ($formParamsElements as $element) {
    if ($element['tag'] == 'textarea') {
        $name = $element['name'];
        $textAreaMap[$name] = $element;
    }
}

$form->setInputMap($inputMap);
$form->setSelectMap($selectMap);
$form->setTextAreaMap($textAreaMap);