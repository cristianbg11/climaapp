<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Predicciong;
use frontend\models\PredicciongSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PredicciongController implements the CRUD actions for Predicciong model.
 */
class PredicciongController extends Controller
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
     * Lists all Predicciong models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PredicciongSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDemanda()
    {
        $this->currMod='visualizacion';
        $searchModel = new PredicciongSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('demanda', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionEtp()
    {
        $this->currMod='visualizacion';
        $searchModel = new PredicciongSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('etp', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Predicciong model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerPrediccionhecha = new \yii\data\ArrayDataProvider([
            'allModels' => $model->prediccionhechas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerPrediccionhecha' => $providerPrediccionhecha,
        ]);
    }

    public function actionViewdemanda($id)
    {
        $model = $this->findModel($id);
        $providerPrediccionhecha = new \yii\data\ArrayDataProvider([
            'allModels' => $model->prediccionhechas,
        ]);
        return $this->render('viewdemanda', [
            'model' => $this->findModel($id),
            'providerPrediccionhecha' => $providerPrediccionhecha,
        ]);
    }
    public function actionViewetp($id)
    {
        $model = $this->findModel($id);
        $providerPrediccionhecha = new \yii\data\ArrayDataProvider([
            'allModels' => $model->prediccionhechas,
        ]);
        return $this->render('viewetp', [
            'model' => $this->findModel($id),
            'providerPrediccionhecha' => $providerPrediccionhecha,
        ]);
    }
public function actionVergraf($id,$idcultivo,$idfinca){
    $this->currMod='visualizacion';
    return $this->render('graficos_demanda',[
        'id'=>$id,'idcultivo'=>$idcultivo,'idfinca'=>$idfinca,
    ]);
}

public function actionVergraf_etp($id,$idcultivo,$idfinca){
    $this->currMod='visualizacion';
    return $this->render('graficos_etp',[
        'id'=>$id,'idcultivo'=>$idcultivo,'idfinca'=>$idfinca,
    ]);
}
    /**
     * Creates a new Predicciong model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Predicciong();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Predicciong model.
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
     * Deletes an existing Predicciong model.
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
     * Finds the Predicciong model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Predicciong the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Predicciong::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Prediccionhecha
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPrediccionhecha()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Prediccionhecha');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPrediccionhecha', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
