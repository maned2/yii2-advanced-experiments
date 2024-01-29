<?php
/**
 * V1 module of api
 */
namespace api\modules\v1;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Документация",
 * )
 */

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();

        //\Yii::configure($this, require __DIR__ . '/config.php');
    }
}