<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answer_application".
 *
 * @property int $id
 * @property int $question
 * @property string $text_answer
 * @property int $user_to
 * @property int $user_from
 *
 * @property User $userTo
 * @property User $userFrom
 * @property Application $question0
 */
class AnswerApplication extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer_application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'text_answer', 'user_to', 'user_from'], 'required'],
            [['question', 'user_to', 'user_from'], 'integer'],
            [['text_answer'], 'string'],
            [['user_to'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_to' => 'id']],
            [['user_from'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_from' => 'id']],
            [['question'], 'exist', 'skipOnError' => true, 'targetClass' => Application::className(), 'targetAttribute' => ['question' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'text_answer' => 'Text Answer',
            'user_to' => 'User To',
            'user_from' => 'User From',
        ];
    }
    
    public function sendMail()
    {
        Yii::$app->mailer->compose()
                //->setFrom(['vlad.shoot@inbox.ru' => 'Ответ на заявку'])
                ->setTo($this->userTo->email)
                ->setSubject($this->question0->description)
                ->setTextBody($this->text_answer)
                ->setHtmlBody($this->text_answer)
                ->send();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTo()
    {
        return $this->hasOne(User::className(), ['id' => 'user_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFrom()
    {
        return $this->hasOne(User::className(), ['id' => 'user_from']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion0()
    {
        return $this->hasOne(Application::className(), ['id' => 'question']);
    }
}
