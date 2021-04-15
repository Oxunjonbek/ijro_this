<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\Tadbir;
use common\models\Company;
use common\models\CalendarSearch;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
               'only' => ['login','signup','index', 'moliya', 'parent','tadbir','company','generalniy','bolum','tizim'],
                'rules' => [
                    [
                        'actions' => ['login','signup','index', 'moliya', 'parent','tadbir','company','generalniy','bolum','tizim'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    // [
                    //     'actions' => ['logout','signup'],
                    //     'allow' => true,
                    //     'roles' => ['@'],
                    // ],
                ],
            ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'robust/login',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    // public function actionIndex()
    // {
        // if (!user()->isGuest) {
        //     switch (user()->identity->role->name) {
        //         case 'tasischi':
        //             $this->redirect(['site/moliya']);
        //             break;
        //     }
        // }

    //     $tadbir = Tadbir::find()->all();
    //     $company =  Company::find()->all();
    //     return $this->render('index',['tadbir'=>$tadbir,'company'=>$company]);
    // }
    public function actionIndex()
    {
        $searchModel = new CalendarSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                'dataProvider' => $dataProvider
            ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionMoliya()
    {
        return $this->render('moliya');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        // $model = new ContactForm();
        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        //     if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
        //         Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
        //     } else {
        //         Yii::$app->session->setFlash('error', 'There was an error sending your message.');
        //     }

        //     return $this->refresh();
        // } else {
        //     return $this->render('contact', [
        //         'model' => $model,
        //     ]);
        // }
        $company =  Company::find()->where(['parent'=>'boshqarma'])->all();
        return $this->render('generalniy',['company'=>$company]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionParent()
    {
        $parents = Parents::find()->all();
        return $this->render('parent',
    [
        'parents'=>$parents
    ]);
    }
    public function actionTadbir()
    {
        $tadbir = Tadbir::find()->all();
        $company =  Company::find()->all();
        return $this->render('tadbir',['tadbir'=>$tadbir,'company'=>$company]);
    }
    public function actionCompany()
    {
        $companys =  Company::find()->all();
        return $this->render('company',['companys'=>$companys]);
    }
    public function actionGeneralniy()
    {
        $company =  Company::find()->where(['parent'=>'boshqarma'])->all();
        return $this->render('generalniy',['company'=>$company]);
    }
    public function actionBolum()
    {
        $company =  Company::find()->where(['parent'=>'bo`lim'])->all();
        return $this->render('bolum',['company'=>$company]);
    }
    public function actionTizim()
    {
        $company =  Company::find()->where(['parent'=>'tizim'])->all();
        return $this->render('tizim',['company'=>$company]);
    }

    public function actionJsoncalendar($start=NULL,$end=NULL,$_=NULL)
    {
    $times = \app\modules\timetrack\models\Timetable::find()->where(array('category'=>\app\modules\timetrack\models\Timetable::CAT_TIMETRACK))->all();

    $events = array();

    foreach ($times AS $time){
      //Testing
      $Event = new \yii2fullcalendar\models\Event();
      $Event->id = $time->id;
      $Event->title = $time->categoryAsString;
      $Event->start = date('Y-m-d\Th:m:s\Z',strtotime($time->date_start.' '.$time->time_start));
      $Event->end = date('Y-m-d\Th:m:s\Z',strtotime($time->date_start.' '.$time->time_end));
      $events[] = $Event;
    }

    header('Content-type: application/json');
    echo Json::encode($events);
    
    Yii::$app->end();
  }
}
