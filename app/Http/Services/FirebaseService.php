<?php
namespace App\Http\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
class FirebaseService
{
    protected $database;

    public function __construct()
    {
        $this->database = app('firebase.database');
    }

    public function getDatabase()
    {
        return $this->database;
    }
}
