<?php

namespace backend\controllers;

use Yii;
use common\models\Pupil;
use common\models\Grade;
use backend\models\PupilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * PupilController implements the CRUD actions for Pupil model.
 */
class PupilController extends Controller
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
     * Lists all Pupil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PupilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new Pupil();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Pupil model.
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
     * Creates a new Pupil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pupil();

        $this->layout = false;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pupil model.
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
            $model = new Pupil();
            // $model->birth_date=Yii::$app->formatter->asDate($model->birth_date, "yyyy-mm-dd");
        } else {
            $model = $this->findModel($id);
            // $model->birth_date=Yii::$app->formatter->asDate($model->birth_date, "yyyy-mm-dd");
        }


        $result = [];

        if ($model->load(Yii::$app->request->post())) {
            $string = str_replace(array('(', ')'), '', $_POST["Pupil"]["telephone"]);

            $model->telephone = $string;

            $image = UploadedFile::getInstance($model, "image");
            if (!empty($image)) {
                $model->image = $image->baseName . '.' . $image->extension;
                $model->save();
            }

            if ($model->save()) {
                if (!empty($image)) {
                    $image->saveAs('uploads/' . $model->image);
                    return $this->redirect(['index']);
                }
                return $this->redirect(['index']);
            }
        }
//        } else {
//            $model->birth_date = Yii::$app->formatter->asDate($model->birth_date, "php:Y-m-d");
//
////            $image = UploadedFile::getInstance($model, "image");
////
////            if ($model->validate()) {
////                $model->image = random_int(0, 9999) . '.' . $image->extension;
////            }
//
//            $model->save();
//            $result['success'] = 0;
//            $result['view'] = $this->renderAjax('_form', ['model' => $model]);
//        }
    }

    /**
     * Deletes an existing Pupil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public
    function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pupil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pupil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Pupil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public
    function actionPupil()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $grade_id = $parents[0];
                if ($grade_id) {
                    $out = Pupil::all($grade_id, false);
                } else {
                    $out = Pupil::all(NULL, false);
                }

                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]

                return ['output' => $out, 'selected' => ''];
            }
        }

        return ['output' => '', 'selected' => ''];
    }

    public
    function actionUpload()
    {
        echo '<pre>';
        print_r($_POST);
        print_r($_FILES);
        die;
//        $model = new Pupil();
//        var_dump($_POST);
//        return $this->render('_form', ['model' => $model]);
    }
}
