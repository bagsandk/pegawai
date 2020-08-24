<?php

include __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/ta-ptpn7-firebase-adminsdk-kp7hn-b4834f69dd.json');
$firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://ta-ptpn7.firebaseio.com/')->create();

$database = $firebase->getDatabase();
