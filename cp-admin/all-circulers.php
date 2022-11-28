<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$EnquiryTable=App\Models\CirculersTable::find((int)$_GET['id']);
	if($EnquiryTable){
		$EnquiryTable->delete();
	}
	header( 'location:all-circulers.php?msg=delete' );			
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
            <div class="serachtop">
                <form method="get" action="all-circulers.php">
                      <?php 
                            if(!empty($_GET['year'])){
                            $year = $_GET['year'];
                            }else{
                            $year = "";    
                            }
                            if(!empty($_GET['month'])){
                            $month = $_GET['month'];
                            }else{
                            $month = "";    
                            }
                      ?>
                      <select name="region" style="width:100px;">
                              <option value="all">All Category</option>
                              <option>CMVR Regulations</option>
                              <option>Eastern Region</option>
                              <option>Executive Committee</option>
                              <option>Government Policy Matters</option>
                              <option>Knowledge Partner Reports/ Industry Statistics</option>
                              <option>National Events
                              <option>Northern Region</option>
                              <option>Overseas Events</option>
                              <option>Southern Region</option>
                              <option>Steering Committee</option>
                              <option>Western Region</option>        
                      </select>
                      <select name="month" style="width:100px;">
                           <option value="">Month</option>              
                            <?php
                            for ($y = 1; $y <= 12; $y++) {
                            ?>
                            <option value="<?php echo $y;?>" <?php if($y == $month){ echo "Selected";}?>><?php echo $y;?></option>
                            <?php
                            }
                            ?>          
                      </select>
                      <select name="year" style="width:100px;">
                           <option value="">Year</option>              
                            <?php
                            for ($z = 1999; $z <= date("Y"); $z++) {
                            ?>
                            <option value="<?php echo $z;?>" <?php if($z == $year){ echo "Selected";}?>><?php echo $z;?></option>
                            <?php
                            }
                            ?>          
                      </select>
  &nbsp;&nbsp;<input type="submit" name="find" value="Find" class="go_btn"></form>
            </div>  
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Circulars</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                if(!empty($_GET['region'])){
                $EnquiryTables=App\Models\CirculersTable::where('region','=',$_GET['region'])->orderBy("id","DESC")->paginate(100,['*'],'page',(int)$_GET['page']); 
                echo "1";
                
                }elseif(!empty($_GET['month']) && !empty($_GET['year'])){
                $EnquiryTables=App\Models\CirculersTable::where('monthcirculer','=',$_GET['month'])->where('yearcirculer','=',$_GET['year'])->orderBy("id","DESC")->paginate(100,['*'],'page',(int)$_GET['page']); 
                
                }elseif(!empty($_GET['month']) && empty($_GET['year'])){
                $EnquiryTables=App\Models\CirculersTable::where('monthcirculer','=',$_GET['month'])->orderBy("id","DESC")->paginate(100,['*'],'page',(int)$_GET['page']); 
                
                }elseif(!empty($_GET['year']) && empty($_GET['month'])){
                $EnquiryTables=App\Models\CirculersTable::where('yearcirculer','=',$_GET['year'])->orderBy("id","DESC")->paginate(100,['*'],'page',(int)$_GET['page']); 
                
                }else{
                $EnquiryTables=App\Models\CirculersTable::orderBy("id","DESC")->paginate(100,['*'],'page',(int)$_GET['page']);
                
                }
                $srno = 1; 
		        foreach($EnquiryTables as $EnquiryTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td><a href="edit-circuler.php?id=<?php echo $EnquiryTable->id;?>"><?php echo $EnquiryTable->title;?></a></td>
					<td><?php echo $EnquiryTable->region;?></td>
					<td><?php echo $EnquiryTable->daycirculer;?>/<?php echo $EnquiryTable->monthcirculer;?>/<?php echo $EnquiryTable->yearcirculer;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-circulers.php?id=<?php echo $EnquiryTable->id;?>&action=delete">Delete</a></td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Region</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$EnquiryTables->withPath('all-circulers.php'); 
				$pages= $EnquiryTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-circulers.php?".
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