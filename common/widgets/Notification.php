<?php


namespace app\widgets;


use app\components\Helpers;
use yii\base\Widget;

class Notification extends Widget
{

    public $role_id;
    public $user_id;


    public function init()
    {
        parent::init();


    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub

        return $this->render('notification');
    }
}
