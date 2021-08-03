<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use frontend\models\Prediccion;
/* @var $this yii\web\View */
/* @var $model frontend\models\Cultivo */

$this->title = $model->Cultivo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultivos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Cultivo').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Cultivo',
        'Coeficiente',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
<?php
chdir ('C:\xampp\htdocs\climaapp\frontend\views\site');
$output = shell_exec('python clima_intercepto.py');
$intersecto=(float)trim($output);
$etp=$intersecto;
$deficit=$etp*$model->Coeficiente;
echo '<b>Calculo ETP ESTIMADO:</b>'.$etp;
echo '<br><b>CALCULDO DE DEFICIT HIDRICO:</b>'.$deficit;
$modelpred=new Prediccion();
$modelpred->calculo_estimado=$deficit;
//$modelpred->id_variable=1;
$modelpred->id_cultivo=$model->id;
$modelpred->fecha=date('Y-m-d');
if(!$modelpred->save()){
var_dump($modelpred->save());die();
}
?>


</div>
