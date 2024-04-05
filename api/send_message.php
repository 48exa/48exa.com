<?php
include '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['SERVER_NAME'] != 'localhost') {

  $message = $_POST['msg'];
  $name = $_POST['username'];

  // Check if fields are empty
  if (empty($message) || empty($name)) {
    echo "<script>alert('Please fill out all fields.');</script>";
    echo "<script>window.location.href = '../';</script>";
    exit;
  }

  // Check if the message is longer than 50 characters
  if (strlen($message) < 3) {
    echo "<script>alert('Your message has to be over 3 characters long.');</script>";
    echo "<script>window.location.href = '../';</script>";
    exit;
  }

  // Check if the username is longer than 15 characters
  if (strlen($name) < 3) {
    echo "<script>alert('Your username has to be over 3 characters long.');</script>";
    echo "<script>window.location.href = '../';</script>";
    exit;
  }

  session_start();

  // Check if the user has sent a message in the last 10 seconds
  if (isset($_SESSION['last_message_time']) && $_SESSION['last_message_time'] > time() - 10) {
    echo "<script>alert('You can only send a message every 10 seconds.');</script>";
    echo "<script>window.location.href = '../';</script>";
    exit;
  }

  // Set the current time as the last message time
  $_SESSION['last_message_time'] = time();

  // Sanitize input
  $message = htmlspecialchars($message, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  $name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');

  $db = new Database();
  $db->insert($message, $name);
  Database::returnHome();
}
