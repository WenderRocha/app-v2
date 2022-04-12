<?php

class Transaction
{

  private function __construct(){}
  private function __clone(){}

private static $conn;

    /**
     * @throws Exception */
    public static function open($database)
  {
      self::$conn = Connection::open($database);
      self::$conn->beginTransaction();
  }

  public static function close()
  {
      if(self::$conn) {

          self::$conn->commit();
          self::$conn = null;
      }

  }

  public static function get()
  {
      return self::$conn;
  }

  public static function rollback()
  {
      if(self::$conn) {
          self::$conn->rollback();
          self::$conn = null;
      }

  }

}
