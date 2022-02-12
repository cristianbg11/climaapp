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
       // echo \Yii::getAlias('@app/views/site');die();
        $model = new Prediccionhecha();
        $command='';
        if ($model->loadAll(Yii::$app->request->post())) {

            $ini=$model->fecha_estimada_inicial;
            $fin=$model->fecha_estimada_final;
            $idesta=$model->id_estacion;
            $output1='';
            $output2='';
            $output3='';
            try{
           // print_r($_POST);die();
            chdir(\Yii::getAlias('@app/views/site'));
            $rainData=[];
            $tempData=[];


            $command="python Forecast_Weather_Data_13nov_Params_Pre.py 7 rain_day_mm 250 $ini $fin";
           // echo $command;
            $output1 = shell_exec($command);
            //print_r($output1);die();
            $arr = explode('**progdata**', $output1);
            $output=$arr[1];
            $predData=json_decode($output);
            
            foreach($predData as $fecha=>$valor){
                $fecha = $fecha / 1000;
                $fecha = date('Y-m-d', $fecha);
                $rainData[$fecha]=$valor;
            }
            

            /**$command="python Forecast_Weather_Data_13nov_Params.py 7 temp_out 250 $ini $fin";
           // echo $command;
            $output2 = shell_exec($command);
            $arr = explode('**progdata**', $output2);
            $output=$arr[1];
            $predData=json_decode($output);
             
            foreach($predData as $fecha=>$valor){
                $fecha = $fecha / 1000;
                $fecha = date('Y-m-d', $fecha);
                $tempData[$fecha]=$valor;
            }*/

            $command="python3 Forecast_Weather_Data_13nov_Params_Pre.py $idesta et 250 $ini $fin";
           // echo $command;
            $output3 = shell_exec($command);
            $arr = explode('**progdata**', $output3);
            $output=$arr[1];
            $predData=json_decode($output);
            $modelprec=new Predicciong();
            $modelprec->id_estacion=$idesta;
            $modelprec->fecha_ini=$ini;
            $modelprec->fecha_fin=$fin;
            $modelprec->fecha=date('Y-m-d');
            if(!$modelprec->save()){
                var_dump($modelprec->getErrors());die();
            }
            foreach($predData as $fecha=>$valor){
                $model = new Prediccionhecha();
                
                $fecha = $fecha / 1000;
                $fecha = date('Y-m-d', $fecha);

                $model->etp=$valor;
                $model->rain=$rainData[$fecha];
               // $model->temp_out=$tempData[$fecha];

                $model->fecha_estimada_inicial=$ini;
                $model->fecha_estimada_final=$fin;
                
                
                $model->fecha=$fecha;//'';//date('Y-m-d');
                $model->id_estacion=$idesta;
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
        }catch(\Exception $ex){
            echo "<h2>Error</h2>Command= $command<br /><pre>";
            echo "\n $output1 \n $output2 \n $output3\n";
            echo $ex->getMessage();
            echo $ex->getTraceAsString();
            echo '</pre>';
            die();
        }
           // print_r($arr);
           // die();
           // $model->save();
            return $this->redirect(['predicciong/view', 'id' => $modelprec->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Prediccionhecha model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateTemp()
    {
        
        $model = new Prediccionhecha();

        if ($model->loadAll(Yii::$app->request->post())) {

            $ini=$model->fecha_estimada_inicial;
            $fin=$model->fecha_estimada_final;
            $idesta=$model->id_estacion;
            $output1='';
            $output2='';
            $output3='';
            try{
           // print_r($_POST);die();
            chdir(\Yii::getAlias('@app/views/site'));
            $rainData=[];
            $tempData=[];

            $command="python Forecast_Weather_Data_13nov_Params_Pre.py $idesta temp_out 250 $ini $fin";
           // echo $command;
            $output3 = shell_exec($command);
            $arr = explode('**progdata**', $output3);
            $output=$arr[1];
            $predData=json_decode($output);

            $modelprec=new Predicciong();
            $modelprec->id_estacion=$idesta;
            $modelprec->fecha_ini=$ini;
            $modelprec->fecha_fin=$fin;
            $modelprec->fecha=date('Y-m-d');
            if(!$modelprec->save()){
                var_dump($modelprec->getErrors());die();
            }

            $tempData=[];
            foreach($predData as $fecha=>$valor){
                $fecha = $fecha / 1000;
                $fecha = date('Y-m-d', $fecha);
                $tempData[$fecha]=$valor;
            }

            foreach($tempData as $fecha=>$valor){
                $model = new Prediccionhecha();
                
                //$fecha = $fecha / 1000;
               // $fecha = date('Y-m-d', $fecha);
                
                //$model->etp=$valor;
              //  $model->rain=$rainData[$fecha];
                $model->temp_out=$tempData[$fecha];

                $model->fecha_estimada_inicial=$ini;
                $model->fecha_estimada_final=$fin;
                
                
                $model->fecha=$fecha;//'';//date('Y-m-d');
                $model->id_estacion=$idesta;
                $model->idprec=$modelprec->id;
                if(!$model->save()){
                    var_dump($model->getErrors());die();
                }
            }
        }catch(\Exception $ex){
            echo '<h2>Error</h2><pre>';
            echo "\n $output1 \n $output2 \n $output3\n";
            echo $ex->getMessage();
            echo $ex->getTraceAsString();
            echo '</pre>';
            die();
        }
           
            return $this->redirect(['predicciong/viewalerta', 'id' => $modelprec->id]);
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
