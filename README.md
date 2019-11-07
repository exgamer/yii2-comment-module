# concepture_engine

Модуль с реализацией комментов к сущностям

    
Подключение

"require": {
    "concepture/yii2-comment-module" : "*"
},
    

Миграции
 php yii migrate/up --migrationPath=@concepture/yii2comment/console/migrations
 
Подключение модуля для админки

     'modules' => [
         'comment' => [
             'class' => 'concepture\yii2comment\Module'
         ],
     ],