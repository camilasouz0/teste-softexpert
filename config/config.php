<?php

namespace Config;
define("DB_CONNECTION", "pgsql");
define("DB_HOST", "db");
define("DB_PORT", "5432");
define("DB_DATABASE", "mydb");
define("DB_USERNAME", "postgres");
define("DB_PASSWORD", "postgres");

//site name
define('SITE_NAME', 'softexpert');

//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '');
define("VIEWS_PATH", "./../");
define('SITE_HOST', 'http://teste-softexpert.test/');

error_reporting(E_ALL & ~E_STRICT & ~E_DEPRECATED);
class Config {
   public function __construct(){   }

   public function getConf() {
      return SITE_HOST;
   }
}