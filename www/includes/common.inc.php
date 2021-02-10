<?PHP
  /**
   * Base configuration information required by all scripts. 
   */

  /** 
   * block attempts to directly run this script
   */
  
  if (getcwd() == __DIR__) 
  {
    die('Attack stopped');
  }

  /**
   * Minimum PHP version;
   * Scripts were developed and tested using PHP 7.4.14.
   */
  
  if (PHP_VERSION_ID < 70414) {
    die(
        '<p>PHP 7.4.14+ is required.</p>'
        . '<p>Currently installed version is: ' . PHP_VERSION . '</p>'
    );
  }

  /**
   * Defining path to db libraries
   */
  define('DB_LIB_PATH', ROOT_PATH . 'db' . DIRECTORY_SEPARATOR );
  
  include (DB_LIB_PATH . "moad.inc.php")


?>