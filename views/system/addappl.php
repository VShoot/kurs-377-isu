<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = '';
?>
<div class="box">

    <div class="box-header with-border">
        <h3>Добавление заявки</h3>

    <?php echo Html::tag("td", Html::tag("a", "Назад", ["class"=>"btn btn-primary","href"=>Url::toRoute('system/index'),]));?>

    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($add, 'id_user')->label('Имя') ?>

    <?= $form->field($add, 'topic')->label('Тема') ?>

    <?= $form->field($add, 'description')->label('Описание') ?>



    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        
        
    </div>

<?php ActiveForm::end(); ?>