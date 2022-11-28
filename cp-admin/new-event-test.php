<?php include("header.php");

if(isset($_POST['title'])){
	
	$title = $_POST['title'];	
	$cat = $_POST['cat'];	
	$about = $_POST['about'];
    $location = $_POST['location'];
    $howto = $_POST['howto'];
    $url = $_POST['url'];
	$eventdate = $_POST['eventdate'];
    $status = $_POST['status'];
    $event_img = $_FILES['event_img']['name'];
   
   // events-test
         $row = move_uploaded_file($_FILES["event_img"]["tmp_name"],"../uploads/events-test/".$event_img);
         

	
    $events = new App\Models\EventsTabletest();
    $events->cat = $cat;
    $events->title = $title;
	$events->about = $about;
	$events->location = $location;
    $events->howto = $howto;
    $events->status = $status;
    $events->url = $url;
    $events->eventdate = $eventdate;
    $events->event_img = $event_img;
    
	$events->save();
	//new
// 	$target = FS_UPLOADS_PATH.'/gallery/';
// 	if(isset($_FILES['event_img'])){
	
//       	if(copy($_FILES['event_img']['tmp_name'],$target.basename($_FILES['event_img']['name']) )) 
// 		{
// 			$attach = basename($_FILES['event_img']['name']);
// 			$	$event_img->photo=$attach ;
// 		}	

// 	}
// 	$events->save();

	header( 'location:all-events-test.php?msg=add' );	
	exit;
}
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> New Event</h3>
            </div>
            <div class="widget-content">
            <form name="frm" method="post" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" width="100%">
			    <tr>
					<td width="200">Category</td>
					<td><select name="cat"><option value="1">National</option><option value="2">International</option></select></td>
				</tr>
			    <tr>
					<td width="200">Title</td>
					<td><input type="text" name="title"></td>
				</tr>
				<tr>
					<td width="200">About Us</td>
					<td><textarea name="about" rows="15" style="width: 100%" ></textarea></td>
				</tr>
				<tr>
					<td width="200">Location</td>
					<td><textarea name="location" rows="15" style="width: 100%" ></textarea></td>
				</tr>
				<tr>
					<td width="200">How To Get There</td>
					<td><input type="text" name="howto"></td>
				</tr>
				<tr>
					<td width="200">Event Date</td>
					<td><input type="text" name="eventdate"></td>
				</tr>
				<tr>
					<td width="200">URL</td>
					<td><input type="text" name="url"></td>
				</tr>
				<tr>
					<td width="200">Event image</td>
					<td><input type="file" name="event_img"></td>
				</tr>
				<tr>
					<td width="200">Status</td>
					<td><select name="status"><option value="1">Enable</option><option value="0">Disable</option></select></td>
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