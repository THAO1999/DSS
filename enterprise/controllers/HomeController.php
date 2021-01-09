<?php
namespace enterprise\controllers;

use common\models\Address;
use common\models\AddressJob;
use common\models\Field;
use common\models\FieldJob;
use common\models\Market;
use common\models\MarketJob;
use common\models\OrganizationRequestAbilities;
use common\models\OrganizationRequests;
use common\models\Payment;
use common\models\UploadForm;
use common\models\Work;
use common\models\WorkJob;
use enterprise\models\Capacity;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class HomeController extends Controller
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
    public function actionCreate()
    {
        $model = new OrganizationRequests();

        $time = date("Y/m/d");
        $model->create_at = $time;
        $capacity = new Capacity();
        $organizationRequestAbilities = new OrganizationRequestAbilities();
        $model->organization_id = Yii::$app->user->identity->id;
        $model->status = 9;
        $img = "imageFile";
        $model->imageFile = UploadForm::Upload($model, $img);

        $address = new Address();
        $field = new Field();
        $work = new Work();
        $payment = new Payment();
        $market = new Market();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $organizationRequestAbilities->luu($model->id);
            AddressJob::luu($model->id);
            FieldJob::luu($model->id);
            WorkJob::luu($model->id);
            MarketJob::luu($model->id);
            return $this->redirect('../organization-request/index?status=9');
        }
        return $this->render('create', [
            'model' => $model,
            'capacity' => $capacity,
            'address' => $address,
            'field' => $field,
            'work' => $work,
            'payment' => $payment,
            'market' => $market,
        ]);
    }

}
