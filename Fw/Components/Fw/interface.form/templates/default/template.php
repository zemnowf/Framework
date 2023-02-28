<?php
$form = $this->component;
$formParams = $form->params;
$inputMap = $form->getInputMap();
$selectMap = $form->getSelectMap();
$textAreaMap = $form->getTextAreaMap();
?>


<form action="<?= $formParams['action'] ?>" method="<?= $formParams['method'] ?>">
    <?php
    foreach ($inputMap as $key => $element) {
        echo "<div class='mb-3'>"
            . "<label for='" . $element['name'] . "'>" . $element['title'] . "</label>"
            . "<input class='". $element['additional_class'] . "' id='" . $element['name'] . "' type='" . $element['type'] . "' placeholder='"
            . $element['title'] . "'" . $element['multiple'] . ">" .
            "</div>";
    }

    foreach ($selectMap as $key => $element) {
        echo "<div>"
            . "<label for='" . $element['name'] . "'>" . $element['title'] . "</label>"
            . "<select class='form-select' size='3'" . "id='" . $element['name'] . "' type='" . $element['type']
            . "' " . $element['multiple'] . " >";
        foreach ($element['list'] as $option) {
            echo "<option value='" . $option['value'] . "' " . $option['selected'] .">" . $option['title'] . "</option>";
        }

        echo "</select>" . "</div>";
    }

    foreach ($textAreaMap as $key => $element) {
        echo "<div class='form-group m-lg-3'>"
            . "<textarea class='form-control' id='" . $element['name'] . "' rows='" . $element['rows'] . "' cols='"
            . $element['cols'] . "'>" . "</textarea>" .
            "</div>";
    }
    ?>

    <input class='btn btn-primary' type="submit" value="Отправить">

</form>