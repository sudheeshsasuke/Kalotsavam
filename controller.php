<?php

require_once 'model.php';

function register_user() {

	register_user_db();

	// TODO
	// send registartion mail to admin
	// once the admin approves by clicking the link, change the approved status of the 
	// participant table to 1
	send_mail_to_admin();
	include 'templates/user_registartion_success_message.tpl.php';
}

/**
 * send registartion mail to admin for approving the user
 */
function send_mail_to_admin() {

}

function login_admin() {

	verify_admin_login();
}

function logout() {

	$_SESSION = [];
	session_destroy();
	header('location:http://kalotsavam.local/');
}

function list_of_compeptitions() {

	$list = list_of_compeptitions_db();
	include 'templates/list.tpl.php';
}

function list_of_categories() {

	$list = list_of_categories_db();
	include 'templates/list_of_categories.tpl.php';
}

function register_compeptition() {

	$competitions = list_of_compeptitions_db();
	include 'templates/register_compeptition.tpl.php';
}

function register_compeptition_action() {

	register_compeptition_action_db();
}

function over_all_score_board() {

	set_avg_score_db();
	$scores = get_all_score_db();
	include 'templates/overall_score.tpl.php';
}

function Candidate_Score_Board_form() {

	$list = get_candidates();
	include 'templates/candidate.tpl.php';
}

function Candidate_Score_Board_action() {

	$list = get_candidate_score();
	//$scores = get_candidate_all_score();
	include 'templates/candidate_score.tpl.php';
}

function enter_score_form() {

	$competitions = list_of_compeptitions_db();
	$list = get_candidates_chessno();
	$judges = get_judges();
	$_SESSION['judgeid'] = $judges['id'];
	include 'templates/enter_score_form.tpl.php';
}

function enter_mark_action() {
	enter_mark_action_db();
	echo "<h1>Mark entered successfully</h1>";
}

function competiton_socre_list() {
	$data = competiton_socre_list_db();
	$com = $data[0];
	$scorelist = $data[1];
	include 'templates/newlist.tpl.php';
}

?>