<?php
namespace frontend\controllers;

use backend\models\OrganizationRequest;
use common\models\Address;
use common\models\AddressJob;
use common\models\CapacityDictionary;
use common\models\Field;
use common\models\FieldJob;
use common\models\Market;
use common\models\MarketJob;
use common\models\OrganizationRequestAbilities;
use common\models\OrganizationRequests;
use common\models\Payment;
use common\models\PaymentJob;
use common\models\Work;
use common\models\WorkJob;
use frontend\models\Enterprises;
use yii\data\Pagination;
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
    public function actionIndex()
    {

        $capacity = CapacityDictionary::find()->limit(12)->all();
        // $listOrganization_requests = OrganizationRequests::find()->all();
        //  $this->actionCheckStatusOrigin($listOrganization_requests);
        $listOrganization_requestsConfirm = OrganizationRequests::find()->where(['status' => OrganizationRequest::confirm]);

// phân trang

        $pagination = $this->getCount($listOrganization_requestsConfirm);

        //limit the query using the pagination and retrieve the users
        $organization_requestsConfirms = $listOrganization_requestsConfirm->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $address = new Address();
        $field = new Field();
        $work = new Work();
        $payment = new Payment();
        $market = new Market();
        $capacity = CapacityDictionary::find()->limit(12)->all();
        $model = new Enterprises();

        return $this->render('index', [
            'capacity' => $capacity,
            'organization_requests' => $organization_requestsConfirms,
            'model' => $model,
            'address' => $address,
            'field' => $field,
            'work' => $work,
            'payment' => $payment,
            'market' => $market,
            'pagination' => $pagination,
        ]);

    }

    public function getCount($listOrganization)
    {
        $count = $listOrganization->count();
        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 6]);
        return $pagination;

    }
    // public function actionCheckStatusOrigin($listOrganization_requests)
    // {
    //     $today = date("y-m-d");
    //     foreach ($listOrganization_requests as $value) {
    //         if ($value->date_submitted < $today) {
    //             $value->status = 8;
    //             $value->save();
    //         }

    //     }
    // }

    public function actionSearchByNameEnterprise()
    {
        $listOrganization_requests = []; // danh sách các phiếu yêu cầu
        $username = $_POST['Enterprises']['username']; // username cần tìm
        // lấy ra danh sách các doanh nghiệp cần tìm
        $listEnterprise = Enterprises::find()->Where(['LIKE', 'enterprise.username', $username])->all();
// duyện danh sách theo id doanh nghiệp
        foreach ($listEnterprise as $value) {
            // lấy ra các phiếu có id doanh nghiệp cần tìm
            if (($model = OrganizationRequests::find()->where([
                'organization_id' => $value->id,
                'status' => OrganizationRequest::confirm,

            ])->all()) !== null) {
                // lưu các phiếu
                foreach ($model as $m) {
                    $listOrganization_requests[] = $m;
                }

            }
        }
        $address = new Address();
        $field = new Field();
        $work = new Work();
        $payment = new Payment();
        $market = new Market();
        $capacity = CapacityDictionary::find()->limit(12)->all();
        $model = new Enterprises();
        $pagination = '';
        return $this->render('index', [
            'capacity' => $capacity,
            'organization_requests' => $listOrganization_requests,
            'model' => $model,
            'address' => $address,
            'field' => $field,
            'work' => $work,
            'payment' => $payment,
            'market' => $market,
            'pagination' => $pagination,
        ]);

    }
    public function actionSearchByCapacity($id)
    {

        $listOrganization_requests = [];
        // tìm list id phiếu
        $listOrganization_requestsID = OrganizationRequestAbilities::find()->where(['ability_id' => $id])->all();
        // từ id phiếu lấy ra được các phiếu
        foreach ($listOrganization_requestsID as $value) {

            if (($model = OrganizationRequests::findOne([
                'status' => OrganizationRequest::confirm,
                'id' => $value->organization_request_id,
            ])) !== null) {
                $listOrganization_requests[] = $model;
            }

        }
        $address = new Address();
        $field = new Field();
        $work = new Work();
        $payment = new Payment();
        $market = new Market();
        $capacity = CapacityDictionary::find()->limit(12)->all();
        $model = new Enterprises();
        $pagination = "";
        return $this->render('index', [
            'capacity' => $capacity,
            'organization_requests' => $listOrganization_requests,
            'model' => $model,
            'address' => $address,
            'field' => $field,
            'work' => $work,
            'payment' => $payment,
            'market' => $market,
            'pagination' => $pagination,
        ]);
    }

    public function actionSearchAdvance()
    {

        $address_id = $_POST['Address']['name'];
        $field_id = $_POST['Field']['name'];
        $work_id = $_POST['Work']['name'];
        $payment_id = $_POST['Payment']['name'];
        $market_id = $_POST['Market']['name'];

        $listOrganization_requests = $this->getJobId($address_id, $field_id, $work_id, $payment_id, $market_id);

        $address = new Address();
        $field = new Field();
        $work = new Work();
        $payment = new Payment();
        $market = new Market();
        $capacity = CapacityDictionary::find()->limit(12)->all();
        $model = new Enterprises();

        // foreach ($listOrganization_requests as $v) {
        //     echo $v->id;

        // }
        // die();
        $pagination = '';
        return $this->render('index', [
            'capacity' => $capacity,
            'organization_requests' => $listOrganization_requests,
            'model' => $model,
            'address' => $address,
            'field' => $field,
            'work' => $work,
            'payment' => $payment,
            'market' => $market,
            'pagination' => $pagination,
        ]);
    }

    public function getJobId($address_id, $field_id, $work_id, $payment_id, $market_id)
    {
        $List_JobID = [];
        if ($address_id !== 5) {
            $jobID_address = AddressJob::find()->where(['address_id' => $address_id])->all();
        }
        if ($field_id !== 1) {
            $jobID_field = FieldJob::find()->where(['field_id' => $field_id])->all();
        }
        if ($address_id !== 1) {
            $jobID_work = WorkJob::find()->where(['work_id' => $work_id])->all();
        }
        if ($payment_id !== 1) {
            $jobID_payment = PaymentJob::find()->where(['payment_id' => $payment_id])->all();
        }
        if ($market_id !== 1) {

            $jobID_market = MarketJob::find()->where(['market_id' => $market_id])->all();
        }

        if ($jobID_address) {
            //   $this->pushIdToListJobId($jobID_address);
            foreach ($jobID_address as $job) {

                array_push($List_JobID, $job->job_id);
            }
        }
        if ($jobID_field) {
            // $this->pushIdToListJobId($jobID_field);
            foreach ($jobID_field as $job) {

                array_push($List_JobID, $job->job_id);
            }
        }
        if ($jobID_work) {
            // $this->pushIdToListJobId($jobID_work);
            foreach ($jobID_work as $job) {

                array_push($List_JobID, $job->job_id);
            }
        }
        if ($jobID_payment) {
            //$this->pushIdToListJobId($jobID_payment);
            foreach ($jobID_payment as $job) {

                array_push($List_JobID, $job->job_id);
            }
        }
        if ($jobID_market) {
            //   $this->pushIdToListJobId($jobID_market);
            foreach ($jobID_market as $job) {

                array_push($List_JobID, $job->job_id);
            }
        }

        $result = array_unique($List_JobID);
        return $this->Search($result);

    }
    public function pushIdToListJobId($jobId)
    {
        $List_JobID = [];
        foreach ($jobId as $job) {

            array_push($List_JobID, $job->job_id);
        }

    }

    public function Search($List_JobID)
    {

        $listOrganization_requests = [];
        foreach ($List_JobID as $job_id) {
            $job = OrganizationRequests::findOne($job_id);

            array_push($listOrganization_requests, $job);
        }
        return $listOrganization_requests;

    }

}
