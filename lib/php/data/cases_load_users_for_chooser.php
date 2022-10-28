<?php
require_once dirname(__FILE__) . '/../../../db.php';

$_POST = json_decode(file_get_contents("php://input"), true);
$case_id = $_POST['case_id'];

function load_user_list($dbh)
{
  $user_list_query = $dbh->prepare("SELECT * from cm_users where status='active' ORDER BY last_name asc");

  $user_list_query->execute();

  $user_list_data = $user_list_query->fetchAll();

  $users = NULL;

  foreach ($user_list_data as $user) {

    $users .= "<option value='" . $user['username'] . "'>" . $user['first_name'] . " " . $user['last_name'] . "</option>";
  }

  return $users;
}
$users = load_user_list($dbh);
echo $users;
