<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = '';
?>
<div class="box">

    <div class="box-header with-border">
        <h3>Ответ</h3>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_to')->label('Для кого') ?>

    <?= $form->field($model, 'user_from')->label('От кого') ?>

    <?= $form->field($model, 'question')->label('Вопрос') ?>

    <?= $form->field($model, 'text_answer')->label('Текст сообщения')?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::tag("td", Html::tag("a", "Вернуться", ["class"=>"btn btn-primary","href"=>Url::toRoute('system/index'),]));
        ?>
        
    </div>

<?php ActiveForm::end(); ?>

