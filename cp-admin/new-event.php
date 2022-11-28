<?php include("header.php");
include("PushNotifications.php");

$conn = mysqli_connect("localhost", "techtonic", "d#4ab01db3!bT", "acma_web");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($_POST['title'])) {

	$title = $_POST['title'];
	$region = $_POST['region'];

	$sql1 = "INSERT INTO send_notifications (title,event_name) VALUES('event' ,'$title')";


	if (mysqli_query($conn, $sql1)) { ?>

<?php } else {
		echo "" . mysqli_error($conn);
	}
}



if (isset($_POST['title'])) {

	$title = $_POST['title'];
	$cat = $_POST['cat'];
	$about = $_POST['about'];
	$location = $_POST['location'];
	$howto = $_POST['howto'];
	$url = $_POST['url'];
	$eventdate = $_POST['eventdate'];
	$status = $_POST['status'];
	$event_img = $_FILES['event_img']['name'];
	$row = move_uploaded_file($_FILES["event_img"]["tmp_name"], "../uploads/events-image/" . $event_img);

	$events = new App\Models\EventsTable();
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


	$notification_for_member = '1';
	$notification_for_guest  = '0';

	//  here notification code will be written there only ....

	$device_token    =  $row_data['fcm_id'];
	$fields          =  ["title" => "new Event $title", "body" => "Tap to view more details", "click_action" => "FLUTTER_NOTIFICATION_CLICK", "isPublication" => '', "isEvent" => true, "isnotify" => true];
	$response        =  PushNotifications::sendPushNotification($fields, $notification_for_member, $notification_for_guest);
	//print_r($response); 

	header('location:all-events.php?msg=add');
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
										<td>
											<select name="cat">
												<option value="1">National</option>
												<option value="2">International</option>
												<option value="3">ACOE</option>
												<option value="6">SOUTHERN REGION EVENTS</option>
												<option value="4">EASTERN REGION EVENTS</option>
												<option value="5">NORTHEN REGION EVENTS</option>
												<option value="7">WESTERN REGION EVENTS</option>
												<option value="8">YBLF EVENTS</option> 
												<option value="9">CLUSTER AND PROJECTS</option> 
												
											</select>
										</td>
									</tr>
									<tr>
										<td width="200">Title</td>
										<td><input type="text" name="title"></td>
									</tr>
									<tr>
										<td width="200">About Us</td>
										<td><textarea name="about" rows="15" style="width: 100%"></textarea></td>
									</tr>
									<tr>
										<td width="200">Location</td>
										<td><textarea name="location" rows="15" style="width: 100%"></textarea></td>
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
										<td><select name="status">
												<option value="1">Enable</option>
												<option value="0">Disable</option>
											</select></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input type="submit" name="action" value="Submit"> <input type="reset" value="Cancel"></td>
									</tr>
								</table>
							</form>
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
<?php include("footer.php"); ?>