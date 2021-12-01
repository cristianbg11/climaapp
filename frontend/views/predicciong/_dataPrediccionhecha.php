<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->prediccionhechas,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'temp_out',
        'hum_out',
        'solar_rad',
        'wind_speed',
        'etp',
        'fecha',
        'fecha_estimada_inicial',
        'fecha_estimada_final',
        [
                'attribute' => 'estacion.Nombre',
                'label' => Yii::t('app', 'Id Estacion')
            ],
        [
                'attribute' => 'user.username',
                'label' => Yii::t('app', 'Id User')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'prediccionhecha'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
