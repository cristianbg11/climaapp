<?php

use yii\helpers\Url;

$menuColors = [
    'visualizacion' => '#d65047',
    'predicciones' => '#2c8f8c',
    'config' => '#43a365'
        ]
?>

<!-- search form -->
<?php /*
  <form action="#" method="get" class="sidebar-form">
  <div class="input-group">
  <input type="text" name="q" class="form-control" placeholder="Search..."/>
  <span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
  </button>
  </span>
  </div>
  </form> */
?>
<!-- /.search form -->

<?php
$items = [];
if (isset($this->context->currMod)) {
    switch ($this->context->currMod) {
        case 'visualizacion':
            $items = [
                /*
                  ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],'icon'=>'fa-cog'],
                  //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],'icon'=>'fa-cog'],
                  ['label' => 'Finca', 'url' => ['/finca'],'icon'=>'fa-cog'],
                  ['label' => 'finca-cultivo ', 'url' => ['/cultivo-finca'],'icon'=>'fa-cog'],
                  ['label' => 'Productores', 'url' => ['/productor'],'icon'=>'fa-cog'],
                  ['label' => 'Estaciones', 'url' => ['/estacion'],'icon'=>'fa-cog'],
                  ['label' => 'Lecturas', 'url' => ['/lectura'],'icon'=>'fa-cog'],
                  ['label' => 'Cultivo', 'url' => ['/cultivo'],'icon'=>'fa-cog'],
                 */
                ['label' => 'Lectura actual', 'url' => ['/test/api'],'icon'=>'fa-cog'],
                //   web/test/api
                ['label' => 'Demanda agua', 'url' => ['/predicciong/demanda'],'icon'=>'fa-tint'],
                ['label' => 'Compotamiento ETP', 'url' => ['/predicciong/etp'],'icon'=>'fa-cloud'],
                //['label' => 'Detalles', 'url' => ['/detprediccion'],'icon'=>'fa-cog'],
                //['label' => 'mapa lectura', 'url' => ['/lectura/mapalectura'],'icon'=>'fa-cog'],
                //['label' => 'crear prediccion ', 'url' => ['/prediccionhecha/create'],'icon'=>'fa-cog'],
                //['label' => 'Predicciones ', 'url' => ['/prediccionhecha'],'icon'=>'fa-cog'],
                //['label' => 'Prediccion G ', 'url' => ['/predicciong'],'icon'=>'fa-cog'],
                ['label' => 'Planificacion Riego', 'url' => ['/planificacion-gen'],'icon'=>'fa-calendar'],
                //['label' => 'Planificacion Riego ', 'url' => ['/planificacion/riego'],'icon'=>'fa-cog'],
                ['label' => 'Temperatura alerta', 'url' => ['/predicciong/alerta'],'icon'=>'fa-exclamation-circle'],
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    /*
                      [
                      'label' => 'Some tools',
                      'icon' => 'share',
                      'url' => '#',
                      'items' => [
                      ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                      ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                      [
                      'label' => 'Level One',
                      'icon' => 'circle-o',
                      'url' => '#',
                      'items' => [
                      ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                      [
                      'label' => 'Level Two',
                      'icon' => 'circle-o',
                      'url' => '#',
                      'items' => [
                      ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                      ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                      ],
                      ],
                      ],
                      ],
                      ],
                      ], */
            ];
            break;

        case 'predicciones':
            $items = [
                //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],'icon'=>'fa-cog'],
                //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],'icon'=>'fa-cog'],
                /*
                  ['label' => 'Finca', 'url' => ['/finca'],'icon'=>'fa-cog'],
                  ['label' => 'finca-cultivo ', 'url' => ['/cultivo-finca'],'icon'=>'fa-cog'],
                  ['label' => 'Productores', 'url' => ['/productor'],'icon'=>'fa-cog'],
                  ['label' => 'Estaciones', 'url' => ['/estacion'],'icon'=>'fa-cog'],
                  ['label' => 'Lecturas', 'url' => ['/lectura'],'icon'=>'fa-cog'],
                  ['label' => 'Cultivo', 'url' => ['/cultivo'],'icon'=>'fa-cog'],
                  ['label' => 'Densidad agua', 'url' => ['/prediccion'],'icon'=>'fa-cog'],
                  ['label' => 'Detalles', 'url' => ['/detprediccion'],'icon'=>'fa-cog'],
                  ['label' => 'mapa lectura', 'url' => ['/lectura/mapalectura'],'icon'=>'fa-cog'],
                 */
                ['label' => 'Generar prediccion ', 'url' => ['/prediccionhecha/create'],'icon'=>'fa-line-chart'],
                ['label' => 'Generar prediccion Temp ', 'url' => ['/prediccionhecha/create-temp'],'icon'=>'fa-clock-o'],
                //['label' => 'Predicciones ', 'url' => ['/prediccionhecha'],'icon'=>'fa-cog'],
                ['label' => 'Planificar Prediccion ', 'url' => ['/predicciong'],'icon'=>'fa-calendar'],
                    //['label' => 'Planificacion ', 'url' => ['/planificacion'],'icon'=>'fa-cog'],
                    //['label' => 'Riego ', 'url' => ['/planificacion/riego'],'icon'=>'fa-cog'],
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
            ];
            break;

        case 'config':
            $items = [
                //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],'icon'=>'fa-cog'],
                //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],'icon'=>'fa-cog'],
                ['label' => 'Finca', 'url' => ['/finca'],'icon'=>'fa-square'],
                ['label' => 'finca-cultivo ', 'url' => ['/cultivo-finca'],'icon'=>'fa-cog'],
                ['label' => 'Productores', 'url' => ['/productor'],'icon'=>'fa-users'],
                ['label' => 'Estaciones', 'url' => ['/estacion'],'icon'=>'fa-flask'],
                //['label' => 'Lecturas', 'url' => ['/lectura'],'icon'=>'fa-cog'],
                ['label' => 'Cultivo', 'url' => ['/cultivo'],'icon'=>'fa-leaf'],
                    /*
                      ['label' => 'Densidad agua', 'url' => ['/prediccion'],'icon'=>'fa-cog'],
                      ['label' => 'Detalles', 'url' => ['/detprediccion'],'icon'=>'fa-cog'],
                      ['label' => 'mapa lectura', 'url' => ['/lectura/mapalectura'],'icon'=>'fa-cog'],
                      ['label' => 'crear prediccion ', 'url' => ['/prediccionhecha/create'],'icon'=>'fa-cog'],
                      ['label' => 'Predicciones ', 'url' => ['/prediccionhecha'],'icon'=>'fa-cog'],
                      ['label' => 'Prediccion G ', 'url' => ['/predicciong'],'icon'=>'fa-cog'],
                      ['label' => 'Planificacion ', 'url' => ['/planificacion'],'icon'=>'fa-cog'],
                      ['label' => 'Riego ', 'url' => ['/planificacion/riego'],'icon'=>'fa-cog'],
                     */
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
            ];
            break;
    }
} else {
    $items = [
        // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],'icon'=>'fa-cog'],
        //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],'icon'=>'fa-cog'],
        /*
          ['label' => 'Finca', 'url' => ['/finca'],'icon'=>'fa-cog'],
          ['label' => 'finca-cultivo ', 'url' => ['/cultivo-finca'],'icon'=>'fa-cog'],
          ['label' => 'Productores', 'url' => ['/productor'],'icon'=>'fa-cog'],
          ['label' => 'Estaciones', 'url' => ['/estacion'],'icon'=>'fa-cog'],
          ['label' => 'Lecturas', 'url' => ['/lectura'],'icon'=>'fa-cog'],
          ['label' => 'Cultivo', 'url' => ['/cultivo'],'icon'=>'fa-cog'],
         */
        ['label' => 'Densidad agua', 'url' => ['/prediccion'],'icon'=>'fa-cog'],
        ['label' => 'Detalles', 'url' => ['/detprediccion'],'icon'=>'fa-cog'],
        ['label' => 'mapa lectura', 'url' => ['/lectura/mapalectura'],'icon'=>'fa-cog'],
        ['label' => 'crear prediccion ', 'url' => ['/prediccionhecha/create'],'icon'=>'fa-cog'],
        ['label' => 'Predicciones ', 'url' => ['/prediccionhecha'],'icon'=>'fa-cog'],
        ['label' => 'Prediccion G ', 'url' => ['/predicciong'],'icon'=>'fa-cog'],
        ['label' => 'Planificacion ', 'url' => ['/planificacion'],'icon'=>'fa-cog'],
        ['label' => 'Calendario Riego ', 'url' => ['/planificacion/riego'],'icon'=>'fa-cog'],
            // ['label' => 'Login', 'url' => ['user/security/login'], 'visible' =>true || Yii::$app->user->isGuest],
    ];
}

foreach ($items as $k => $item) {
    $items[$k]['class'] = isset($item['url']) && strstr($_SERVER['REQUEST_URI'], $item['url'][0]) ? 'active' : '';
    if (isset($item['submenu'])) {
        foreach ($item['submenu'] as $ks => $subitem) {
            if (strstr($_SERVER['REQUEST_URI'],$subitem['url'][0])) {
                $items[$k]['class'] = 'active open';
                $items[$k]['submenu'][$ks]['class'] = 'active';
            } else {
                $items[$k]['submenu'][$ks]['class'] = '';
            }
        }
    }
}
?>



<ul class="nav nav-list akilMainMenu">
    
<?php foreach ($items as $item): ?>

    <?php if (isset($item['show']) && $item['show'] == false) continue; ?>

        <li class="<?php echo $item['class']; ?>">
            <a href="<?=isset($item['url'])?Url::to($item['url']):'#'; ?>"<?php if (isset($item['submenu'])) echo ' class="dropdown-toggle"'; ?>>
                
                    <i class="menu-icon fa <?=isset($item['icon'])?$item['icon']:'fa-cog'?>"></i>
                 
                <span class="menu-text"> <?php echo $item['label']; ?> </span>
        <?php if (isset($item['submenu'])): ?>
                    <b class="arrow fa fa-angle-down"></b>
        <?php endif; ?>
            </a>

            <b class="arrow"></b>
    <?php if (isset($item['submenu'])): ?>
             <?php if (isset($item['submenuOpen']) && $item['submenuOpen']): ?>
                    <ul class="submenu nav-show" style="display:block">
                <?php else:?>
                    <ul class="submenu">
                <?php endif?>
                    <?php foreach ($item['submenu'] as $subitem): ?>
                        <?php if (isset($subitem['show']) && $subitem['show'] == false) continue; ?>
                        <li class="<?php echo $subitem['class']; ?>">
                            <a href="<?php echo Url::to($subitem['url']); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?php if(isset($subitem['icon'])):?>
                                    <i class="fa <?php echo $subitem['icon']; ?>"></i>
                                <?php endif;?> 
                                    <?php echo $subitem['label']; ?>
                            </a>

                            <b class="arrow"></b>
                        </li>
                    <?php endforeach; ?>
                </ul>
    <?php endif; ?>
        </li>
                    <?php endforeach; ?>
</ul>
