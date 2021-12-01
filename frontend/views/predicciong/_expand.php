<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Predicciong')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Prediccionhecha')),
        'content' => $this->render('_dataPrediccionhecha', [
            'model' => $model,
            'row' => $model->prediccionhechas,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
