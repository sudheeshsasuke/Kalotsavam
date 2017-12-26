<?php

session_start();

require_once 'model.php';
require_once 'controller.php';

//$_SESSION['admin']

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($uri == '/') {
  include 'templates/homepage.tpl.php';
}
elseif ($uri == '/index.php/user_register_form') {
  include 'templates/user_registartion.tpl.php';
}
elseif ($uri == '/index.php/user_login_form') {
  include 'templates/user_login.tpl.php';
}
elseif ($uri == '/index.php/admin_login_form') {
  include 'templates/admin_login.tpl.php';
}
elseif ($uri == '/index.php/login_admin') {
  login_admin();
}
elseif ($uri == '/index.php/register_user') {
  register_user();
}
elseif ($uri == '/index.php/register_compeptition') {
  register_compeptition();
}
elseif ($uri == '/index.php/register_compeptition_action') {
  register_compeptition_action();
}
elseif ($uri == '/index.php/logout') {
  logout();
}
elseif ($uri == '/index.php/set_avg_score') {
  set_avg_score_db();
}
elseif ($uri == '/index.php/list_of_compeptitions') {
  list_of_compeptitions();
}
elseif ($uri == '/index.php/list_of_categories') {
  list_of_categories();
}
elseif ($uri == '/index.php/Over_all_Score_Board') {
  if(isset($_SESSION['admin'])) {
    over_all_score_board();
  }
  else {
    echo "<h1>You need to log in as admin to access this page</h1>";
  }
}
elseif ($uri == '/index.php/Candidate_Score_Board_form') {
  if(isset($_SESSION['admin'])) {
    Candidate_Score_Board_form();
  }
  else {
    echo "<h1>You need to log in as admin to access this page</h1>";
  }
}
elseif ($uri == '/index.php/Candidate_Score_Board_action') {
  Candidate_Score_Board_action();
}
elseif ($uri == '/index.php/enter_score_form') {
   if(isset($_SESSION['judge'])) { 
    enter_score_form();
  }
  else {
    echo "<h1>You need to log in as judge to access this page</h1>";
  }
}
elseif ($uri == '/index.php/enter_mark_action') {
  enter_mark_action();
}
elseif ($uri == '/index.php/competiton_socre_list') {
  competiton_socre_list();
}
else {
  echo "<h1>OOPS! ERROR!</h2>";
}
?>