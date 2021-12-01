<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Prediccionhecha;
use frontend\models\Notificacion;
use frontend\models\Predicciong;
use frontend\models\PrediccionhechaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrediccionhechaController implements the CRUD actions for Prediccionhecha model.
 */
class PrediccionhechaController extends Controller
{
    public $currMod='predicciones';
    public function behaviors()
    {
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
     * Lists all Prediccionhecha models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrediccionhechaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prediccionhecha model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Prediccionhecha model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Prediccionhecha();

        if ($model->loadAll(Yii::$app->request->post())) {

            $ini=$model->fecha_estimada_inicial;
            $fin=$model->fecha_estimada_final;

            

           // print_r($_POST);die();
            chdir('C:\xampp\htdocs\climaapp\frontend\views\site');
            

            $command="python WDA_Forecast_FBProphet_Params.py Out_Hum 800 $ini $fin";
           // echo $command;
            $output = shell_exec($command);
            $arr = explode('**progdata**', $output);
            $output=$arr[1];
            $predData=json_decode($output);
            $humData=[];
            foreach($predData as $fecha=>$valor){
                $fecha = $fecha / 1000;
                $fecha = date('Y-m-d', $fecha);
                $humData[$fecha]=$valor;
            }
            

            $command="python WDA_Forecast_FBProphet_Params.py ET 800 $ini $fin";
           // echo $command;
            $output = shell_exec($command);
            $arr = explode('**progdata**', $output);
            $output=$arr[1];
            $predData=json_decode($output);
            $modelprec=new Predicciong();
            $modelprec->id_estacion=33;
            $modelprec->fecha_ini=$ini;
            $modelprec->fecha_fin=$fin;
            $modelprec->fecha=date('Y-m-d');
            if(!$modelprec->save()){
                var_dump($modelprec->getErrors());die();
            }
            foreach($predData as $fecha=>$valor){
                $model = new Prediccionhecha();
                
                $model->etp=$valor;
                

                $model->fecha_estimada_inicial=$ini;
                $model->fecha_estimada_final=$fin;
                $fecha = $fecha / 1000;
                $fecha = date('Y-m-d', $fecha);
                $model->rain=$humData[$fecha];
                $model->fecha=$fecha;//'';//date('Y-m-d');
                $model->id_estacion=33;
                $model->idprec=$modelprec->id;
                if(!$model->save()){
                    var_dump($model->getErrors());die();
                }/*else{
                    $modeln=new Notificacion();
                    $modeln->id_cultivo=1;
                    $modeln->id_finca=1;
                    $modeln->id_prediccion=$model->id;
                    $modeln->id_estacion=33;
                    $modeln->densidad=$valor*(0.8*200);//densidad media
                    if(!$modeln->save()){
                        var_dump($modeln->getErrors());die();
                    }
                }*/
              //  $model->save();
            }
           // print_r($arr);
           // die();
           // $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Prediccionhecha model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Prediccionhecha model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
     * 
     * Export Prediccionhecha information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id)
    {
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
     * Finds the Prediccionhecha model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prediccionhecha the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prediccionhecha::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
