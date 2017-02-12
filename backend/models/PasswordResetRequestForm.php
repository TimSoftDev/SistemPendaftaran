<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Admin;

class PasswordResetRequestForm extends Model
{
    public $email;    
    public $verifyCode;


    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\Admin',
                'filter' => ['status' => Admin::STATUS_ACTIVE],
                'message' => 'There is no user with this email address.'
            ],
            ['verifyCode', 'captcha'],
        ];
    }

    public function sendEmail()
    {
        $user = Admin::findOne([
            'status' => Admin::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!Admin::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();
    }
}
