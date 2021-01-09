<?php
namespace frontend\models;

use backend\models\StudentRegistration;

class StudentRegistrations extends StudentRegistration
{

    public function saveStudentRegistrations($studentID, $requestID)
    {
        phpinfo();
        $model = new StudentRegistrations();
        $model->student_id = $studentID;
        $model->request_id = $requestID;
        if ($model->save()) {
            return true;
        }

    }

  

}
