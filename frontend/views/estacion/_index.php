<?php 
use \yii\helpers\Html;
use yii\widgets\DetailView;
?>

<div class="row">
    <div class="col-sm-9">
        <h2><?= Html::a(Html::encode($model->id_estacion), ['view', 'id' => $model->id_estacion]) ?></h2>
    </div>
    <div class="col-sm-3" style="margin-top: 15px">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_estacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_estacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </div>
    <?php 
    $gridColumn = [
        [
            'attribute' => 'estacion.id_lectura',
            'label' => Yii::t('app', 'Estacion'),
        ],
        'Nombre',
        'Ubicacion',
        'Zona',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
</div>


