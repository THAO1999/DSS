<?php
namespace frontend\controllers;

use common\models\UploadForm;
use frontend\models\Students;
use frontend\models\StudentSkillProfile;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class ProfileStudentController extends Controller
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
        $model = new Students();
        $id = Yii::$app->user->identity->id; // id student
        $model = $model->getStudentProfiles($id);
        $img = 'imageFile';
        $model->imageFile = UploadForm::Upload($model, $img); // lay duong dan

        $list_StudentSkill = StudentSkillProfile::getSkill($model->getStudent($id)); // lay list skill student
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('index', [
                'model' => $model,
                'list_StudentSkill' => $list_StudentSkill,
            ]);
        }

        return $this->render('index', [
            'model' => $model,
            'list_StudentSkill' => $list_StudentSkill,
        ]);
    }

}
