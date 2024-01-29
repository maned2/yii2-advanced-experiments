<?php

namespace api\modules\v1\models\forms;

use yii\base\Model;

use common\models\LoginForm as CommonLoginForm;
use api\modules\v1\models\User;

class LoginForm extends CommonLoginForm
{
    private $_user = null;
    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            if (\Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0)) {
                $user = $this->getUser();
                $user->generateAccessToken();
                $user->save();
                return $user;
            }
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
