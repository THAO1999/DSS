<?php

namespace enterprise\models;
use common\models\Enterprise;
use yii\web\IdentityInterface;  
use Yii;
use yii\helpers\Url;

class Enterprises extends Enterprise
{
    public function getEnterprisesProfiles($id)
    { 

        if (($model = Enterprises::findOne($id)) !== null) {
            return $model;
        }
    }
    public function getImageEnterprises($id)
    {
          // lay organization_id doanh nghiep
       $enterprises= Enterprises::findOne($id);
 
       return  Url::base(true). '/../../uploads/'.$enterprises->imageFile; // getpathImg
       
 
 
    } 
}
