<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $status
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property int|null $password_change_count
 * @property int|null $login_count
 * @property string|null $last_login
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $current_password;
    public $new_password;
    public $repeat_new_password;

    use \app\common\traits\Signature;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['password_change_count', 'login_count'], 'integer'],
            [['last_login', 'created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'password', 'role', 'status', 'auth_key', 'access_token', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'password_change_count' => 'Password Change Count',
            'login_count' => 'Login Count',
            'last_login' => 'Último Acceso',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
            'current_password' => 'Clave Actual',
            'new_password' => 'Clave Nueva',
            'repeat_new_password' => 'Repita su Clave Nueva'
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($pwd)
    {
        return Yii::$app->getSecurity()->validatePassword($pwd, $this->password);
    }

    public function validateChangePassword($pwd, $new_pwd, $rep_pwd)
    {
        if (!$this->validatePassword($pwd))
            return false;

        if ($pwd == $new_pwd)
            return false;

        if ($new_pwd != $rep_pwd)
            return false;

        return true;
    }
    
}
