<?php include("header.php");

session_start();

$conn=mysqli_connect("localhost","techtonic","d#4ab01db3!bT","acma_web");

    // Check connection

     if (mysqli_connect_errno())

      {

      echo "Failed to connect to MySQL: " . mysqli_connect_error();

      }

      $_SESSION['msg']=$_SESSION['msg']="";

       if(isset($_GET['id'])){

   $sql="DELETE  FROM policies WHERE id={$_GET['id']}";

   $result=mysqli_query($conn,$sql);

   if($result){

       $_SESSION['msg']="Document deleted successfully";

   }else{

       

     $_SESSION['msgErr']="Sorry!!Document not deleted.Please try again.";



   }

   }

?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">  
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Documents</h3>
              <a href="?filter=2"><button class="btn btn-success">State/EV Policy</button></a>
              <a href="?filter=1"><button class="btn btn-success">Central Gvt Policy</button></a>
              <a href="all-policies.php"><button class="btn btn-success">All</button></a>
              <?php if($_SESSION['msg']){
                  echo $_SESSION['msg'];
                  unset($_SESSION['msg']);
              }elseif($_SESSION['msgErr']){
                echo $_SESSION['msgErr'];
                unset($_SESSION['msgErr']);
              }
              ?>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>

                        <th>Sr no</th>

                        <th>Year</th>

                        <th>State </th>

                        <th>Policy</th>

                        <th>Policy Type</th>

                        <th>document pdf</th>

                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                      if(isset($_GET['filter'])){
                        $type = $_GET['filter'];
                        $sql="SELECT * FROM policies WHERE type='$type' ORDER BY id DESC";
                      }else{
                        $sql="SELECT * FROM policies ORDER BY id DESC";
                      }

                        $row=mysqli_query($conn,$sql);

                        $srno = 1;

                        while($result=mysqli_fetch_assoc($row)){?>
				        <tr>

                            <td><?php echo $srno;?></td>

                            <td><?php echo $result['year']?></td>

                            <td><?php echo $result['state']?></td>

                            <td><?php echo $result['policy']?></td>

                            <td>
                              <?php if($result['type']=='1'){ echo 'Central Gvt Policy'; }else{ echo 'State/EV Policy'; }?>
                            </td>

                            <td><?php echo $result['file']?></td>

                            

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