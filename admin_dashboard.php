<?php
echo '
<html>
<head>
<title>ShopVote</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div id="header">
<a href="dashboard.php"><div id="logo">
</div></a>
<div id="signin">
<form action="logout.php" method="POST" id="signin_form">
<input type="submit" value="logout" id="sout_submit" style="width:100px;background:#619AE8;border:none;"></input>
</form>
</div>
</div>
<div id="left-menu">
<div id"admins"><a  onclick=$("#admin-table").slideDown();$("#user-table").slideUp("fast");$("#question-table").slideUp("fast");>Admins</a></div><br>
<div id="users"><a onclick=$("#user-table").slideDown();$("#admin-table").slideUp("fast");$("#question-table").slideUp("fast");>Users</a></div><br>
<div id="questions"><a onclick=$("#question-table").slideDown();$("#admin-table").slideUp("fast");$("#user-table").slideUp("fast");>Questions</a></div><br>
</div>
<div id="d-cont">
	
	<div class="table" id="admin-table">
		<div id="about">
	        <span style="font-size:30px;">Administrators</span>
	    </div>
		<table class="table table-striped table-bordered table-condensed">
    	<thead>
        	<tr>
            	<th>#</th>
            	<th style="display:none">UserId</th>
            	<th>Username</th>
            	<th>Password</th>
            	<th>Action</th>
        	</tr>
    	</thead>
    	<tbody>';
    		$con = mysqli_connect("localhost","root","","shopvote");
    		$count = 0;
			if(mysqli_connect_errno())
			echo "Failed" . mysqli_connect_error();
			$result = mysqli_query($con,"SELECT * FROM admin");
			while($row = mysqli_fetch_array($result)) {
			$count = $count + 1;
			echo '
        	<tr>
            	<td>'.$count.'</td>
            	<td style="display:none">'.$row['userid'].'</td>
            	<td>'.$row['username'].'</td>
            	<td>'.$row['password'].'</td>
            	<td>
            <button type="button" class="btn btn-info btn-sm" title="edit amin"><span class="glyphicon glyphicon-edit"></span></button>
            <button type="button" class="btn btn-danger btn-sm" title="delete admin"><span class="glyphicon glyphicon-trash"></span></button></td>
        	</tr>';
        	}
        	echo '
    	</tbody>
		</table>
		<button type="button" class="btn btn-success btn-sm" title="add admin"><span class="glyphicon glyphicon-plus"></span>Add</button>
	</div>
	<div class="table" id="user-table" style="display: none;">
		<div id="about">
	        <span style="font-size:30px;">Users</span>
	    </div>
		<table class="table table-striped table-bordered table-condensed">
    	<thead>
        	<tr>
            	<th>#</th>
            	<th>Username</th>
            	<th>Name</th>
            	<th>Address</th>
            	<th>Zip</th>
            	<th>Active</th>
            	<th>Action</th>
        	</tr>
    	</thead>
    	<tbody>';
            $con = mysqli_connect("localhost","root","","shopvote");
            $count = 0;
            if(mysqli_connect_errno())
            echo "Failed" . mysqli_connect_error();
            $result = mysqli_query($con,"SELECT * FROM usersdb");
            while($row = mysqli_fetch_array($result)) {
            $count = $count + 1;
            echo '
            <tr>
                <td>'.$count .'</td>
                <td>'.$row['username'].'</td>
                <td>'.$row['fname']." ".$row['lname'].'</td>
                <td>'.$row['address1']." ".$row['address2']." ".$row['city']." ".$row['state'].'</td>
                <td>'.$row['zipcode'].'</td>
                <td>';if($row['active'] == 1) echo "yes"; else echo "no"; echo '</td>   
                <td>
            <button type="button" class="btn btn-info btn-sm" title="edit user"><span class="glyphicon glyphicon-edit"></span></button>
            <button type="button" class="btn btn-danger btn-sm" title="delete user"><span class="glyphicon glyphicon-trash"></span></button></td>       
            </tr>';
            }
            echo '
        </tbody>
		</table>
	</div>

	<div class="table" id="question-table" style="display: none;">
		<div id="about">
	        <span style="font-size:30px;">Questions</span>
	    </div>
		<table class="table table-striped table-bordered table-condensed">
    	<thead>
        	<tr>
            	<th>#</th>
            	<th style="display:none">QuestionId</th>
            	<th>Question</th>
            	<th>Active</th>
            	<th>Action</th>
        	</tr>
    	</thead>
    	<tbody>';
            $con = mysqli_connect("localhost","root","","shopvote");
            $count = 0;
            if(mysqli_connect_errno())
            echo "Failed" . mysqli_connect_error();
            $result = mysqli_query($con,"SELECT * FROM questions");
            while($row = mysqli_fetch_array($result)) {
            $count = $count + 1;
            echo '
            <tr>
                <td>'.$count .'</td>
                <td style="display:none">'.$row['q_id'].'</td>
                <td>'.$row['question'].'</td>
                <td>';if($row['active'] == 1) echo "yes"; else echo "no"; echo '</td>
                <td>
            <button type="button" class="btn btn-info btn-sm" title="edit question"><span class="glyphicon glyphicon-edit"></span></button>
            <button type="button" class="btn btn-danger btn-sm" title="delete question"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>';
            }
            echo '
        </tbody>
		</table>
		<button type="button" class="btn btn-success btn-sm" title="add question"><span class="glyphicon glyphicon-plus"></span>Add</button>
	</div>

</div>
</body>
<script src="js/jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>';


?>
