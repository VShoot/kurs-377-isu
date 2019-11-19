<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Application;
use app\models\AnswerApplication;
use yii\data\Pagination;

class SystemController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Application::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $application = $query->orderBy('date')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',[
            'application' => $application,
            'pagination' => $pagination
        ]);
    }

    public function actionAnswer(){

        $model = new AnswerApplication();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // \Yii::debug($model-> );
            $model->sendMail();
            $model->save();
            Yii::$app->session->setFlash('success',"Ответ отправлен");
       } 
        return $this->render('answer',compact('model'));
    }
    public function actionAddappl(){

        $add = new Application();
        if ($add->load(Yii::$app->request->post()) && $add->validate()) {
            $add->save();
            Yii::$app->session->setFlash('success',"Заявка отправлена");
       } 
        return $this->render('addappl',compact('add'));
    }
    
    public function actionDelete($id){
    Application::findOne($id)->delete();
    return $this->redirect(['index']);
}
}
