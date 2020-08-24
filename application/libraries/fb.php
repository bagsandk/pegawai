<?php

require_once './includes/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class fb
{
    private function firebase()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/ta-ptpn7-firebase-adminsdk-kp7hn-b4834f69dd.json');
        return (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://ta-ptpn7.firebaseio.com/')->create();
    }
    public function db()
    {
        return $this->firebase()->getDatabase();
    }
    public function auth()
    {
        return $this->firebase()->getAuth();
    }
}
