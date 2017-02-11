<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'controllerMap' => [
        'file' => 'mdm\upload\FileController', // use to show or download file
    ],
];
