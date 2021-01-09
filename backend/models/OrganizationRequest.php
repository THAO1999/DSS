<?php
namespace backend\models;

use common\models\OrganizationRequests;

class OrganizationRequest extends OrganizationRequests
{

    const confirm = 10;
    const unConfirm = 9;
    const cancel = 0;
    const expire = 8;

    public function checkStatus($status)
    {
        if ($status == self::confirm) {
            return "Trong Thời Gian Đăng ki";
        } else if ($status == self::unConfirm) {
            return "Chưa Được Xác Nhận";
        } else if ($status == self::cancel) {
            return "Phiêu Bi Hủy ";
        }

    }
    public function checkS($status)
    {
        if ($status == self::unConfirm) {
            return self::unConfirm;
        } else {
            return false;
        }

    }
    public function checkCancel($status)
    {
        if ($status == self::cancel) {

            return self::cancel;
        } else {
            return false;
        }

    }
    public function checkConfirm($status)
    {
        if ($status == self::confirm) {
            return self::confirm;
        } else {
            return false;
        }

    }
}
