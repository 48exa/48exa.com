<?php
require_once("../database/database.php");
require_once("../database/db_secret.php");

$db = new Database();

$result;

try {
  $result = $db->get();
} catch (Exception $e) {
  die("Error: " . $e->getMessage());
}

die(json_encode($result));
