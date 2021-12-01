<?php
$menuColors = [
    'visualizacion' => '#d65047',
    'predicciones' => '#2c8f8c',
    'config' => '#43a365'
]
?>
<aside class="main-sidebar" style="background-color:<?= isset($this->context->currMod) ? $menuColors[$this->context->currMod] : '' ?>">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://aux2.iconspalace.com/uploads/user-icon-256-2084102879.png" />
            </div>
            <div class="pull-left info">
                <p>Cristian</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

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
                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        ['label' => 'Finca', 'url' => ['/finca']],
                        ['label' => 'finca-cultivo ', 'url' => ['/cultivo-finca']],
                        ['label' => 'Productores', 'url' => ['/productor']],
                        ['label' => 'Estaciones', 'url' => ['/estacion']],
                        ['label' => 'Lecturas', 'url' => ['/lectura']],
                        ['label' => 'Cultivo', 'url' => ['/cultivo']],
                        */
                        ['label' => 'Demanda agua', 'url' => ['/predicciong/demanda']],
                        ['label' => 'Compotamiento ETP', 'url' => ['/predicciong/etp']],
                        ['label' => 'Detalles', 'url' => ['/detprediccion']],
                        ['label' => 'mapa lectura', 'url' => ['/lectura/mapalectura']],
                        //['label' => 'crear prediccion ', 'url' => ['/prediccionhecha/create']],
                        //['label' => 'Predicciones ', 'url' => ['/prediccionhecha']],
                        //['label' => 'Prediccion G ', 'url' => ['/predicciong']],
                        ['label' => 'Planificacion ', 'url' => ['/planificacion']],
                        ['label' => 'Riego ', 'url' => ['/planificacion/riego']],
                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
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
                            ],*/
                    ];
                    break;

                case 'predicciones':
                    $items = [

                        //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        /*
                        ['label' => 'Finca', 'url' => ['/finca']],
                        ['label' => 'finca-cultivo ', 'url' => ['/cultivo-finca']],
                        ['label' => 'Productores', 'url' => ['/productor']],
                        ['label' => 'Estaciones', 'url' => ['/estacion']],
                        ['label' => 'Lecturas', 'url' => ['/lectura']],
                        ['label' => 'Cultivo', 'url' => ['/cultivo']],
                        ['label' => 'Densidad agua', 'url' => ['/prediccion']],
                        ['label' => 'Detalles', 'url' => ['/detprediccion']],
                        ['label' => 'mapa lectura', 'url' => ['/lectura/mapalectura']],
                        */
                        ['label' => 'Generar prediccion ', 'url' => ['/prediccionhecha/create']],
                        //['label' => 'Predicciones ', 'url' => ['/prediccionhecha']],
                        ['label' => 'Planificar Prediccion ', 'url' => ['/predicciong']],
                        //['label' => 'Planificacion ', 'url' => ['/planificacion']],
                        //['label' => 'Riego ', 'url' => ['/planificacion/riego']],
                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    ];
                    break;

                case 'config':
                    $items = [

                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        ['label' => 'Finca', 'url' => ['/finca']],
                        ['label' => 'finca-cultivo ', 'url' => ['/cultivo-finca']],
                        ['label' => 'Productores', 'url' => ['/productor']],
                        ['label' => 'Estaciones', 'url' => ['/estacion']],
                        //['label' => 'Lecturas', 'url' => ['/lectura']],
                        ['label' => 'Cultivo', 'url' => ['/cultivo']],
                        /*
                        ['label' => 'Densidad agua', 'url' => ['/prediccion']],
                        ['label' => 'Detalles', 'url' => ['/detprediccion']],
                        ['label' => 'mapa lectura', 'url' => ['/lectura/mapalectura']],
                        ['label' => 'crear prediccion ', 'url' => ['/prediccionhecha/create']],
                        ['label' => 'Predicciones ', 'url' => ['/prediccionhecha']],
                        ['label' => 'Prediccion G ', 'url' => ['/predicciong']],
                        ['label' => 'Planificacion ', 'url' => ['/planificacion']],
                        ['label' => 'Riego ', 'url' => ['/planificacion/riego']],
                        */
                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    ];
                    break;
            }
        } else {
            $items = [

               // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                /*
                ['label' => 'Finca', 'url' => ['/finca']],
                ['label' => 'finca-cultivo ', 'url' => ['/cultivo-finca']],
                ['label' => 'Productores', 'url' => ['/productor']],
                ['label' => 'Estaciones', 'url' => ['/estacion']],
                ['label' => 'Lecturas', 'url' => ['/lectura']],
                ['label' => 'Cultivo', 'url' => ['/cultivo']],
                */
                ['label' => 'Densidad agua', 'url' => ['/prediccion']],
                ['label' => 'Detalles', 'url' => ['/detprediccion']],
                ['label' => 'mapa lectura', 'url' => ['/lectura/mapalectura']],
                ['label' => 'crear prediccion ', 'url' => ['/prediccionhecha/create']],
                ['label' => 'Predicciones ', 'url' => ['/prediccionhecha']],
                ['label' => 'Prediccion G ', 'url' => ['/predicciong']],
                ['label' => 'Planificacion ', 'url' => ['/planificacion']],
                ['label' => 'Calendario Riego ', 'url' => ['/planificacion/riego']],
                ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

            ];
        }
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => $items,
            ]
        ) ?>

    </section>

</aside>