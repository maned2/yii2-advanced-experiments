<?php
namespace api\modules\v1\controllers;

/**
 * Test controller
 */
class TestsController extends BaseController
{
    public $modelClass = false;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = ['public'];
        return $behaviors;
    }

    public function actionPublic()
    {
        return 'public test success';
    }

    public function actionPrivate()
    {
        return 'private test success';
    }
}