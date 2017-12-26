<?php 

ob_start();?>
<h1>KALOTSAVAM</h1>
<table>
	<tbody>
		<tr>
			<td>
				<a href="/index.php/user_register_form"><button class="btn btn-link">Candidate Registration</button></a>
			<td>
			<td>
				<a href="/index.php/user_login_form"><button class="btn btn-link">Candidate Login</button></a>
			<td>
			<td>
				<a href="/index.php/admin_login_form"><button class="btn btn-link">Admin Login</button></a>
			<td>
		</tr>
		<tr>
			<td><h3></h3></td>
		</tr>
		<tr>
			<td>
				<a href="/index.php/register_compeptition"><button class="btn btn-primary">Register competition</button></a>
			<td>
			<td>
				<a href="/index.php/list_of_compeptitions"><button class="btn btn-primary">List of competitions</button></a>
			<td>
			<td>
				<a href="/index.php/list_of_categories"><button class="btn btn-primary">List of categories</button></a>
			<td>
		</tr>
		<tr>
			<td>
				<a href="/index.php/Over_all_Score_Board"><button class="btn btn-warning">Over all Score Board</button></a>
			<td>
			<td>
				<a href="/index.php/Candidate_Score_Board_form"><button class="btn btn-warning">Candidate Score Board</button></a>
			<td>
			<td>
				<a href="/index.php/enter_score_form"><button class="btn btn-warning">Enter Score</button></a>
			<td>
		</tr>
			<tr>
			<td>
				<a href="/index.php/competiton_socre_list"><button class="btn btn-success">competiton socre list</button></a>
			<td>
		</tr>
	</tbody>
</table>
<?php $content = ob_get_clean();
  require 'templates/layout.tpl.php';?>
