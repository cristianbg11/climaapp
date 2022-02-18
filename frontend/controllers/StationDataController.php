<?php

namespace frontend\controllers;

use Yii;
use frontend\models\StationData;
use frontend\models\StationDataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StationDataController implements the CRUD actions for StationData model.
 */
class StationDataController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all StationData models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new StationDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHistorico() {
        $model = new StationData();
        $variables = [];
        $request = Yii::$app->request;
        $fechaini = '';
        $fechafin = '';
        $showData = false;
        $searchModel = new StationDataSearch();
        if ($request->isPost) {
            if ($request->post('variables') != null) {
                $variables = $request->post('variables');
            }
            
            $fechaini = $request->post('fecha-ini');
            $fechafin = $request->post('fecha-fin');
            $searchModel->station_id = $request->post('StationData')['station_id'];
             $model->station_id=$searchModel->station_id;
            if (!empty($fechaini) && !empty($fechafin)) {
                $showData = true;
                 $searchModel->fecha_ini = $fechaini;
                 $searchModel->fecha_fin = $fechafin;
            }
            
          /*   if ($ini == '' || $fin == '') {
            $ini = $fin = null;
        } else {
            $searchModel->ini = $ini;
            $searchModel->fin = $fin;
        }*/
        }

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        

        return $this->render('historico', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model, 'variables' => $variables,
                    'fechaini' => $fechaini, 'fechafin' => $fechafin,
                    'showData' => $showData
        ]);
    }

    public function actionVerGraf($ini, $fin, $id_esta, $var) {
        //  $this->currMod='visualizacion';
        return $this->render('graficos_hist', [
                    'fecha_ini' => $ini, 'fecha_fin' => $fin, 'var' => $var, 'id_sta' => $id_esta
        ]);
    }

    /**
     * Displays a single StationData model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StationData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new StationData();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StationData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StationData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
     * 
     * Export StationData information into PDF format.
     * @param string $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    /**
     * Finds the StationData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return StationData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = StationData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

}
