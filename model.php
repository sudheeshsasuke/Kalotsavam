<?php

function open_db_connection() {
    
  $host = "localhost";
  $dbname = "kalotsavam";
  $username = "root";
  $password = "root";
  $link = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  return $link;
}

function close_db_connection ($link) {

  $link = null;
}

function register_user_db() {

  $link = open_db_connection();
  $query = "INSERT INTO `participant`(`name`, `email`)"
  . " VALUES (:name, :email)";
  $result = $link->prepare($query);
  $result->bindParam(':name', $_POST['user_name']);
  $result->bindParam(':email', $_POST['user_email']);
  $result->execute();
  close_db_connection($link);
}

function verify_admin_login() {

  $link = open_db_connection();
  $query = "SELECT COUNT(*) FROM `admin` "
  . "WHERE `username`=:name AND `password`=:passowrd AND `type`='admin'";
  $result = $link->prepare($query);
  $result->bindParam(':name', $_POST['admin_name']);
  $result->bindParam(':passowrd', $_POST['admin_password']);
  $result->execute();
  $row = $result->fetch(PDO::FETCH_ASSOC);
  if ($row['COUNT(*)'] > 0) {
    $_SESSION['admin'] = $_POST['admin_name'];
    header('location:http://kalotsavam.local/');
  }
  else {
    $query = "SELECT COUNT(*) FROM `admin` "
    . "WHERE `username`=:name AND `password`=:passowrd AND `type`='judge'";
    $result = $link->prepare($query);
    $result->bindParam(':name', $_POST['admin_name']);
    $result->bindParam(':passowrd', $_POST['admin_password']);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row['COUNT(*)'] > 0) {
      $_SESSION['judge'] = $_POST['admin_name'];
      header('location:http://kalotsavam.local/');
    }
    else {
      echo "<h1>Invalid username or password</h2>";
    }
  }
}

function list_of_compeptitions_db() {

  $link = open_db_connection();
  $query = "SELECT * FROM `competition`";
  $result = $link->query($query);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $list[] = $row;
  }
  return $list;
}

function register_compeptition_action_db() {

  $link = open_db_connection();
  $query = "INSERT INTO `participant_competition`(`part_id`, `comp_id`)"
  . " VALUES ()";
  $result = $link->prepare($query);
  $result->bindParam(':name', $_POST['admin_name']);
  $result->bindParam(':passowrd', $_POST['admin_password']);
  $result->execute();
}

function set_avg_score_db() {

  $link = open_db_connection();

  // get all participants from participant_competition
  $query = "SELECT * FROM `participant_competition`";
  $result = $link->query($query);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $participants[] = $row;
  }

  foreach ($participants as $participant) {

    // get avg score
    $query = "SELECT SUM(j.score) AS sum, COUNT(*) AS count FROM `participant_competition` AS pc "
    . " JOIN `judge_score` AS j "
    . " ON j.chess_no=pc.chess_no "
    . " WHERE pc.part_id=:part_id";
    $result = $link->prepare($query);
    $result->bindParam(':part_id', $participant['part_id']);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $score = $row['sum'] / $row['count'];

    // set avg score in score table and part score table if and only if
    // there is no duplicate entry before
    $query = "SELECT COUNT(*) FROM `participant_score` "
    . "WHERE `part_id`=:part_id AND `comp_id`=:comp_id";
    $result = $link->prepare($query);
    $result->bindParam(':part_id', $participant['part_id']);
    $result->bindParam(':comp_id', $participant['comp_id']);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row['COUNT(*)'] > 0) {
      return;
    }
    else {
      $query = "INSERT INTO `participant_score`(`part_id`, `comp_id`, `score`)"
      . " VALUES (:part_id, :comp_id, :score)";
      $result = $link->prepare($query);
      $result->bindParam(':part_id', $participant['part_id']);
      $result->bindParam(':comp_id', $participant['comp_id']);
      $result->bindParam(':score', $score);
      $result->execute();
    }
  }
}

function list_of_categories_db() {

  $link = open_db_connection();
  $query = "SELECT * FROM `category`";
  $result = $link->query($query);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $list[] = $row;
  }
  return $list;
}


function get_all_score_db() {

  $link = open_db_connection();
  $query = "SELECT p.name as name, ps.score as score FROM `participant_score` AS ps "
  . " JOIN `participant` AS p ON p.id=ps.part_id "
  . " ORDER By score DESC";
  $result = $link->query($query);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $list[] = $row;
  }
  return $list;
}

function get_candidates() {

  $link = open_db_connection();
  $query = "SELECT p.name AS name, p.id AS id FROM `participant_competition`"
  . " AS pc JOIN `participant` AS p ON p.id=pc.part_id";
  $result = $link->query($query);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $list[] = $row;
  }
  return $list;
}

function get_candidate_score() {

  $link = open_db_connection();
  $query = "SELECT p.name as name, ps.score as score FROM `participant_score` AS ps "
  . " JOIN `participant` AS p ON p.id=ps.part_id "
  . " WHERE p.id=:pid";
  $result = $link->prepare($query);
  $result->bindParam(':pid', $_POST['candidate']);
  $result->execute();
  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $list[] = $row; 
  }
  return $list;
}

function get_candidate_all_score() {

  $link = open_db_connection();
  // get avg score
  $query = "SELECT * FROM `participant_competition` AS pc "
  . " JOIN `judge_score` AS j "
  . " ON j.chess_no=pc.chess_no "
  . " WHERE pc.part_id=:part_id";
  $result = $link->prepare($query);
  $result->bindParam(':part_id', $_POST['candidate']);
  $result->execute();
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $list[] = $row;
  }
  return $list;
}

function get_judges() {

  $link = open_db_connection();
  // $query = "SELECT DISTINCT j.name As name, j.id As id FROM `judge_competition` "
  // . " AS jc JOIN judges AS j ON j.id=jc.judge_id";
  // $result = $link->query($query);
  // while($row = $result->fetch(PDO::FETCH_ASSOC)) {
  //   $list[] = $row;
  // }
  // return $list;
  
  $query = "SELECT DISTINCT j.name As name, j.id As id FROM `judges` "
  . " As j JOIN `admin` AS a ON a.username=j.name "
  . " JOIN `judge_competition` AS jc ON jc.judge_id=j.id "
  . " WHERE a.username=:judge";
  $result = $link->prepare($query);
  $result->bindParam(':judge', $_SESSION['judge']);
  $result->execute();
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $list[] = $row;
  }
  return $list[0];
}

function get_candidates_chessno() {

  $link = open_db_connection();
  $query = "SELECT chess_no FROM `participant_competition`";
  $result = $link->query($query);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $list[] = $row;
  }
  return $list;
}

function enter_mark_action_db() {
  
  $link = open_db_connection();
  $query = "SELECT COUNT(*) `judge_score`"
  . " WHERE `chess_no`=:chess AND `comp_id`=:comp AND `judge_id`=:judge ";
  $result = $link->prepare($query);
  $result->bindParam(':comp', $_POST['competition']);
  $result->bindParam(':chess', $_POST['candidate']);
  $result->bindParam(':judge', $_SESSION['judgeid']);
  $result->execute();
  $row = $result->fetch(PDO::FETCH_ASSOC);
  if ($row['COUNT(*)'] > 0) {
    return;
  }
  else {
    $query = "INSERT INTO `judge_score`(`chess_no`, `comp_id`, `judge_id`, `score`) "
    . " VALUES (:chess, :comp, :judge, :score)";
    $result = $link->prepare($query);
    $result->bindParam(':comp', $_POST['competition']);
    $result->bindParam(':chess', $_POST['chessno']);
    $result->bindParam(':judge', $_SESSION['judgeid']);
    $result->bindParam(':score', $_POST['mark']);
    $t = $result->execute();
    echo $t;
  }
}

function competiton_socre_list_db() {
  
  $link = open_db_connection();
  $query = "SELECT * FROM `competition`";
  $result = $link->query($query);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $comp[] = $row; 
  }

  foreach ($comp as $c) {
    $i= $c['name'];
    $query = "SELECT p.name AS part_name, pc.score AS score FROM `participant_score` As pc "
    . " Join `competition` As c ON pc.comp_id=c.id "
    . " JOIN `participant` as p ON p.id=pc.part_id "
    . " WHERE pc.comp_id = :comp";
    $result = $link->prepare($query);
    $result->bindParam(':comp', $c['id']);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $res[$i][] = $row;
    }
  }
  $data[0] = $comp;
  $data[1] = $res;
  return $data;
}

?>
