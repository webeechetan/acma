<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$EnquiryTable=App\Models\EnquiryTable::find((int)$_GET['id']);
	if($EnquiryTable){
		$EnquiryTable->delete();
	}
	header( 'location:enquiries.php?msg=delete' );			
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
            <div class="widget-header"> <i class="icon-envelope"></i>
              <h3>Enquiry</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Name</th>
                        <th width="100">Email Id</th>
                        <th width="100">Contact No.</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $EnquiryTables=App\Models\EnquiryTable::orderBy("id","DESC")->paginate(10,['*'],'page',(int)$_GET['page']);
                $srno = 1; 
		        foreach($EnquiryTables as $EnquiryTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td><?php echo $EnquiryTable->name;?></td>
					<td><?php echo $EnquiryTable->emailid;?></td>
					<td><?php echo $EnquiryTable->contactno;?></td>
					<td><?php echo $EnquiryTable->entrydate;?></td>
					<td><?php echo $EnquiryTable->message;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="enquiries.php?id=<?php echo $EnquiryTable->id;?>&action=delete">Delete</a></td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Contact No.</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$EnquiryTables->withPath('enquiries.php'); 
				$pages= $EnquiryTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='enquiries.php?".
							((isset($_GET['id']) && !empty($_GET['id']))?'id='.urlencode($_GET['id']).'&':'')."page=".$i."'";
							if ($i==$pages['current_page'])  echo " class='curPage'";
							echo ">".$i."</a></li>";  
				}; 
				echo "</ul></div>";	
					?>
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