<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$Vehiclereport=App\Models\VehiclereportTable::find((int)$_GET['id']);
	if($Vehiclereport){
		$Vehiclereport->delete();
	}
	header( 'location:all-vehicle-report.php?msg=delete' );			
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
              <h3>Vehicle Reports</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Title for Table</th>
                        <th>Title for Graph</th>
                        <th>Category</th>
                        <th>Year</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $VehiclereportTables=App\Models\VehiclereportTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($VehiclereportTables as $VehiclereportTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td><?php echo $VehiclereportTable->title;?></td>
					<td><?php echo $VehiclereportTable->title2;?></td>
					<td>
					<?php if($VehiclereportTable->cat == 1){ echo "Quarterly Vehicle Forecast";}
					if($VehiclereportTable->cat == 2){ echo "Monthly Vehicle Performance Report";}
					if($VehiclereportTable->cat == 3){ echo "Quarterly Vehicle Performance Report";}?>
					</td>
					<td><?php echo $VehiclereportTable->docyear;?></td>
					<td><?php echo $VehiclereportTable->uploaddate;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-vehicle-report.php?id=<?php echo $VehiclereportTable->id;?>&action=delete">Delete</a></td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Title for Table</th>
                        <th>Title for Graph</th>
                        <th>Category</th>
                        <th>Year</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$VehiclereportTables->withPath('all-vehicle-report.php'); 
				$pages= $VehiclereportTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-vehicle-report.php?".
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