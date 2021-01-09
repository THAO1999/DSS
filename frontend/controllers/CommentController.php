<?php
namespace frontend\controllers;

use common\models\OrganizationRequests;
use frontend\models\Comment;
use frontend\models\Enterprises;
use yii;
use yii\filters\AccessControl;

/**
 * Site controller
 */
use yii\filters\VerbFilter;
use yii\web\Controller;

class CommentController extends Controller
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
    public function actionIndex($id)
    {
        //  phpinfo();
        $model = new Comment();
        $organization_requests = OrganizationRequests::findOne($id);
        $enterprises = Enterprises::getEnterpriseProfiles($organization_requests->organization_id);

        $listComment = Comment::find()->where(['request_id' => $id])->limit(4)->all();
        return $this->render('index', [
            'model' => $model,
            'id' => $id,
            'listComment' => $listComment,
            'enterprises' => $enterprises,
        ]);

    }
    public function actionCreate($request_id)
    {
        $model = new Comment();
        if ($model->load(Yii::$app->request->post())) {
            $model->student_id = Yii::$app->user->identity->id;
            $model->request_id = $request_id;
            $model->save();
            return $this->actionIndex($request_id);
        }
    }

}
