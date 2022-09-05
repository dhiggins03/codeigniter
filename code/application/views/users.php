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
</head>
<body>

<div id="container">
	<div id="app">
		<task-list></task-list>
	</div>
	<h1>CodeIgniter Challenge 1</h1>

	<div id="body">
		<table>
      <tr>
		<th>userId</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
      <?php
      foreach ($users as $user) { ?>
      <tr>
	    <td><?echo $user->userId?></td>
        <td><?echo $user->userForename." ".$user->userSurname?></td>
        <td><?echo $user->userEmail?></td>
      </tr>
      <?}?>
    </table>




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