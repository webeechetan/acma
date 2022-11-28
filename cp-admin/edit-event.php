<?php include("header.php");

if(isset($_POST['title'])){
	$postid = $_POST['postid'];
	$cat = $_POST['cat'];	
	$title = $_POST['title'];	
	$about = $_POST['about'];
    $location = $_POST['location'];
    $howto = $_POST['howto'];	
	$eventdate = $_POST['eventdate'];
	$url = $_POST['url'];
    $status = $_POST['status'];
	
    $events = App\Models\EventsTable::find($postid);
    $events->title = $title;
    $events->cat = $cat;
	$events->about = $about;
	$events->location = $location;
    $events->howto = $howto;
    $events->status = $status;
    $events->url = $url;
    $events->eventdate = $eventdate;
	$events->save();

	header( 'location:all-events.php?msg=update' );	
	exit;
}
$event = App\Models\EventsTable::find((int)$_GET['id']);
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Edit Event</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="postid" value="<?php echo $_GET['id'];?>" />
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
					<td width="200">Category</td>
					<td>
						<select name="cat">
							<option value="1" <?php echo $event->cat == 1 ? 'selected' : '' ?>>National</option>
							<option value="2" <?php echo $event->cat == 2 ? 'selected' : '' ?>>International</option>
							<option value="3" <?php echo $event->cat == 3 ? 'selected' : '' ?>>ACOE</option>
							<option value="6" <?php echo $event->cat == 6 ? 'selected' : '' ?>>SOUTHERN REGION EVENTS</option>
							<option value="4" <?php echo $event->cat == 4 ? 'selected' : '' ?>>EASTERN REGION EVENTS</option>
							<option value="5" <?php echo $event->cat == 5 ? 'selected' : '' ?>>NORTHEN REGION EVENTS</option>
							<option value="7" <?php echo $event->cat == 7 ? 'selected' : '' ?>>WESTERN REGION EVENTS</option>
							<option value="8" <?php echo $event->cat == 8 ? 'selected' : '' ?>>YBLF EVENTS</option> 
							<option value="9" <?php echo $event->cat == 9 ? 'selected' : '' ?>>CLUSTER AND PROJECTS</option> 
						</select>
					</td>
				</tr>
			    <tr>
					<td width="200">Title</td>
					<td><input type="text" name="title"  value="<?php echo $event->title;?>"></td>
				</tr>
				<tr>
					<td width="200">About Us</td>
					<td><textarea name="about" rows="15" style="width: 100%" ><?php echo $event->about;?></textarea></td>
				</tr>
				<tr>
					<td width="200">Location</td>
					<td><textarea name="location" rows="15" style="width: 100%" ><?php echo $event->location;?></textarea></td>
				</tr>
				<tr>
					<td width="200">how to get there</td>
					<td><input type="text" name="howto"  value="<?php echo $event->howto;?>"></td>
				</tr>
				<tr>
					<td width="200">Event Date</td>
					<td><input type="text" name="eventdate" value="<?php echo $event->eventdate;?>"></td>
				</tr>
				<tr>
					<td width="200">URL</td>
					<td><input type="text" name="url" value="<?php echo $event->url;?>"></td>
				</tr>
				<tr>
					<td width="200">Status</td>
					<td>
					    <select name="status">
					    <option value="1"  <?php if($event->status == "1"){ echo "Selected";}?>>Enable</option>
					    <option value="0"  <?php if($event->status == "0"){ echo "Selected";}?>>Disable</option>
					    </select>
				    </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="action" value="Submit"> <input type="reset" value="Cancel"></td>
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