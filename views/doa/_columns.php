<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    //     [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_doa',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'judul_doa',
        'vAlign'=>'middle',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'gambar_doa',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' => 'gambar_doa',
        'format' => 'html',    
        'value' => function ($data) {
            return Html::img(Yii::getAlias('@web').'/gambar/doa/'. $data['gambar_doa'],
                ['width' => '100px', 'height' => '100%']);
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'deskripsi_doa',
        'vAlign'=>'middle',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   