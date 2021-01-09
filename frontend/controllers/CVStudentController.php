<?php
namespace frontend\controllers;

use common\models\Colleges;
use common\models\Experience;
use common\models\hobby;
use common\models\information;
use common\models\operation;
use common\models\Target;
use frontend\models\Students;
use frontend\models\StudentSkillProfile;
use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class CvStudentController extends Controller
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
        $student_id = Yii::$app->user->identity->id;
        $target = Target::getTarget($student_id);
        $colleges = Colleges::find()->where(['user_id' => $student_id])->one();
        $experience = Experience::find()->where(['user_id' => $student_id])->one();
        $operator = operation::find()->where(['user_id' => $student_id])->one();
        $hobby = hobby::find()->where(['user_id' => $student_id])->one();
        $info = Information::find()->where(['user_id' => $student_id])->one();
        $student = Students::find()->where(['id' => $student_id])->one();
        $list_StudentSkill = StudentSkillProfile::getSkill($model->getStudent($student_id)); // lay list skill student
        return $this->render('index', [
            'target' => $target,
            'colleges' => $colleges,
            'experience' => $experience,
            'operator' => $operator,
            'hobby' => $hobby,
            'info' => $info,
            'list_StudentSkill' => $list_StudentSkill,
            'student' => $student,
        ]);
    }

}
