<?php

namespace app\controllers;

use app\models\Event;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionEvents(){

        $events = Event::getEvents();

        return $this->render('events/list', ['events' => $events]);
    }

    public function actionEvent($id = null){

        $event = null;

        if($id) $event = Event::getEvent($id);

        return $this->render('events/add', ['event' => $event]);

    }

    public function actionEventsave(){


        $_POST['startDate'] = $_POST['startDate'] . '-' . $_POST['startMonth'] . '-' . $_POST['startYear'] . ' ' . $_POST['startHour'] . ':' . $_POST['startMinutes'];
        unset($_POST['startMonth']);
        unset($_POST['startYear']);
        unset($_POST['startHour']);
        unset($_POST['startMinutes']);
        if($_POST['setFinish'] == 1){
            $_POST['finishDate'] = $_POST['endDate'] . '-' . $_POST['endMonth'] . '-' . $_POST['endYear'] . ' ' . $_POST['endHour'] . ':' . $_POST['endMinutes'];
        }
        unset($_POST['endDate']);
        unset($_POST['endMonth']);
        unset($_POST['endYear']);
        unset($_POST['endHour']);
        unset($_POST['endMinutes']);
        unset($_POST['setFinish']);
        unset($_POST['_csrf']);

        $event = Event::save($_POST);

        return $this->redirect('/admin/event/' . $event);
    }


}
