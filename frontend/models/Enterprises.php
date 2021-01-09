<?php
namespace frontend\models;

use common\models\Enterprise;
use yii\helpers\Url;

class Enterprises extends Enterprise
{
    public function getEnterpriseProfiles($id)
    {

        if (($model = Enterprises::findOne($id)) !== null) {
            return $model;
        }
    }
    public function getImageEnterprise($id)
    {
        // lay organization_id doanh nghiep
        $enterprises = Enterprises::findOne($id);

        return Url::base(true) . '/../../uploads/' . $enterprises->imageFile; // getpathImg

    }
    public function getCoverImage($id)
    {
        // lay organization_id doanh nghiep
        $enterprises = Enterprises::findOne($id);

        return Url::base(true) . '/../../uploads/' . $enterprises->cover_img; // getpathImg

    }

}
