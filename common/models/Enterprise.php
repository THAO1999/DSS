<?php

namespace common\models;

use common\models\OrganizationRequests;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "enterprise".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $password_hash
 * @property string|null $president
 * @property string $email
 * * @property string $auth_key
 *
 * @property string|null $date_establish
 * @property int|null $employee_count
 * @property string|null $imageFile
 * @property string|null $cover_img
 * @property string|null $description
 * @property int|null $gross_revenue
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $address
 */
class Enterprise extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enterprise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash'], 'required'],
            [['date_establish', 'created_at', 'updated_at'], 'safe'],
            [['employee_count', 'gross_revenue', 'status'], 'integer'],
            [['username', 'password_hash', 'president', 'email'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 32],
            [['auth_key'], 'string', 'max' => 32],

            [['address'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100000],

            [['username'], 'unique'],
            [['email'], 'unique'],
            [['president'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_key' => "auh key",
            'username' => 'Tên Công Ty',
            'name' => 'Tên Công Ty',
            'password_hash' => 'Password Hash',
            'president' => 'Chủ Tịch',
            'email' => 'Email',
            'date_establish' => 'Date Establish',
            'employee_count' => 'Số lượng nhân viên',
            'imageFile' => '',
            'cover_img' => 'Cover Img',
            'description' => 'Mô tả công việc',
            'gross_revenue' => 'Gross Revenue',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'address' => 'Địa chỉ',
        ];
    }

    public static function findIdentity($id)
    {

        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);

    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function BeforeSave($insert)
    {
        // add teacher
        if ($insert) {
            $this->generateAuthKey();
            $this->generatePasswordResetToken();
            $this->setPassword($this->password_hash);
        } else {
            // update teacher
            $old_user = Enterprise::findOne(($this->id));
            if ($this->imageFile == null) { // neu != password old thi ma hoa password dc update
                $this->imageFile = $old_user->imageFile;
            }
            if ($old_user->password_hash != $this->password_hash) { // neu != password old thi ma hoa password dc update
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
                $this->setPassword($this->password_hash);
            }
        }
        return parent::beforeSave($insert);
    }

    public function getImageEnterprise($id)
    {
        // lay organization_id doanh nghiep
        $organizationRequests = OrganizationRequests::findOne($id);
        $id = $organizationRequests->organization_id; //

        $enterprise = Enterprise::findOne($id);

        return Url::base(true) . '/../../uploads/' . $enterprise->imageFile; // getpathImg

    }
}
