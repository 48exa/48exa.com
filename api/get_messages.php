<?php
include '../database/database.php';

$db = new Database();

$result;

try {
  $result = $db->get();
} catch (Exception $e) {
  die("Error: " . $e->getMessage());
}

die(json_encode($result));
