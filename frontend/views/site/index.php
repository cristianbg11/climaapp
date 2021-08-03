<?php

/* @var $this yii\web\View */
use frontend\models\Data;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        
    </div>

    <div class="body-content">

    <?= \pigolab\locationpicker\LocationPickerWidget::widget(); ?>
    

    <?php
    $output = shell_exec('python prediccion.py');
    echo "<pre>$output</pre>";
    echo "hola como esta";
    ?>
    </div>
</div>
