<?php
session_start();
if(isset($_SESSION['user'])){
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
<div id="welcome">Welcome,' .$_SESSION['user']. '</div>
<div id="signout">
<form action="admin_logout.php" method="POST">
<input type="submit" value="logout" id="sout_submit" style="width:100px;background:#619AE8;border:none;"></input>
</form>
</div>
</div>
<div id="left-menu">
<div id"admins"><a  onclick=$("#admin-table").slideDown();$("#user-table").slideUp("fast");$("#question-table").slideUp("fast");$("#category-table").slideUp();>Admins</a></div><br>
<div id="users"><a onclick=$("#user-table").slideDown();$("#admin-table").slideUp("fast");$("#question-table").slideUp("fast");$("#category-table").slideUp();>Users</a></div><br>
<div id="questions"><a onclick=$("#question-table").slideDown();$("#admin-table").slideUp("fast");$("#user-table").slideUp("fast");$("#category-table").slideUp();>Questions</a></div><br>
<div id="questions"><a onclick=$("#category-table").slideDown();$("#admin-table").slideUp("fast");$("#user-table").slideUp("fast");$("#question-table").slideUp();>Categories</a></div><br>
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
    		$con = mysqli_connect("localhost","root","root","shopvote");
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
		<button type="button" class="btn btn-success btn-sm" title="add admin" data-toggle="modal" data-target="#addAdminModal"><span class="glyphicon glyphicon-plus"></span>Add</button>
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
            $con = mysqli_connect("localhost","root","root","shopvote");
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
            	<th>Category</th>
            	<th>Active</th>
            	<th>Action</th>
        	</tr>
    	</thead>
    	<tbody>';
            $con = mysqli_connect("localhost","root","root","shopvote");
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
                <td>'.$row['question'].'</td>';
                $result2 = mysqli_query($con,"SELECT categoryname FROM categories WHERE categoryid='" . $row['category'] ."'");
				$row2 = mysqli_fetch_array($result2);               
				echo '<td>'.$row2['categoryname'].'</td>
                <td>';if($row['active'] == 1) echo "yes"; else echo "no"; echo '</td>
                <td>
            <button type="button" class="btn btn-info btn-sm" title="edit question"><span class="glyphicon glyphicon-edit"></span></button>
            <button type="button" class="btn btn-danger btn-sm" title="delete question"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>';
            }
            echo '
        </tbody>
		</table>
		<button type="button" class="btn btn-success btn-sm" title="add question" data-toggle="modal" data-target="#addQuestionModal"><span class="glyphicon glyphicon-plus"></span>Add</button>
	</div>

	<div class="table" id="category-table" style="display: none;">
		<div id="about">
	        <span style="font-size:30px;">Categories</span>
	    </div>
		<table class="table table-striped table-bordered table-condensed">
    	<thead>
        	<tr>
            	<th>#</th>
            	<th style="display:none">CategoryId</th>
            	<th>Category</th>
            	<th>Action</th>
        	</tr>
    	</thead>
    	<tbody>';
            $con = mysqli_connect("localhost","root","root","shopvote");
            $count = 0;
            if(mysqli_connect_errno())
            echo "Failed" . mysqli_connect_error();
            $result = mysqli_query($con,"SELECT * FROM categories");
            while($row = mysqli_fetch_array($result)) {
            $count = $count + 1;
            echo '
            <tr>
                <td>'.$count .'</td>
                <td style="display:none">'.$row['categoryid'].'</td>
                <td>'.$row['categoryname'].'</td>
            <td>   
            <button type="button" class="btn btn-info btn-sm" title="edit question"><span class="glyphicon glyphicon-edit"></span></button>
            <button type="button" class="btn btn-danger btn-sm" title="delete question"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>';
            }
            echo '
        </tbody>
		</table>
		<button type="button" class="btn btn-success btn-sm" title="add question" data-toggle="modal" data-target="#addCategoryModal"><span class="glyphicon glyphicon-plus"></span>Add</button>
	</div>
</div>

<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form action="" method="POST" id="signin_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title">Add an Admin</h3>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-2"><h4><label for="username" style="padding-top:8px">Username:</label></h4></div>
            <div class="col-md-6"><input type="text" class="form-control" name="username" id="username" placeholder="username" style="width: 100%"></input></div>
        </div>
        <div class="row">
            <div class="col-md-2"><h4><label for="password" style="padding-top:8px">Password</label></h4></div>
            <div class="col-md-6"><input type="password" class="form-control" name="password" id="password" placeholder="password" style="width: 100%"></input></div>
        </div>
        <div class="row">
            <div class="col-md-2"><h4><label for="password" style="padding-top:8px">Confirm</label></h4></div>
            <div class="col-md-6"><input type="password" class="form-control" name="confirm" id="confirm" placeholder="confirm password" style="width: 100%"></input></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
     </form> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form action="" method="POST" id="signin_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title">Add a question</h3>
      </div>
      <div class="modal-body">
        <div class="row">
  			<div class="col-md-2"><h4><label for="question" style="padding-top:8px">Question:</label></h4></div>
  			<div class="col-md-6"><input type="text" class="form-control" name="question" id="question" placeholder="Type here..." style="width: 100%"></input></div>
		</div>
		<div class="row">
  			<div class="col-md-2"><h4><label for="category" style="padding-top:4px">Category:</label></h4></div>
  			<div class="col-md-6"><select class="form-control" style="width: 100%">
                <option value="1">Animals</option>
                <option value="2">Environment</option>
                <option value="3">LGBT</option>
            </select></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
     </form> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form action="" method="POST" id="signin_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title">Add a Category</h3>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-2"><h4><label for="category" style="padding-top:8px">Category:</label></h4></div>
            <div class="col-md-6"><input type="text" class="form-control" name="category" id="category" placeholder="Type here..."></input></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
     </form> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
<script src="js/jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>';
}
else{
session_destroy();
header("Location: admin_index.php");
}
?>
