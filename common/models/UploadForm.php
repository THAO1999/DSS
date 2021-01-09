<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{

    public function Upload($model, $img)
    {
        // $model = new OrganizationRequests();  // đã từng lỗ ở đây
        $fileUpload = UploadedFile::getInstance($model, $img);

        if (isset($fileUpload->size)) {

            $fileUpload->saveAs(Yii::getAlias('@uploads/') . $fileUpload->baseName . '.' . $fileUpload->extension);

            return $fileUpload->baseName . '.' . $fileUpload->extension;

        }
    }
}
