<?php
require_once("db_secret.php");
class Database
{
  public static string $host = "";
  public static string $db_user = "";
  public static string $db_password = "";
  public static string $db_name = "";

  public function __construct()
  {
    self::$host = dbinfo::$host;
    self::$db_user = dbinfo::$db_user;
    self::$db_password = dbinfo::$db_password;
    self::$db_name = dbinfo::$db_name;
  }

  public static function test()
  {
    die(dbinfo::$host);
  }

  private static $db_connection = null;

  private static function connect(): bool
  {
    try {
      self::$db_connection = new mysqli(self::$host, self::$db_user, self::$db_password, self::$db_name);
    } catch (Exception $e) {
      return false;
    }
    return true;
  }

  public static function get(): array | string
  {
    $result = [];
    $query_buffer = [];
    $sql = "SELECT * FROM msg";

    if (is_null(self::$db_connection)) {
      if (!self::connect()) {
        return "Failed to connect to the database.";
      }
    }

    if (!is_null(self::$db_connection)) {
      $query_buffer = self::$db_connection->query($sql);
      if ($query_buffer->num_rows > 0) {
        while ($row = $query_buffer->fetch_assoc()) {
          array_push($result, $row);
        }
      } else {
        return "No messages found.";
      }
    }

    return $result;
  }
}
