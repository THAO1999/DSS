<?php

namespace backend\models;

use common\models\Enterprise;
use common\models\OrganizationRequests;
use yii\helpers\Url;

class Enterprises extends Enterprise
{
    public function getImageEnterprise($id)
    {

        // lay organization_id doanh nghiep
        $organizationRequests = OrganizationRequests::findOne($id);
        $enterpriseID = $organizationRequests->organization_id; //

        $enterprise = Enterprise::findOne($enterpriseID);
        //return $enterprise->imageFile;

        return Url::base(true) . '/../uploads/' . $enterprise->imageFile; // getpathImg

    }

    public function getImageEnterpriseView($id)
    {
        // lay organization_id doanh nghiep
        $enterprises = Enterprises::findOne($id);

        return Url::base(true) . '/../../uploads/' . $enterprises->imageFile; // getpathImg

    }

}
