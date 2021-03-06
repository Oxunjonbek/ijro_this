<?php

namespace backend\controllers;

use Yii;
use common\models\Tadbir;
use common\models\TadbirSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * TadbirController implements the CRUD actions for Tadbir model.
 */
class TadbirController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'view','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // [
                    //     'actions' => ['login', 'error'],
                    //     'allow' => true,
                    //     'roles' => ['?'],
                    // ],
                    // [
                    //     'actions' => ['deny', 'seny','under'],
                    //     'allow' => true,
                    //     'roles' => ['@'],
                    // ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tadbir models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TadbirSearch();
        $queryParams = Yii::$app->request->queryParams;
        $user = Yii::$app->user->identity;
        // print_r($queryParams);die;
        $company_id = $searchModel->companySelect($user);
        $queryParams['company_id'] = $company_id;
        $dataProvider = $searchModel->search($queryParams);

        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tadbir model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tadbir model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tadbir();

        if ($model->load(Yii::$app->request->post())) {
            $model->tadbir_date=Yii::$app->formatter->asDate($model->tadbir_date,"php:Y-m-d");
            // $model->save();
            // return $this->redirect(['index']);
            $files = UploadedFile::getInstance($model, 'files');
            if (!empty($files)) {
                $randString = md5(random_int(0,9999).'_'. microtime(true));
                $model->file = $randString. '.' . $files->extension;
                // $model->file = random_int(0,9999). '.' . $files->extension;
            }
            
            if ($model->save()) {
                if (!empty($files)) {
                    $files->saveAs('uploads/pdf/' . $model->file);
                    return $this->redirect(['index']);
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tadbir model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
         $model->tadbir_date=Yii::$app->formatter->asDate($model->tadbir_date,"php:Y-m-d");
            // $model->save();
            // return $this->redirect(['index']);
         $files = UploadedFile::getInstance($model, 'files');
         if (!empty($files)) {
            if (isset($model->file)) {
                $randString = md5($model->file .'_'. microtime(true));            
                $model->file = $randString. '.' . $files->extension;
                    // echo $model->file;exit();
            }else{
                $randString = md5(random_int(0,9999).'_'. microtime(true));
                $model->file = $randString. '.' . $files->extension;
            }
        }
        
        if ($model->save()) {
            if (!empty($files)) {
                $files->saveAs('uploads/pdf/' . $model->file);
                return $this->redirect(['index']);
            }
            return $this->redirect(['index']);
        }
    }

    return $this->render('update', [
        'model' => $model,
    ]);
}


    /**
     * Deletes an existing Tadbir model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tadbir model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tadbir the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tadbir::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
