<?php
namespace frontend\controllers;

use common\models\LoginFormStudent;
use frontend\models\Students;
use Yii;
use yii\filters\AccessControl;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            $this->actionCheckAssignedTables();

        }
        $this->layout = 'blank';

        $model = new LoginFormStudent();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->actionCheckAssignedTables();

        } else {
            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionCheckAssignedTables()
    {
        $assignedTables = Students::checkStatus(Yii::$app->user->identity->id);
        if ($assignedTables) {

            return $this->redirect('../assigned-table/index?student_id=' . $assignedTables->student_id);
        } else {
            return $this->redirect('../home/index');
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

}
