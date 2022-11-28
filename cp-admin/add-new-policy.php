<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");
// Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['save'])){
  $year = $_POST['year'];
  $type = $_POST['type'];
  $state = $_POST['state'];
  $policy = $_POST['policy'];
  $file = $_FILES['file']['name'];
  $tmp_name = $_FILES['file']['tmp_name'];
  $sql = "INSERT INTO policies (year,state,policy,file,type) VALUES ('$year','$state','$policy','$file','$type')";
  move_uploaded_file($tmp_name,"/var/www/html/acma.in/uploads/doc/updated-policies/".$file);
  
  if(mysqli_query($conn,$sql)){
    header('location:all-policies.php');
  }
}
include("header.php");
   
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> New Policy</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
                <tr>
					<td width="200">Policy Type</td>
					<td>
                        <select name="type">
                            <option value="1">Central Govt Policy</option>
                            <option value="2">State Policy / EV Policy</option>
                        </select>
                    </td>
				</tr>
                <tr>
					<td width="200">Year</td>
					<td><input type="text" name="year" required></td>
				</tr>
				<tr>
					<td width="200">State</td>
					<td><input type="text" name="state" ></td>
				</tr>
				<tr>
					<td width="200">Policy</td>
					<td><input type="text" name="policy" required></td>
				</tr>
				<tr>
					<td width="200">Attach</td>
					<td><input type="file" name="file" required accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf"> Only : PDF, DOC</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="save" value="Submit"> <input type="reset" value="Cancel"></td>
				</tr>
			  </table></form>
			  </div>  
          </div>    
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<?php include("footer.php");?>