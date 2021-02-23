<?php

namespace backend\controllers;

use Yii;
use common\models\Grade;
use common\models\Teacher;
use backend\models\search\GradeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * GradeController implements the CRUD actions for Grade model.
 */
class GradeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public $layout = '/robust/card';

    /**
     * Lists all Grade models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GradeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new Grade();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Grade model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Grade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Grade();

        $this->layout = false;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Grade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = false;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        $model = $this->findModel($id);

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    public function actionSave($id = null)
    {
        $this->layout = false;
        
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        if ($id == null) {
            $model = new Grade();
        } else {
            $model = $this->findModel($id);
        }

        $result = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // $this->refresh();
            return $this->redirect(['index']);
            // $result['view'] = $this->render('_form', ['model' => new Grade()]);
            $result['success'] = 1;
            // return $this->refresh();
            // $result['view'] = $this->render('_form', ['model' => new Grade()]);
        } else {
            // $this->refresh();
            $result['success'] = 0;
            // return $this->refresh();
            $result['view'] = $this->render('_form', ['model' => $model]);
        }
        return $result;
    }

    /**
     * Deletes an existing Grade model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Grade model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Grade the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Grade::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGradeFrom($school_id = null,$teacher_id=null)
    {
        $model = new Grade();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['grade/index']);
        }

        return $this->render('_form',[
            'model'=>$model,
            'school_id' => $school_id,
            'teacher_id' => $teacher_id,
        ]);
    }

    public function actionSelect()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $school_id = $parents[0];

                $out = self::getListDistrict($school_id); 
               
                return ['output'=>$out];
            }
        }
        return ['output'=>''];
    }
    public static function getListDistrict($school_id)
    {
        $array=[];
        $array1=[];
        $categories = Teacher::find()
                            ->where(['school_id'=>$school_id])   
                            ->select("full_name, id")
                            ->all();
        foreach ($categories as $key => $v) {
            $array1['id']=$v->id;
            $array1['name']=$v->full_name;
            array_push($array,$array1);
        }
        return $array;
    }
}
