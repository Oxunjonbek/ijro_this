<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Company;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Tadbir;
// use Yii;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TadbirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тадбирлар';
$this->params['breadcrumbs'][] = $this->title;
// $user = Yii::$app->user->identity;
$files = [];
$user = Yii::$app->user->identity;
if (!Yii::$app->user->isGuest) {
    switch ($user->username) {
                // case 'admin':
                //     $company_id = '';
                //     break;
        case 'audit':
        $company_id = 18;
        break;

        case 'taxlil':
        $company_id = 8;
        break;
        case 'metrologiya':
        $company_id = 12;
        break;
        case 'reglament':
        $company_id = 10;
        break;
        case 'axborot':
        $company_id = 13;
        break;
        case 'standart':
        $company_id = 9;
        break;
        case 'sertifikat':
        $company_id = 15;
        break;
        case 'smk':
        $company_id = 16;
        break;
        case 'xalqaro':
        $company_id = 14;
        break;
        case 'integratsiya':
        $company_id = 11;
        break;
        case 'moliya':
        $company_id = 17;
        break;
        case 'bugalteriya':
        $company_id = 32;
        break;
        case 'yuridik':
        $company_id = 20;
        break;
        case 'kadr':
        $company_id = 19;
        break;
        case 'ijro':
        $company_id = 21;
        break;
        case 'pressa':
        $company_id = 30;
        break;
        case 'murojaat':
        $company_id = 22;
        break;
        case 'xo\'jalik':
        $company_id = 23;
        break;
        case 'smsiti':
        $company_id = 24;
        break;
        case 'uznim':
        $company_id = 25;
        break;
        case 'dep':
        $company_id = 26;
        break;
        case 'akkred':
        $company_id = 27;
        break;
        case 'barcode':
        $company_id = 28;
        break;
        case 'uztest':
        $company_id = 29;
        break;
        case 'antikorp':
        $company_id = 31;
        break;
    }
}
        // $model = new Tadbir();
        // $files = explode(',',$model->file);
        // echo "<pre>";
        // print_r($searchModel->files);
        // exit();
  // $place = \Yii::$app->request;
?>
<div class="tadbir-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Тадбир қушиш', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if($user->username=="admin"): ?>
       <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'company_id',
            [
                'attribute' => 'company_id',
                'format' => 'raw',
                'filter' => ArrayHelper::map(Company::find()->all(), 'id', 'company_name'),
        // 'filter' => ArrayHelper::map(Company::find()->where(['id'=>$company_id])->all()
                    // , 'id', 'company_name'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' =>
                [
                    'size' => Select2::SIZE_SMALL,
                    'options' => ['prompt' => 'Выберите'],
                    'pluginOptions' => ['allowClear' => true],
                ],
                'value'=>'company.company_name'
            ],
            // 'tadbir_name:ntext',
            [
                'attribute' => 'tadbir_name',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            // 'tadbir_content:ntext',
            [
                'attribute' => 'tadbir_content',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            // 'tadbir_result:ntext',
            [
                'attribute' => 'tadbir_result',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            [
                'attribute' => 'masullar',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            [
                'attribute' => 'tadbir_status',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],

            // 'tadbir_date',
            [
                'attribute' => 'tadbir_date',
        // 'format' => 'text',
                'format' => ['date', 'php:d-m-Y'],
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            // 'tadbir_description:ntext',
            [
                'attribute' => 'tadbir_description',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            [
                'attribute' => 'file',
                'format' => 'html',
             // 'format' => 'raw',
                'value' => function ($dataProvider) {

        // echo "<pre>";
        // print_r($dataProvider);
        // echo "</pre>";
        // exit();
        // $name[];
                    $name = explode(',', $dataProvider->file);
                    $count = count($name);
        // print_r($name);
        // exit();
                    if ($count > 1) {
                        for ($i=0; $i < count($name); $i++) { 
                           $file[] =
                           '<a href="'.\Yii::$app->request->baseUrl."/uploads/pdf/".$name[$i].'">'.$name[$i].'</a>';
                            // Html::a('site/index');
                       }
                       $sep_char = '/';
                       $str = implode($sep_char, $file);
                       return $str;

                   }
                   else{
                    if (!empty($dataProvider->file)) {

                        $file = '<a href="'.\Yii::$app->request->baseUrl."/uploads/pdf/".$dataProvider->file.'">'.$dataProvider->file.'</a>';;
                    return $file;
                    }
                    return '';


                }
            },
        ],
        // 'file',
    // [
    //     'attribute' => 'file',
    //     'format' => 'html',
    //     'filterInputOptions'=>['class' => 'form-control  input-sm'],
    // ],




        ['class' => 'yii\grid\ActionColumn',
        'template' => '{update}{view}{delete}',
        'buttons' => [
            'delete' => function ($url, $model) 
            {
                return Html::a(
                    '<span class="fa fa-trash" style="font-size:14px;padding:10px;"></span>', ['delete', 'id' => $model->id],
                    [
                        'data' => 
                        [
                            'method' => 'POST',
                            'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                            'pjax' => false
                        ],
                        'title' => 'Удалить',
                        'aria-label' => 'Удалить',
                        'style' => 'display: contents'
                    ]);
            },
            'view' => function ($url, $model) 
            {
                return Html::a('<span class="fa fa-eye" style="font-size:14px;"></span>', 
                    ['view', 'id' => $model->id], 
                    ['title' => 'Просмотр', 'aria-label' => 'Просмотр']);
            }
        ],
    ],

],
]); ?>
<?php else: ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'company_id',
            [
                'attribute' => 'company_id',
                'format' => 'raw',
        // 'filter' => ArrayHelper::map(Company::find()->all(), 'id', 'company_name'),
                'filter' => ArrayHelper::map(Company::find()->where(['id'=>$company_id])->all()
                    , 'id', 'company_name'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' =>
                [
                    'size' => Select2::SIZE_SMALL,
                    'options' => ['prompt' => 'Выберите'],
                    'pluginOptions' => ['allowClear' => true],
                ],
                'value'=>'company.company_name'
            ],
            // 'tadbir_name:ntext',
            [
                'attribute' => 'tadbir_name',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            // 'tadbir_content:ntext',
            [
                'attribute' => 'tadbir_content',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            // 'tadbir_result:ntext',
            [
                'attribute' => 'tadbir_result',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            [
                'attribute' => 'masullar',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            [
                'attribute' => 'tadbir_status',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],

            // 'tadbir_date',
            [
                'attribute' => 'tadbir_date',
                'format' => 'text',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
            // 'tadbir_description:ntext',
            [
                'attribute' => 'tadbir_description',
                'format' => 'html',
                'filterInputOptions'=>['class' => 'form-control  input-sm'],
            ],
    // [
    //     'attribute' => 'file',
    //     'format' => 'raw',
        // 'filter' => 
        // 'filter' => ArrayHelper::map(Company::find()->where(['id'=>$company_id])->all()
                    // , 'id', 'company_name'),
        // 'filterInputOptions'=>['class' => 'form-control  input-sm'],
        // 'filterType' => GridView::FILTER_SELECT2,
        // 'filterWidgetOptions' =>
        // [
        //     'size' => Select2::SIZE_SMALL,
        //     'options' => ['prompt' => 'Выберите'],
        //     'pluginOptions' => ['allowClear' => true],
        // ],
        // 'value'=>'company.company_name'
    // ],
            // [
            //     'attribute' => 'file',
            //     'format' => 'html',
            //     'filterInputOptions'=>['class' => 'form-control  input-sm'],
            // ],
            [
                'attribute' => 'file',
                'format' => 'html',
             // 'format' => 'raw',
                'value' => function ($dataProvider) {

        // echo "<pre>";
        // print_r($dataProvider);
        // echo "</pre>";
        // exit();
        // $name[];
                    $name = explode(',', $dataProvider->file);
                    $count = count($name);
        // print_r($name);
        // exit();
                    if ($count > 1) {
                        for ($i=0; $i < count($name); $i++) { 
                           $file[] =
                           '<a href="'.\Yii::$app->request->baseUrl."/uploads/pdf/".trim($name[$i]).'">'.$name[$i].'</a><br>';
                            // Html::a('site/index');
                       }
                       $sep_char = '<br>';
                       $str = implode($sep_char, $file);
                       return $str;

                   }
                   else{
                    if (!empty($dataProvider->file)) {

                        $file = '<a href="'.\Yii::$app->request->baseUrl."/uploads/pdf/".$dataProvider->file.'">'.$dataProvider->file.'</a>';;
                    return $file;
                    }
                    return '';


                }
            },
        ],

            
            

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}{view}{delete}',
            'buttons' => [
                'delete' => function ($url, $model) 
                {
                    return Html::a(
                        '<span class="fa fa-trash" style="font-size:14px;padding:10px;"></span>', ['delete', 'id' => $model->id],
                        [
                            'data' => 
                            [
                                'method' => 'POST',
                                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                                'pjax' => false
                            ],
                            'title' => 'Удалить',
                            'aria-label' => 'Удалить',
                            'style' => 'display: contents'
                        ]);
                },
                'view' => function ($url, $model) 
                {
                    return Html::a('<span class="fa fa-eye" style="font-size:14px;"></span>', 
                        ['view', 'id' => $model->id], 
                        ['title' => 'Просмотр', 'aria-label' => 'Просмотр']);
                }
            ],
        ],

    ],
]); ?>
<?php endif; ?>

</div>
