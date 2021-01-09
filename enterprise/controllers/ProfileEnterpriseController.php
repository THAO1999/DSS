<?php
namespace enterprise\controllers;

use common\models\UploadForm;
use enterprise\models\Enterprises;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class ProfileEnterpriseController extends Controller
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
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
     * Displays about page.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $model = new Enterprises();
        $id = Yii::$app->user->identity->id; // id Enterprises
        $model = $model->getEnterprisesProfiles($id);
        $img = "imageFile";
        $model->imageFile = UploadForm::Upload($model, $img);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('index', [
                'model' => $model,
            ]);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
