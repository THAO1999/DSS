<?php
namespace frontend\controllers;

use backend\models\AssignedTable;
use backend\models\OrganizationRequest;
use backend\models\StudentRegistration;
use common\models\OrganizationRequestAbilities;
use common\models\OrganizationRequests;
use frontend\models\AssignedTables;
use frontend\models\Enterprises;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AssignedTableController implements the CRUD actions for AssignedTable model.
 */
class AssignedTableController extends Controller
{
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
     * Lists all AssignedTable models.
     * @return mixed
     */
    public function actionIndex($student_id)
    {
        // xác định phiếu phân công của sinh viên
        //$student_id = Yii::$app->user->identity->id;
        $model = AssignedTables::findOne([
            'student_id' => $student_id,
            'status' => 1,
        ]);
        if ($model) {
            $organization_requests = OrganizationRequests::findOne($model->organization_request_id); // lay thong tin phieu theo id

            $enterprise = Enterprises::getEnterpriseProfiles($organization_requests->organization_id);

            $listOrganization_requests = OrganizationRequests::find()->where(['status' => OrganizationRequest::confirm])->limit(5)->all();

            $count = StudentRegistration::getCount($model->organization_request_id);

            $lisSkill = OrganizationRequestAbilities::getSkill($organization_requests); // lay list skill student
            // phpinfo();

            return $this->render('index', [
                //'capacity' => $capacity,
                'organization_requests' => $organization_requests,
                'enterprise' => $enterprise,
                'lisSkill' => $lisSkill,
                'listOrganization_requests' => $listOrganization_requests,
                'count' => $count,
                'model' => $model,
                'student_id' => $student_id,
            ]);
        } else {
            return $this->redirect('../home/index');
        }
    }

    /**
     * Displays a single AssignedTable model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing AssignedTable model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($student_id)
    {

        $model = $this->findModel($student_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('../home/index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssignedTable model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AssignedTable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssignedTable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = AssignedTables::findOne([
            'student_id' => $id,
            'status' => 1,
        ]);
        return $model;

    }

}
