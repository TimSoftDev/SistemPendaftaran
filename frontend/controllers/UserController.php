<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use yii\helpers\Json;

use \DateTime;


class UserController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfil()
    {
        return $this->render('profil');
    }

    public function actionJsoncalendar($start=NULL,$end=NULL,$_=NULL){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $events = array();
        
        //Demo
        $Event = new \yii2fullcalendar\models\Event();
        $Event->id = 1;
        $Event->title = 'Testing';
        $Event->start = date('Y-m-d\TH:m:s\Z');
        $events[] = $Event;
        $Event = new \yii2fullcalendar\models\Event();
        $Event->id = 2;
        $Event->title = 'Testing';
        $Event->start = date('Y-m-d\TH:m:s\Z',strtotime('tomorrow 8am'));
        $events[] = $Event;
        $event3 = new DateTime('+2days 10am');
        $Event = new \yii2fullcalendar\models\Event();
        $Event->id = 2;
        $Event->title = 'Testing';
        $Event->start = $event3->format('Y-m-d\Th:m:s\Z');
        $Event->end = $event3->modify('+3 hours')->format('Y-m-d\TH:m:s\Z');
        $events[] = $Event;
        header('Content-type: application/json');
        echo Json::encode($events);
        Yii::$app->end();
    }
}
