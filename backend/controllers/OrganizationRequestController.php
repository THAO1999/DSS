<?php

namespace backend\controllers;

use backend\models\OrganizationRequest;
use backend\models\StudentRegistration;
use common\models\CapacityDictionary;
use common\models\OrganizationRequestAbilities;
use common\models\OrganizationRequests;
use frontend\models\Comment;
use frontend\models\Enterprises;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * CapacityDictionaryController implements the CRUD actions for CapacityDictionary model.
 */
class OrganizationRequestController extends Controller
{

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

    /**
     * Lists all CapacityDictionary models.
     * @return mixed
     */
    public function actionIndex($status)
    {
        // confirm

        $listOrganizationRequest = $this->checkStatus($status);

        return $this->render('index', [
            'listOrganizationRequest' => $listOrganizationRequest,
            "status" => $status,
        ]);

    }
    public function actionConfirm($id)
    {
        $organization_requests = OrganizationRequests::findOne($id); // lay thong tin phieu theo id
        $organization_requests->status = OrganizationRequest::confirm; // chuyển thành phếu đã xác nhận
        $organization_requests->save();
        return $this->actionIndex($organization_requests->status);

    }

    public function actionCreate($id) // hủy Phiếu

    {
        $model = $this->findModel($id);
        return $this->render('create',
            [
                'model' => $model,
            ]);

    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->cancel = $_POST['OrganizationRequests']["cancel"];
            $model->status = OrganizationRequest::cancel;
            $model->save();
            return $this->actionIndex($model->status);
        }
    }

    public function actionView($id)
    {
        //$id = 183; //pheu

        $organization_requests = OrganizationRequests::findOne($id); // lay thong tin phieu theo id

        $enterprise = Enterprises::getEnterpriseProfiles($organization_requests->organization_id);

        // $listOrganization_requests = OrganizationRequests::find()->limit(5)->all(); //lay list
        $count = StudentRegistration::getCount($id);
        $lisSkill = OrganizationRequestAbilities::getSkill($organization_requests); // lay list skill student
        $listComment = Comment::find()->where(['request_id' => $organization_requests->id])->limit(4)->all();

        // phpinfo();
        return $this->render('view', [
            'organization_requests' => $organization_requests,
            'enterprise' => $enterprise,
            'lisSkill' => $lisSkill,
            'count' => $count,
            'listComment' => $listComment,
        ]);

    }

    public function checkStatus($status)
    {
        if ($status == OrganizationRequest::confirm) {
            return $this->getListOrganizationRequestConfirm();
        } elseif ($status == OrganizationRequest::unConfirm) {
            return $this->getListOrganizationRequestUnConfirm();
        } elseif ($status == OrganizationRequest::cancel) {
            return $this->getListOrganizationRequestCancel();
        }

    }
    public function getListOrganizationRequestConfirm()
    {
        return OrganizationRequest::find()->where(['status' => OrganizationRequest::confirm])->all();
    }
    public function getListOrganizationRequestUnConfirm()
    {
        return OrganizationRequest::find()->where(['status' => OrganizationRequest::unConfirm])->all();
    }
    public function getListOrganizationRequestCancel()
    {
        return OrganizationRequest::find()->where(['status' => OrganizationRequest::cancel])->all();
    }

    protected function findModel($id)
    {
        if (($model = OrganizationRequests::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
