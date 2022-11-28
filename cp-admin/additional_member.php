<?php include("header.php");?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <p align="right"><a  style="background-color:blue; color:#fff; padding:5px 10px;" href="all-doc-corona.php">Covid19 Doc</a>&nbsp;&nbsp;<a href="add-new-doc-corona.php"  style="background-color:blue; color:#fff; padding:5px 10px;">Add New Covid19 Doc</a></p>    
          <div class="widget widget-nopad">
            <div class="widget-content">
            <div class="widget-header"> <i class="icon-user"></i>
              <h3>Online Payment Details</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Billing Details</th>
                        <!--<th>Order Status</th>-->
                         <th>member_name</th>
                         <th>member_degignation</th>
                          <th>member_email</th>
                          <th>member_tel</th>
                    </tr>
                </thead>
                <tbody>
                   <?php $con=mysqli_connect("localhost","acmaig3n_live","%%3e3d3c","acmaig3n_acmalive");
                    $sql="SELECT * FROM newmember ORDER BY id DESC";
                   $data= mysqli_query($con,$sql);
                   $srno = 1; 
                    while($row=mysqli_fetch_assoc($data)){ ?>
                    <tr>
                        <td width="50"><?php echo $srno;?></td>
                        <td>Name:<?php echo $row['billing_name']?><br>
                        Designation :<?php echo $row['designation']?><br>
                        Email :<?php echo $row['billing_email']?><br>
                        Tel :<?php echo $row['billing_tel']?>
                        
                        </td>
                        <!--<td></td>-->
                        <td><?php echo $row['member_name2']?><br>
                        <?php echo $row['member_name3'];?><br>
                       <?php echo $row['member_name4'];?><br>
                        <?php echo $row['member_name5']; ?><br>
                        <?php echo $row['member_name6'];?><br>
                        <?php echo $row['member_name7'];?><br>
                        <?php echo $row['member_name8'];?><br>
                        <?php echo $row['member_name9'];?>
                        <?php echo $row['member_name10']; ?>
                        <?php echo $row['member_name11']; ?>
                        <?php echo $row['member_name12']; ?>
                        <?php echo $row['member_name13']; ?>
                        <?php echo $row['member_name14']; ?>
                        <?php echo $row['member_name15'];?>
                        <?php echo $row['member_name16'];?>
                        <?php echo $row['member_name17'];?>
                        <?php echo $row['member_name18'];?>
                        <?php echo $row['member_name19'];?>
                        <?php echo $row['member_name20'];?>
                        </td>
                        <td><?php echo $row['member_designation2']?><br>
                        <?php echo $row['member_designation3'];?><br>
                       <?php echo $row['member_designation4'];?><br>
                        <?php echo $row['member_designation5']; ?><br>
                        <?php echo $row['member_designation6'];?><br>
                        <?php echo $row['member_designation7'];?><br>
                        <?php echo $row['member_designation8'];?><br>
                        <?php echo $row['member_designation9'];?>
                        <?php echo $row['member_designation10']; ?>
                        <?php echo $row['member_designation11']; ?>
                        <?php echo $row['member_designation12']; ?>
                        <?php echo $row['member_designation13']; ?>
                        <?php echo $row['member_designation14']; ?>
                        <?php echo $row['member_designation15'];?>
                        <?php echo $row['member_designation16'];?>
                        <?php echo $row['member_designation17'];?>
                        <?php echo $row['member_designation18'];?>
                        <?php echo $row['member_designation19'];?>
                        <?php echo $row['member_designation20'];?>
                        </td>
                        <td><?php echo $row['member_email2']?><br>
                        <?php echo $row['member_email3'];?><br>
                       <?php echo $row['member_email4'];?><br>
                        <?php echo $row['member_email5']; ?><br>
                        <?php echo $row['member_email6'];?><br>
                        <?php echo $row['member_name7'];?><br>
                        <?php echo $row['member_email8'];?><br>
                        <?php echo $row['member_email9'];?>
                        <?php echo $row['member_email10']; ?>
                        <?php echo $row['member_email11']; ?>
                        <?php echo $row['member_email12']; ?>
                        <?php echo $row['member_email13']; ?>
                        <?php echo $row['member_email14']; ?>
                        <?php echo $row['member_email15'];?>
                        <?php echo $row['member_email16'];?>
                        <?php echo $row['member_email17'];?>
                        <?php echo $row['member_email18'];?>
                        <?php echo $row['member_email19'];?>
                        <?php echo $row['member_email20'];?>
                        </td>
                        <td><?php echo $row['member_tel2']?><br>
                        <?php echo $row['member_tel3'];?><br>
                       <?php echo $row['member_tel4'];?><br>
                        <?php echo $row['member_tel5']; ?><br>
                        <?php echo $row['member_tel6'];?><br>
                        <?php echo $row['member_tel7'];?><br>
                        <?php echo $row['member_tel8'];?><br>
                        <?php echo $row['member_tel9'];?>
                        <?php echo $row['member_tel10']; ?>
                        <?php echo $row['member_tel11']; ?>
                        <?php echo $row['member_tel12']; ?>
                        <?php echo $row['member_tel13']; ?>
                        <?php echo $row['member_tel14']; ?>
                        <?php echo $row['member_tel15'];?>
                        <?php echo $row['member_tel16'];?>
                        <?php echo $row['member_tel17'];?>
                        <?php echo $row['member_tel18'];?>
                        <?php echo $row['member_tel19'];?>
                        <?php echo $row['member_tel20'];?>
                        </td>
                    </tr>
               	<?php $srno++; }?>
                </tbody>
                <!--<tfoot>-->
                <!--    <tr>-->
                <!--        <th>Sr no</th>-->
                <!--        <th>Billing Details</th>-->
                <!--        <th>Company Name</th>-->
                <!--        <th>Event Details</th>-->
                <!--        <th>Amount</th>-->
                <!--        <th>Order ID</th>-->
                <!--        <th>Form Name</th>-->
                <!--        <th>Order Status</th>-->
                <!--    </tr>-->
                <!--</tfoot>-->
            </table>
            
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