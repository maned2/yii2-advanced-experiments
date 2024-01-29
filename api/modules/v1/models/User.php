<?php
namespace api\modules\v1\models;

use common\models\User as CommonUser;

/**
 *  @OA\Schema(
 *      schema="v1User",
 *      type="object",
 *      title="Пользователь системы",
 *      description="Пользователь системы",
 * 
 *      @OA\Property(
 *          property="id",
 *          type="number",
 *          description="id пользователя"
 *      ),
 *      @OA\Property(
 *          property="userName",
 *          type="string",
 *          description="Имя пользователя"
 *      ),
 *      @OA\Property(
 *          property="email",
 *          type="string",
 *          description="Электронная почта пользователя"
 *      ),
 *      @OA\Property(
 *          property="status",
 *          type="number",
 *          description="текущий статус"
 *      ),
 *      @OA\Property(
 *          property="accessToken",
 *          type="string",
 *          description="Авторизационный токен. Возвращается только для текущего пользователя"
 *      ),
 *      
 *  )
 */

class User extends CommonUser
{
    public function fields()
    {
        return [
            'id',
            'userName' => 'username',
            'email',
            'status',
            'accessToken' => function () {
                if ($this->id === \Yii::$app->user->id) {
                    return $this->access_token;
                } else {
                    return null;
                }
            }
        ];
    }

    

    // public function extraFields() {}
}