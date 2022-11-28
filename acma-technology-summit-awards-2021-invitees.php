<?php include( "includes/header.php");

use App\Models\AcmaEventSummit ;  

use App\Models\AchmaEventMembers;

#ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$style ="display:block";

if (isset($_POST['billing_name']) && isset($_POST['billing_email']))

{	 

	

	$data = $_POST;

	

	$event = new AcmaEventSummit();

	$event->billing_name = $data['billing_name'];

	$event->designation = $data['designation'];

	$event->billing_email = $data['billing_email'];

	$event->billing_tel = $data['billing_tel'];

	$event->company_name = $data['company_name'];

	// $event->eligibility = $data['eligibility'];

	// $event->number_of_member = $data['number_of_member'];

	$event->save();

	$user = $event->id;



	if ($user)

	{

		

		foreach($_POST['member_name'] as $key =>$value){

			if(!empty($value)){

				$eventMember = new App\Models\AchmaEventMembers();

				$member_data['acma_id']  = $user;

				$member_data['member_name']  = $value;

				$member_data['member_email']  = $_POST['member_email'][$key];

				$member_data['member_mobile_no']  = $_POST['member_mobile_no'][$key];

				$member_data['member_designation']  = $_POST['member_designation'][$key];

				

				$eventMember->insertUser($member_data);

			}

		}

		$message='<p class="alert">Thank You.</p>';

		$style ="display:none;";

	}

	else

	{

		$message='<p class="alert">There is something wrong in the data.</p>';

		

		

	}

	

}



?>

<section id="intro" class="clearfix">

	<div class="introimg">

		<div class="container">

			<div class="secondarymenu">

				<div class="row">

					<div class="secondarymenu-right">

						<?php include( "includes/secondaory-menu.php");?>

					</div>

				</div>

			</div>

		</div>

		<img src="img/acma-technology-summit-awards-2020.png" class="img-fluid">

	</div>

</section>

<main id="main"> 

	<section id="innerpage payment-page" class="greybg">

		<div class="container">

		<style>

        .whitebg{ background-color:#fff; padding:35px 15px 25px 0 ; margin-bottom:25px;}

        .whitebgleft{ float:left;width:50%;}

        .whitebgleft h2{ text-align:left !important;}

        .whitebgright{ float:right;width:50%; text-align:right; line-height:21px;}

        .clearfix{ clear:both;}

        .whitebgleft span{ background-color:#27417a; color:#fff; padding:10px 20px; display: inline-block;}

        .text18{ font-size:18px;}

        .bluetxt{ text-align:center; font-size:16px; margin:25px 0;}

        p{ line-height:21px; font-size:14px;}

        .buttons a{ margin:0 10px; padding:15px 25px; text-align:center; color:#fff; font-size:18px; text-transform:uppercase; display:inline-block;}

        .buttons a.blue{background-color:#2799fa;}

        .buttons a.grey{background-color:#313131;}

        .yellowbg{ background-color:#f1da3f; text-align:center; padding:25px; color:#27417a; font-size:16px; margin-bottom:25px;}

        #innerpage.whitebg {background: transparent !important;}

        @media only screen and (max-width: 600px) {

            .whitebgleft,.whitebgright {

              width:100%; float:none;

              margin-bottom:15px;

              text-align:center;

            }

            .whitebgleft h2{ font-size:16px !important;}

            .buttons a{ margin-bottom:15px;}

          }

      </style>

        <div id="innerpage" class="whitebg back-btn buttons p-3">

          <div class="whitebgleft"><h2><span>ACMA</span> Technology Summit Awards 2021</h2></div>      

          <div class="whitebgright"><a href="acma-technology-summit-awards-2020.php" class="yellowbg text-dark">Back</a></div> 

          <div class="clearfix"></div>

		</div>

		  	

			<div class="paymentform">

				<?php if($message){

						echo '<h2>Thank you for registering for 6th ACMA Technology Summit and Awards 2021. You will receive the event joining link prior to summit.</h2>';

				}else{?>

				<h2>Fields with * are compulsory.</h2> 

				<?php } ?>

				<script>

					window.onload=function(){var d=new Date().getTime();document.getElementById("tid").value=d;document.getElementById("order_id").value=d;};

				</script>

				<style>

					.paymentform input[type="email"]{width:100%;padding:5px;border:solid #adadad 1px;border-radius:5px;box-shadow:inset 1px 2px 8px rgba(0, 0, 0, 0.07)}

				</style>

				<form name="frm"  id ="event_2020"class="sponsors-form" method="post" action="" style="<?php echo $style; ?>">

					<div class="row">

						<div class="col-sm-6">

							<label>Name <span class="required">*</span> :</label>

							<input type="text" class="required text-dark" name="billing_name" >

						</div>

						<div class="col-sm-6">

							<label>Designation <span class="required">*</span> :</label>

							<input type="text" class="required text-dark" name="designation" >

						</div>

					</div>

					<div class="row">

						<div class="col-sm-6">

							<label>Email <span class="required">*</span> :</label>

							<input type="text" class="required email text-dark" name="billing_email" >

						</div>

						<div class="col-sm-6">

							<label>Mobile No <span class="required">*</span> :</label>

							<input type="text" class="required digit text-dark" maxlength="10" name="billing_tel"  >

						</div>

					</div>

					<div class="row">

						<div class="col-sm-6">

							<label>Company Name <span class="required">*</span> :</label>

							<input type="text" name="company_name" class="required text-dark">

						</div>

						<div class="col-sm-6">

							<label>Event Name <span class="required">*</span> :</label>

							<input type="text" name="event_name" value="ACMA Technology Summit Awards 2021" required disabled>

						</div>

					</div>

					 <!-- <div class="row">

						<div class="col-sm-6">

							<label>Eligibility<span class="required">*</span> :</label>

							<select id="select1" name="eligibility" class="form-control"></select>

						</div>

                        <div class="col-sm-6">

							<label>Select Number of Member <span class="required">*</span> :</label>

							<select id="select2" name="number_of_member" onchange="myFunction(this.value)" class="form-control" required></select>

						</div>

					</div>  -->

          <div id="appenHtml"></div>

          <div class="row">

            <div class="col-sm-12">

              <input type="checkbox" name="agree" value="1" required>I agree the <a href="terms&conditions.php" target="_blank">Terms & Conditions</a>

            </div>

          </div>

          <div class="row">

              

            <div class="col-sm-12 algncenter">

              <input type="submit" id="proceed" name="Proceed" Value="Proceed" class="btn">

            </div>

		  </div>

			<!-- <p>For any queries, please contact:-</p>

			<p>Mr. Deepak Jain,&nbsp;<a href="mailto:deepak.jain@acma.in">deepak.jain@acma.in</a>,&nbsp;+91 9810606125</p>

			<p>Mr. Rakesh Kumar,&nbsp;<a href="mailto:rakesh.kumar@acma.in">rakesh.kumar@acma.in</a>,&nbsp;+91 9050415286</p>

			<input type="hidden" name="order_id" id="order_id" readonly/>

			<input type="hidden" name="status" id="status" value="0" />

			<input type="hidden" name="tid" id="tid" readonly />

			<input type="hidden" name="merchant_id" value="173497" />

			<input type="hidden" name="language" value="EN" />

			<input type="hidden" name="formname" value="deligates_session_form" />

			<input type="hidden" name="redirect_url" value="https://www.acma.in/ccform/ccavResponseHandler1.php" />

			<input type="hidden" name="cancel_url" value="https://www.acma.in/ccform/ccavResponseHandler1.php" />-->

        </form>

      </div>

		</div>

	</section>

</main>

<?php include( "includes/footer.php");?>

<script language="javascript" type="text/javascript" src="ccform/json.js"></script>



<script src="ccform/jquery-1.7.2.min.js"></script>

<script language="javascript" type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>



<script type="text/javascript">

	var opt1 = ['Invitee', 'Award Applicant', 'Award Winner'],

	

		opt2 = [

	

			['0'],

	

			['0', '1', '2'],



            ['0', '1', '2', '3', '4']

	

		]

	jQuery(document).ready(function () {

	

		jQuery.each(opt1, function (i, e) {

	

			jQuery('#select1').append('<option value="' + i + '">' + e + '</option>');

	

		});

	

		jQuery.each(opt2[0], function (i, e) {

	

			jQuery('#select2').append('<option value="' + i + '">' + e + '</option>');

	

		});

		jQuery('body').on('change', '#select1', function () {

	

			jQuery('#select2').empty();

	

			jQuery.each(opt2[jQuery('#select1').val()], function (i, e) {

	

				jQuery('#select2').append('<option value="' + i + '">' + e + '</option>');

	

			});

	

		});

	

	});



  $(document).ready(function () {

    $('#select2').change(function () {

        $('#appenHtml').empty();

        

        for (var i = 0; i < $(this).val(); i++ ) {

            var temp = i;



            // var formElement = "<h1>Form - " + (+temp + +1) + "</h1>";



            var formElement = "<div id="+ (+temp + +1) +" class='members_div member_"+ (+temp + +1) +"'><div class='row'><div class='col-12'><p class='border-bottom pb-2 mb-3 font-weight-bold'>Member "+ (+temp + +1) +"</p></div><div class='col-sm-6 mb-3'> <label>Name <span class='required'>*</span> :</label> <input type='text' id='member_name"+ (+temp + +1) +"' name='member_name[]' class='required'></div><div class='col-sm-6 mb-3'> <label>Designation <span class='required'>*</span> :</label> <input type='text'  class='required' id='member_designation"+ (+temp + +1) +"' name='member_designation[]' ></div><div class='col-sm-6 mb-3'> <label>Email <span class='required'>*</span> :</label> <input type='text' id='member_email"+ (+temp + +1) +"' name='member_email[]'  class='required email'></div><div class='col-sm-6'> <label>Mobile No <span class='required'>*</span> :</label> <input type='text' id='member_tel"+ (+temp + +1) +"' name='member_mobile_no[]'   class='required digit' maxlength='10'></div></div></div>";



            $('#appenHtml').append(formElement);

        }

	});

	

	$('#event_2020').validate();

});





</script>

<script>

	/*$('#proceed').click(function(e){

		e.preventDefault();

		if($('#event_2020').valid()){

			data = $('#event_2020').serialize();

			$.ajax({

                type: 'post',

                url: 'acma-submit-ajax.php',

                data:data

              

                success: function(res, textStatus, jqXHR) {

					var json = JSON.parse(res);

					if (typeof json.msg != 'undefined')

					{

						alert(json.msg);

					}      

            });

		}

	})*/

</script>

