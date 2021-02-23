<?php

namespace backend\controllers;

use Yii;
use common\models\Teacher;
use common\models\School;
use backend\models\search\TeacherSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\base\Model;

/**
 * TeacherController implements the CRUD actions for Teacher model.
 */
class TeacherController extends Controller
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
     * Lists all Teacher models.
     * @return mixed
     */

    public function actionIndex()
    {
        $searchModel = new TeacherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new Teacher();

        if (isset($_GET["page"])) {
            $session = Yii::$app->session;

            $session->set("page", $_GET["page"]);

            $session->close();
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);


        // $searchModel = new TeacherSearch();
        // $params = Yii::$app->request->queryParams;

        // if (isset($params['TeacherSearch']['birth_date']) && $params['TeacherSearch']['birth_date']) {
        //         $params['TeacherSearch']['dateBegin'] = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$3-$2-$1', $params['TeacherSearch']['birth_date']);
        //         $params['TeacherSearch']['dateEnd'] = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$6-$5-$4', $params['TeacherSearch']['birth_date']);
        //     }

        // $dataProvider = $searchModel->search($params);
        // $model = new Teacher();

        //  return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        //     'model' => $model,
        // ]);
    }

    /**
     * Displays a single Teacher model.
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
     * Creates a new Teacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Teacher();

        $this->layout = false;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;


        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Teacher model.
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
        $session = Yii::$app->session;

        $this->layout = false;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        if ($id == null) {
            $model = new Teacher();
        } else {
            $model = $this->findModel($id);
        }

        $result = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'page' => $session->get("page")]);
        } else {
            $result['success'] = 0;
            $result['view'] = $this->renderAjax('_form', ['model' => $model]);
        }
        return $result;
    }

    /**
     * Deletes an existing Teacher model.
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
     * Finds the Teacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Teacher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teacher::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSchool()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $town_id = $parents[0];
                if ($town_id) {
                    $out = School::all($town_id, false);
                } else {
                    $out = School::all(NULL, false);
                }

                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]

                return ['output' => $out];
                return ['output' => $out, 'selected' => ''];
            }
        }

        return ['output' => '', 'selected' => ''];
    }

    public function actionSchoolFrom($school_id = null)
    {
        $model = new Teacher();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['teacher/index']);
        }

        return $this->render('_form', ['model' => $model, 'school_id' => $school_id]);
    }

    public function actionSelect()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $school_id = $parents[0];
                if ($school_id) {
                    $out = Teacher::all($school_id, false);
                } else {
                    $out = Teacher::all(NULL, false);
                }

                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]

                return ['output' => $out];
                return ['output' => $out, 'selected' => ''];
            }
        }

        return ['output' => '', 'selected' => ''];
        // return var_dump();
    }

}
