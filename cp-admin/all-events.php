<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$EventTable=App\Models\EventsTable::find((int)$_GET['id']);
	if($EventTable){
		$EventTable->delete();
	}
	header( 'location:all-events.php?msg=delete' );			
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
              <h3>All Events</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Category</th>
                        <th>Event Name</th>
                        <th>About</th>
                        <th>Location</th>
                        <th width="200">How to get there</th>
                        <th>Event Date</th>
                        <th>Event Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                $EventsTables=App\Models\EventsTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($EventsTables as $EventsTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td> 
					<td>
            <?php 
              if($EventsTable->cat == 1){
                echo "National";
              }elseif($EventsTable->cat == 2){
                echo "International";
              }elseif($EventsTable->cat == 3){
                echo "ACOE";
              }elseif($EventsTable->cat == 4){
                echo "EASTERN REGION EVENTS";
              }elseif($EventsTable->cat == 5){
                echo "NORTHEN REGION EVENTS";
              }elseif($EventsTable->cat == 6){
                echo "SOUTHERN REGION EVENTS";
              }elseif($EventsTable->cat == 7){
                echo "WESTERN REGION EVENTS";
              }elseif($EventsTable->cat == 8){
                echo "YBLF EVENTS";
              }elseif($EventsTable->cat == 9){
                echo "CLUSTER AND PROJECTS";
              }
            ?>
          </td>
					<td><a href="edit-event.php?id=<?php echo $EventsTable->id;?>"><?php echo $EventsTable->title;?></a></td>
					<td><?php echo $EventsTable->about;?></td>
					<td><?php echo $EventsTable->location;?></td>
					<td><?php echo $EventsTable->howto;?></td>
					<td><?php echo $EventsTable->eventdate;?></td>
						<td><?php echo $EventsTable->event_img;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-events.php?id=<?php echo $EventsTable->id;?>&action=delete">Delete</a></td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Category</th>
                        <th>Event Name</th>
                        <th>About</th>
                        <th>Location</th>
                        <th>How to get there</th>
                        <th>Event Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$EventsTables->withPath('all-events.php'); 
				$pages= $EventsTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-events.php?".
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