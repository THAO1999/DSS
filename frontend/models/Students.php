<?php
namespace frontend\models;

use backend\models\Student;
use yii\helpers\Url;

class Students extends Student
{
    public function getStudentProfiles($id)
    {

        if (($model = Students::findOne($id)) !== null) {
            return $model;
        }
    }
    public function getImageStudent($id)
    {
        // lay organization_id doanh nghiep
        $student = Students::findOne($id);

        return Url::base(true) . '/../../uploads/' . $student->imageFile; // getpathImg

    }
    public function BeforeSave($insert)
    {

        $old_user = Student::findOne(($this->id));
        if ($this->imageFile == null) { // neu != password old thi ma hoa password dc update
            $this->imageFile = $old_user->imageFile;
        }

        return parent::beforeSave($insert);
    }
    // lay thong tin student theo id
    public function getStudent($id)
    {
        return $model = Students::findOne($id);

    }

    // kiểm ta xem sinh viên đã dc  phân công hay chưa
    public function checkStatus($id)
    {

        if (($model = AssignedTables::findOne([
            'student_id' => $id,
            'status' => 1,
        ])) !== null) {
            return $model;
        }

    }
}
