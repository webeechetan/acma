<?php include("header.php");
include("PushNotifications.php");
$conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");

    // Check connection

     if (mysqli_connect_errno())

      {

      echo "Failed to connect to MySQL: " . mysqli_connect_error();

      }

      $_SESSION['msg']=$_SESSION['msgErr']="";

       if(isset($_GET['id'])){

   $sql="DELETE  FROM notifications WHERE id={$_GET['id']}";

   $result=mysqli_query($conn,$sql);

   if($result){

       $_SESSION['msg']="<p>Notifications deleted successfully</p>";

   }else{

       

     $_SESSION['msgErr']="<p>Sorry!! Notifications not deleted.Please try again.</p>";



   }

   }

?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">  
          <div class="widget widget-nopad">

                <?php if($_SESSION['msg']){

                echo $_SESSION['msg'];

                

                }elseif($_SESSION['msgErr']){

                echo $_SESSION['msgErr'];

                }



                ?>

            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Documents</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>

                        <th>Sr no</th>

                        <th>Notification Message</th>

                        <th>Date of Notification</th>



                        <th>Type of Notification</th>
                         <th>Notification For</th>

                       

                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                
                    <?php $sql="SELECT * FROM notifications ORDER BY id DESC";

                        $row=mysqli_query($conn,$sql);

                        $srno = 1;

                        while($result=mysqli_fetch_assoc($row)){?>
				        <tr>

                            <td><?php echo $srno;?></td>

                            <td><?php echo $result['text']?></td>

                            <td><?php echo $result['created_at']?></td>

                            <td><?php echo $result['notification']?></td>
                              <td><?php  $result['status'];
                                    if($result['status']=="0"){
                                        echo"Member";
                                        
                                    }elseif($result['status']=="1"){
                                         echo"Non-Member";
                                        
                                    }elseif($result['status']=="2"){
                                         echo"All ACMA User";
                                        
                                    }
                              ?></td>

                          

                            

                                <td><a href="?id=<?php echo $result['id']?>">
                                    
                            <button class=" btn btn-danger">Delete</button>

                            </a></td>

                            



                        </tr>
				<?php $srno++; }?>
                </tbody>
            </table>
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