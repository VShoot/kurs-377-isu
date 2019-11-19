<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = '';
?>
<div class="box">

    <div class="box-header with-border">
        <h3>Система заявок</h3>
        <?php echo Html::tag("td", Html::tag("a", "Написать", ["class"=>"btn btn-primary","href"=>Url::toRoute('system/addappl'),]));?>
       
    </div>

            <div class="box-body">
            <div class="col-sm-12">
            <table class="table table-bordered table-hover dataTable">
        <thead>
            <tr class="application">
            <th class="sorting_asc">От кого</th>
            <th class="sorting_asc">Тема</th>
            <th class="sorting_asc">Описание</th>
            <th class="sorting_asc">Дата</th>
            </tr>
        </thead>
            <tbody>
            <?php foreach ($application as $appl) :?>
            <tr class="application">
            <td><?=$appl->user->username?></td>
            <td><?=$appl->topic?></td>
            <td><?=$appl->description?></td>
            <td><?=$appl->date?></td>

            <?php echo Html::tag("td", Html::tag("a", "Ответить", ["class"=>"btn btn-primary","reserv","href"=>Url::toRoute('system/answer?id=' . $appl->id),])); ?>

             <?php echo Html::tag("td", Html::tag("a", "Удалить", ["class"=>"btn btn-primary","href"=>Url::toRoute('system/delete?id=' . $appl->id),]));?>
 

                    <?php
                endforeach;
                    ?>
            </tbody>
     </table>
     <?php
     echo LinkPager::widget([
        'pagination' => $pagination,
        'linkContainerOptions'=>['class'=>'page-item'],
        'linkOptions'=>['class'=>'page-link'],
        'firstPageCssClass' => '',
        'lastPageCssClass' => '',
        'prevPageCssClass' => '',
        'nextPageCssClass'=> '',
    ]);
     ?>
            </div>
    </div>
</div>



<style>
    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #f4f4f4;
    position: relative;
    padding: 2rem;
}
    .application {

    }
</style>
