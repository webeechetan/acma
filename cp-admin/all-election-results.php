<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
    $id = $_GET['id'];
	$query = mysqli_query($conn,"DELETE FROM election_result WHERE id ='$id'");
    if($query){
        header( 'location:all-election-results.php?msg=delete' );			
    }
}
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <?php
			if(isset($_GET['msg']) && $_GET['msg'] == 'delete'){
		  ?>
				<div class="alert">
                    Delete Record Successfully.
                </div>
          <?php
			}
		  ?>    
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Press Release</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = mysqli_query($conn,"SELECT * FROM election_result");
                    while($row = mysqli_fetch_array($query)){
				?>
				<tr>
					<td width="50"><?php echo $row['id'];?></td>
					<td><?php echo $row['title'];?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-election-results.php?id=<?php echo $row['id'];?>&action=delete">Delete</a></td>
				</tr>
                <?php }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
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