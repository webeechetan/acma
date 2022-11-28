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

   $sql="DELETE  FROM publications WHERE id={$_GET['id']}";

   $result=mysqli_query($conn,$sql);

   if($result){

       $_SESSION['msg']="<p>Document deleted successfully</p>";

   }else{

       

     $_SESSION['msgErr']="<p>Sorry!!Document not deleted.Please try again.</p>";



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

                        <th>Publication title</th>

                        <th>Publication name</th>



                        <th>document image</th>

                        <th>document pdf</th>

                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                
                    <?php $sql="SELECT * FROM publications ORDER BY id DESC";

                        $row=mysqli_query($conn,$sql);

                        $srno = 1;

                        while($result=mysqli_fetch_assoc($row)){?>
				        <tr>

                            <td><?php echo $srno;?></td>

                            <td><?php echo $result['doc_title']?></td>

                            <td><?php echo $result['event_name']?></td>

                            <td><?php echo $result['doc_img']?></td>

                            <td><?php echo $result['attachment']?></td>

                            

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