<?php
namespace app\models;

use yii\debug\models\search\Db;

class Event extends \yii\base\Object{

//    public $id;
//    public $name;
//    public $link;
//    public $category;
//    public $description;
//    public $address;

    public static function getEvents(){
        return \Yii::$app->db->createCommand('SELECT * FROM events')->queryAll();
    }

    public static function getEvent($id){
        return \Yii::$app->db->createCommand('SELECT * FROM events WHERE id=' . $id)->queryOne();
    }

    public static function save($data){
        if($data['id'] != ''){
            \Yii::$app->db->createCommand()->update('events', $data, 'id=' . $data['id'])->execute();
            return $data['id'];
        }
        else{
            \Yii::$app->db->createCommand()->insert('events', $data)->execute();
            return \Yii::$app->db->lastInsertID;
        }
    }
}