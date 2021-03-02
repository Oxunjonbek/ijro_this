<?php

namespace backend\controllers;

use Yii;
use common\models\School;
use backend\models\search\SchoolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use common\models\Region;
use common\models\District;
use common\models\Town;

/**
 * SchoolController implements the CRUD actions for School model.
 */
class SchoolController extends Controller
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
     * Lists all School models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new School();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Displays a single School model.
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
     * Creates a new School model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new School();
        $this->layout = false;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing School model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = false;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        $model = $this->findModel($id);
        $model->region = $model->town->district->region->id;
        $model->district = $model->town->district->id;
        $model->town_id = $model->town->id;

        return $this->renderAjax('update', [
            'model' => $model,
            'id'=>$id
        ]);
    }

    public function actionSave($id = null)
    {
        $this->layout = false;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        if ($id == null) {
            $model = new School();
        } else {
            $model = $this->findModel($id);
        }

        $result = [];
        // var_dump($model->load(Yii::$app->request->post()));die();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	// var_dump(Yii::$app->request->post());
        	// $model->save();
            $result['success'] = 1;
            $result['view'] = $this->render('_form', ['model' => new School()]);
        } else {
            $result['success'] = 0;
            $result['view'] = $this->renderAjax('_form', ['model' => $model]);
        }
        return $result;
        // return var_dump($result);exit();
    }

    /**
     * Deletes an existing School model.
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
     * Finds the School model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return School the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = School::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionGetDistrictList()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $region_id = $parents[0];
                if ($region_id) {
                    $out = District::all($region_id, false);
                } else {
                    $out = '';
                }
                return ['output' => $out];
                return ['output' => $out, 'selected' => ''];
            }
        }

        return ['output' => '', 'selected' => ''];
    }

    public function actionTown()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $region_id = empty($ids[0]) ? null : $ids[0];
            $district_id = empty($ids[1]) ? null : $ids[1];
            if ($region_id != null) {
                $data = self::getListTown($region_id, $district_id);
               
                return ['output'=>$data];
            }
        }
    return ['output'=>'', 'selected'=>''];

    }

    public static function getListTown($region_id,$district_id)
    {
        $array=[];
        $array1=[];
        $town = Town::find()  
                            ->where(['district_id'=>$district_id])
                            ->select("name, id")
                            ->all();
        foreach ($town as $key => $v) {
            $array1['id']=$v->id;
            $array1['name']=$v->name;
            array_push($array,$array1);
        }
        return $array;
    }
    public function actionAddress()
    {   
        $model = new Town();
        $this->layout = false;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        return $this->renderAjax('address', [
            'model' => $model,
        ]);
        // return $this->render('address');
    }
}
