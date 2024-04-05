<?php
session_start();
include '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['SERVER_NAME'] != 'localhost') {

  $message = $_POST['msg'];
  $name = $_POST['username'];

  // Check if fields are empty
  if (empty($message) || empty($name)) {
    echo "<script>alert('Please fill out all fields.'); window.location='/48exa.com'</script>";
    exit;
  }

  // Check if the message is longer than 50 characters
  if (strlen($message) > 50) {
    die("Your message can only be 50 characters long.");
  }

  // Check if the username is longer than 15 characters
  if (strlen($name) > 15) {
    die("Your username can only be 15 characters long.");
  }

  // Check if the user has sent a message in the last 10 seconds
  if (isset($_SESSION['last_message_time']) && $_SESSION['last_message_time'] > time() - 10) {
    die("You can only send a message every 10 seconds.");
  }

  // Sanitize input
  $message = htmlspecialchars($message, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  $name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');

  $db = new Database();
  $db->insert($message, $name);
  Database::returnHome();
}
