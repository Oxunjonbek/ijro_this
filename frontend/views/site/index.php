<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use marekpetras\calendarview\CalendarView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Календар';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-index">

    <!-- <h1> -->
        <?php // Html::encode($this->title) ?>
            
        <!-- </h1> -->

    <!-- <p> -->
        <?php //= Html::a('Create Calendar', ['create'], ['class' => 'btn btn-success']) ?>
    <!-- </p> -->

    <?php echo CalendarView::widget(
    [
        // mandatory
        'dataProvider'  => $dataProvider,
        'dateField'     => 'date',
        'valueField'    => 'val',
        // 'tadbir_id'     =>'tadbir_id',


        // optional params with their defaults
        'weekStart' => 2, // date('w') // which day to display first in the calendar
        'title'     => 'Календар',

        'views'     => [
            'calendar' => '@vendor/marekpetras/yii2-calendarview-widget/views/calendar',
            'month' => '@vendor/marekpetras/yii2-calendarview-widget/views/month',
            'day' => '@vendor/marekpetras/yii2-calendarview-widget/views/day',
        ],

        'startYear' => date('Y') - 1,
        'endYear' => date('Y') + 1,

        'link' => false,
         // alternates to link , is called on every models valueField, used in Html::a( valueField , link )
        'link' => 'site/view',
        'link' => function($model,$calendar){
            return ['calendar/view','id'=>$model->id];
        },
        

        'dayRender' => false,
         // alternate to dayRender
        'dayRender' => function($model,$calendar) {
            return '<p>'.$model->id.'</p>';
        },
        

    ]
);?>

    <?php 
    //  echo GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],

    //         'id',
    //         'date',
    //         'val',
    //         'tadbir_id',

    //         ['class' => 'yii\grid\ActionColumn'],
    //     ],
    // ]);
     ?>


</div>
