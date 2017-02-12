<?php
namespace backend\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\Admin;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;

    private $_admin;


    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Password reset token cannot be blank.');
        }
        $this->_admin = Admin::findByPasswordResetToken($token);
        if (!$this->_admin) {
            throw new InvalidParamException('Wrong password reset token.');
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function resetPassword()
    {
        $admin = $this->_admin;
        $admin->setPassword($this->password);
        $admin->removePasswordResetToken();

        return $admin->save(false);
    }
}
