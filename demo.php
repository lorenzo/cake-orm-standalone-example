<?php

use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require 'vendor/autoload.php';

ConnectionManager::config('default', ['url' => 'sqlite:///bookmarkr.db?log=true']);
Log::config('default', function () {
    $log = new Logger('cli');
    $log->pushHandler(new StreamHandler('php://stdout'));
    return $log;
});

$table = TableRegistry::get('Bookmarks');
$bookmarks = $table->find()->toArray();
echo sprintf("Found %d bookmarks", count($bookmarks));
