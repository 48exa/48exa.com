<?php
include 'dbinfo.php';
class Database
{
  private static string $host = "";
  private static string $db_user = "";
  private static string $db_password = "";
  private static string $db_name = "";
  private static ?DBInfo $secrets = null;
  private static $db_connection = null;

  public function __construct()
  {
    self::$secrets = new DBInfo();

    self::$host = self::$secrets->host;
    self::$db_user = self::$secrets->db_user;
    self::$db_password = self::$secrets->db_password;
    self::$db_name = self::$secrets->db_name;
  }

  public function __destruct()
  {
    if (!is_null(self::$db_connection)) {
      self::$db_connection->close();
    }
  }

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

  public static function insert(string $message, string $name): bool
  {
    $sql = "INSERT INTO msg (message, user) VALUES (?, ?)";

    if (is_null(self::$db_connection)) {
      if (!self::connect()) {
        return false;
      }
    }

    if (!is_null(self::$db_connection)) {
      $stmt = self::$db_connection->prepare($sql);
      $stmt->bind_param("ss", $message, $name);
      $stmt->execute();
      $stmt->close();
    }

    return true;
  }

  public static function popUp(string $message): void
  {
    echo "<script>alert('$message');</script>";
  }

  public static function returnHome(): void
  {
    header("Location: /48exa.com/");
  }
}
