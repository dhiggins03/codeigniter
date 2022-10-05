<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://kit.fontawesome.com/c7876723d1.js" crossorigin="anonymous"></script>
</head>
<body>

<div id="container">
	<div id="app">
		<task-list></task-list>
	</div>
	<h1>CodeIgniter Challenge 1</h1>

	<div id="body">
		<div>
			<a href="<?php echo base_url('user/newuser')?>"><button type="button" class="btn btn-primary">Add new user <i class="fa-solid fa-user-plus"></i></button></a>
		
		</div>
    <table>
      <tr>
		<th>userId</th>
        <th>Name</th>
        <th>Email</th>
		<th></th>
		<th></th>
      </tr>
      <?php
      foreach ($users as $user) { ?>
      <tr id="user_row_<?php echo $user->userId?>">
	    <td><?echo $user->userId?></td>
        <td><?echo $user->userForename." ".$user->userSurname?></td>
        <td><?echo $user->userEmail?></td>
		<td><a href="<?php echo base_url('user/edit/'.$user->userId)?>"><button type="button" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button></a></td>
		<td><button type="button" class="btn btn-danger" onclick="delete_user(<?php echo $user->userId;?>)"><i class="fa-solid fa-trash"></i></button></td>
      </tr>
      <?}?>
    </table>
	<p class = 'js-update-text' style = 'color:<?php echo $this->session->flashdata('feedback_colour')?>'><?php echo $this->session->flashdata('feedback'); ?></p>



		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>
		<!-- 
		******
		Project 3: Vue Task - Uncomment this out and the vue components will load in.
		******
		<h1>Welcome to the Vue Task</h1>
		<div id="app">
			<task-list></task-list>
		</div>

		<script type='text/javascript' src ='/node_modules/axios/dist/axios.min.js'></script>
    <script type='text/javascript' src ='/node_modules/vue/dist/vue.js'></script>
		<script type='text/javascript' src ='/resources/js/dist/vue/task.js'></script>
		-->
</body>
</html>
<script>

	function delete_user(userid) 
	{				
		$.ajax({
			type : 'GET',
			url : '/user/delete/'+userid,
			}).done(function(json)
			{	
				if (json.success === true)
				{
					toastr.success((json.msg) ? json.msg : 'Success', '', {timeOut: 1000});
					$( "#user_row_"+userid.toString() ).remove();
				}
				// fail
				else
				{
					toastr.error((json.msg) ? json.msg : 'There was a problem, please try again.', '', {timeOut: 1000});
				}
		});
	}
</script>
