<?php
namespace api\modules\v1\controllers;

use api\modules\v1\models\forms\LoginForm;

class UsersController extends BaseController
{
    public $modelClass = 'api\modules\v1\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = ['login'];
        return $behaviors;
    }

    /**
     * @OA\Post(
     *     path="/v1/users/login",
     *     operationId="actionV1Login",
     *     summary="Login as user",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="username",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"username": "test", "password": "test"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/v1User")
     *         )
     *     )
     * )
     */

    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') 
            && $user = $model->login()
        ) {
            return $user;
        } else {
            $model->validate();
            return $model;
        }
    }
}