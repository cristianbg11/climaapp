<?php

namespace frontend\controllers;

use frontend\models\Cultivo;
use Yii;
use frontend\models\Finca;
use frontend\models\FincaSearch;
use frontend\models\Planificacion;
use frontend\models\Predicciong;
use frontend\models\Prediccionhecha;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FincaController implements the CRUD actions for Finca model.
 */
class FincaController extends Controller
{
    public $currMod='config';
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
     * Lists all Finca models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FincaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Finca model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$ini=false,$fin=false,$cult=0,$area=0,$idprec=0)
    {
        $model = $this->findModel($id);
        $providerCultivoFinca = new \yii\data\ArrayDataProvider([
            'allModels' => $model->cultivoFincas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerCultivoFinca' => $providerCultivoFinca,
            'ini'=>$ini,
            'fin'=>$fin,
            'cult'=>$cult,
            'area'=>$area,
            'idprec'=>$idprec,
        ]);
    }

    /**
     * Creates a new Finca model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Finca();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Finca model.
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
     * Deletes an existing Finca model.
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
     * Export Finca information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerCultivoFinca = new \yii\data\ArrayDataProvider([
            'allModels' => $model->cultivoFincas,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerCultivoFinca' => $providerCultivoFinca,
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
     * Finds the Finca model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Finca the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Finca::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for CultivoFinca
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddCultivoFinca()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('CultivoFinca');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formCultivoFinca', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    public function actionPlanificar($id_cultivo, $id_finca, $id_pred,$area)
    {

        $predicion=Prediccionhecha::find()->where(['idprec'=>$id_pred])->all();
       // var_dump($predicion);die();
        $cult=Cultivo::findOne($id_cultivo);
        foreach($predicion as $prec){
            $modelp=new Planificacion();

            $modelp->id_cultivo=$id_cultivo;
            $modelp->id_finca=$id_finca;
            $modelp->id_prediccion=$id_pred;
            $modelp->area=$area;
           // var_dump($prec);die();
            $et=$prec->etp;
            $cant_agua= (($et * 24) * $cult->Maduracion) * $area;
            $cant_aguamedia= (($et * 24) * $cult->Media) * $area;
            $cant_aguamaduracion= (($et * 24) * $cult->Media) * $area;

            $cant_aguadesarrollo= (($et * 24) * $cult->Desarrollo) * $area;
           
            $modelp->et=$et;
            $modelp->fecha=$prec->fecha;//date('Y-m-d');
            $modelp->cant_agua=$cant_agua;
            $modelp->aguapend_media=$cant_aguamedia;
            $modelp->aguapend_maduracion=$cant_aguamaduracion;
            $modelp->aguapend_desarrollo=$cant_aguadesarrollo;
            $modelp->save();
        }
        return $this->redirect(['planificacion/riego']);
    }
}
