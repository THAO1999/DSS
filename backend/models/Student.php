<?php

namespace backend\models;

use frontend\models\StudentSkillProfile;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $date_of_birth
 * @property string|null $class_name
 * @property string|null $imageFile
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *  @property string|null $address
 * @property int|null $phone
 * @property StudentRegistration[] $studentRegistrations
 * @property EnterpriseRecruitmentRequestForm[] $requests
 * @property StudentSkillProfile[] $studentSkillProfiles
 * @property AblityDictionary[] $abilities
 */
class Student extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email'], 'required'],
            // [['date_of_birth', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'phone', 'class_name', 'address'], 'string', 'max' => 255], // da tung loi day ,"adress,phone"
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Tên sinh viên',
            'auth_key' => 'Khoá xác thực',
            'password_hash' => 'Băm mật khẩu',
            'password_reset_token' => 'Mã đặt lại mật khẩu',
            'email' => 'Email',
            'date_of_birth' => 'Ngày sinh',
            'class_name' => 'Tên lớp',
            'imageFile' => 'Hình ảnh tệp',
            'status' => 'Trạng thái',
            'created_at' => 'Được tạo lúc',
            'updated_at' => 'Cập nhật lúc',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
        ];
    }

    /**
     * Gets query for [[StudentRegistrations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentRegistrations()
    {
        return $this->hasMany(StudentRegistration::className(), ['student_id' => 'id']);
    }

    // relaton sll

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(EnterpriseRecruitmentRequestForm::className(), ['id' => 'request_id'])->viaTable('student_registration', ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentSkillProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSkillProfiles()
    {
        return $this->hasMany(StudentSkillProfile::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[Abilities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAbilities()
    {
        return $this->hasMany(AblityDictionary::className(), ['id' => 'ability_id'])->viaTable('student_skill_profile', ['student_id' => 'id']);
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
            // update Student
            $old_user = Student::findOne(($this->id));
            if ($old_user->password_hash != $this->password_hash) { // neu != password old thi ma hoa password dc update

            }
            if ($old_user->password_hash != $this->password_hash) { // neu != password old thi ma hoa password dc update
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
                $this->setPassword($this->password_hash);
            }
        }
        return parent::beforeSave($insert);
    }
    public function getImageStudent($id)
    {
        // lay organization_id doanh nghiep
        $student = Student::findOne($id);

        return Url::base(true) . '/../uploads/' . $student->imageFile; // getpathImg

    }
  

}
