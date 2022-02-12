<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
$modMenu=[
    [
        'url'=>['site/index'],
        'module'=>'visualizacion',
        'label'=>'Visualicaci&oacute;n Data'        
    ],
    [
        'url'=>['site/predicciones'],
        'label'=>'Predicciones',
        'module'=>'predicciones'      
    ],
    [
        'url'=>['site/config'],
        'label'=>'Configuracion',
        'module'=>'config'        
    ],
];
?>
<style>

.mod-menu{
    color:white;
    font-size: 14px;
    float:left;
    padding:15px 15px;
}
.mod-menu:hover,.mod-menu-active{
    font-weight: bold;
    background-color: #68bbc4;
    color:white;
}
</style>
<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . 'climaapp' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        
        <?php foreach($modMenu as $item):?>

            <?=Html::a($item['label'],$item['url'],['class'=>isset($this->context->currMod)&&$this->context->currMod==$item['module']?'mod-menu mod-menu-active':'mod-menu']);?>

        <?php endforeach;?>         
         
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                        <span class="hidden-xs">Cristian</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            
                            <p>
                                Cristian
                                
                            </p>
                        </li>
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
