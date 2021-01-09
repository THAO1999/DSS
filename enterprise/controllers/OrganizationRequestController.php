<?php

namespace enterprise\controllers;

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

/**
 * CapacityDictionaryController implements the CRUD actions for CapacityDictionary model.
 */
class OrganizationRequestController extends Controller
{
    // const confirm = 10;
    // const unConfirm = 9;
    // const cancel = 0;
    /**
     * {@inheritdoc}
     */
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

        ]);

    }
    public function actionView($id)
    {

        $organization_requests = OrganizationRequests::findOne($id); // lay thong tin phieu theo id

        $enterprise = Enterprises::getEnterpriseProfiles($organization_requests->organization_id);

        $listOrganization_requests = OrganizationRequests::find()->limit(5)->all(); //lay list

        $lisSkill = OrganizationRequestAbilities::getSkill($organization_requests); // lay list skill student

        $count = StudentRegistration::getCount($id);
        $listComment = Comment::find()->where(['request_id' => $organization_requests->id])->limit(4)->all();

        return $this->render('view', [
            'organization_requests' => $organization_requests,
            'enterprise' => $enterprise,
            'lisSkill' => $lisSkill,
            'listOrganization_requests' => $listOrganization_requests,
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
        } else {
            return $this->getListOrganizationRequestExpire();
        }

    }
    public function getListOrganizationRequestConfirm()
    {
        return OrganizationRequest::find()->where(['status' => OrganizationRequest::confirm, 'organization_id' => Yii::$app->user->identity->id])->all();
    }
    public function getListOrganizationRequestUnConfirm()
    {
        return OrganizationRequest::find()->where(['status' => OrganizationRequest::unConfirm, 'organization_id' => Yii::$app->user->identity->id])->all();
    }
    public function getListOrganizationRequestCancel()
    {
        return OrganizationRequest::find()->where(['status' => OrganizationRequest::cancel, 'organization_id' => Yii::$app->user->identity->id])->all();
    }
    public function getListOrganizationRequestExpire()
    {
        return OrganizationRequest::find()->where(['status' => OrganizationRequest::expire, 'organization_id' => Yii::$app->user->identity->id])->all();
    }

}
