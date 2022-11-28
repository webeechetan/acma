<?php
session_start();
unset($_SESSION['otp']);
include("includes/header-new.php");
?>

<!-- Hero Section -->
<section class="hero-inner-sec">
  <img src="img/Banner_New.png" class="w-100">
</section>
<!-- Form Section -->
<section class="bg-light sec-space">
  <div class="container">
    <div class="row">
      <div class="col-md-9 mx-auto">
        <!-- FORM -->
        <form class="aftermarket-form"  id="aftermarketFormId" method="POST" onsubmit="contactFormSubmit(event);">

          <div class="row">
            <div class="col-12 mb-4 text-center">
              <h3 class="title"><b class="text-orange">ACMA</b> Aftermarket Channel Directory</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-4">
              <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="col-12 mb-4">
              <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4 mb-4">
              <input type="text" class="form-control" name="city" placeholder="City">
            </div>
            <div class="col-sm-4 mb-4">
              <input type="text" class="form-control" name="pincode" placeholder="Pin Code">
            </div>
            <div class="col-sm-4 mb-4">
              <input type="text" class="form-control" name="state" placeholder="State">
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-4">
              <input type="email" class="form-control" name="email" placeholder="Email ID">
            </div>
            <div class="col-12 mb-4">
              <input type="tel" class="form-control" name="mobile" placeholder="Contact Number">
              <button type="button" onclick="verifyOTP(this)" class="btn btn-link ml-2" id="verifyButtonID">Send OTP</button>

              <!-- Modal -->
              <div class="modal fade verify-pop" id="verify-pop" tabindex="-1" aria-labelledby="verify-popLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body p-4 p-sm-5">
                      <!--<input type="text" class="form-control" id="afterMarketOTP" placeholder="Enter OTP">-->
                    </div>
                    <div class="text-center my-2">
                        <button type="button" class="btn btn-primary" onclick="validateOTP()">SUBMIT</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="">
              <input type="text" class="form-control" name="otp" placeholder="Enter OTP" style="display:none;">
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <label><b>Service Category</b></label>
            </div>
            <div class="col-12 mb-4">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="Dealer" name="service[]">
                <label class="form-check-label" for="inlineCheckbox11"><b>Dealer</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox22" value="Distributor" name="service[]">
                <label class="form-check-label" for="inlineCheckbox22"><b>Distributor</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox33" value="Retailer" name="service[]">
                <label class="form-check-label" for="inlineCheckbox33"><b>Retailer</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox44" value="Workshop Owner" name="service[]">
                <label class="form-check-label" for="inlineCheckbox44"><b>Workshop Owner</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox55" value="Mechanic/Technician" name="service[]">
                <label class="form-check-label" for="inlineCheckbox55"><b>Mechanic/Technician</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox66" value="option6" name="service[]">
                <label class="form-check-label" for="inlineCheckbox66"><b>Other:</b></label>
                <input type="text" class="form-control ml-2" name="" placeholder="" onkeyup="inlineCheckbox66.value = this.value;">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <label><b>Segments Served</b></label>
            </div>
            <div class="col-12">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Tractor" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox1"><b>Tractor</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="opTwo Wheelertion2" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox2"><b>Two Wheeler</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Three Wheeler" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox3"><b>Three Wheeler</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Passenger Vehicle" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox4"><b>Passenger Vehicle</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="LCV" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox5"><b>LCV</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="MVC" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox5"><b>MVC</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="HCV" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox5"><b>HCV</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option8" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox6"><b>Other:</b></label>
                <input type="text" class="form-control ml-2" name="" placeholder="" onkeyup="inlineCheckbox8.value = this.value;">
              </div>
            </div>
          </div>
          <div class="row my-2">
              <div class="col text-center">
                  <button type="submit" class="btn btn-primary" name="proceed">SUBMIT</button>
              </div>
          </div>
        </form>
        <!-- ACKNOWLEDGE -->
        <div class="row justify-content-center" id="acknowledgeContent" style="display:none;">
          <div class="col-sm-12">
              <div class="row" id="acknowledgeContentPrint">
                  <div class="col-sm-4">
                      <div style="background-color:#5c7f97;"><img src="images/logo.png" class="img-fluid"></div>
                  </div>
                  <div class="col-12 text-center">
                      <hr>
                      <br>
                      <p>This is to acknowledge and certify that <span id="acknowlegeName" style="font-weight:bold;"></span> from <span id="acknowlegeCompany" style="font-weight:bold;"></span>
                      has registered as a <span id="acknowlegeService" style="font-weight:bold;"></span> under Automotive Component Manufactures Association of India's (ACMA)
                      drive for <span style="font-weight:bold;">ACMA Aftermarket Channel Directory</span> covering the entire Automotive ecosystem.</p>
                      <br>
                      <h6>Automotive Component Manufactures Association of India (ACMA) <br>
                      6th Floor, The Capital Court <br>
                      Olof Palme Marg, Munirka <br>
                      New Delhi 110 067</h6>
                      <br>
                      <hr>
                  </div>
              </div>
              <div class="row">
                  <div style="text-align:right;"><button class="btn btn-sm btn-outline-success" onclick="printDiv()">Print</button></div>
              </div>
          </div>
         </div>
      </div>
    </div>
  </div>
</section>
<script>
async function commonAjax(page, param) {
    const rawResponse = await $.ajax({
        url: page,
        type: 'POST',
        dataType: 'json',
        async: true,
        data: param,
    })
    let temp =  await rawResponse;
    return temp;
};

let phoneNumber = document.forms.aftermarketFormId.mobile.value;
let activity = "verify";
const verifyOTP = async (e) => {
  if(document.forms.aftermarketFormId.email.value == "" || document.forms.aftermarketFormId.email.value == null){

    alert("Fill email id first!");
    return;

  }

  var postData = {
    "email": document.forms.aftermarketFormId.email.value,
    "activity": activity,
    "otp": document.forms.aftermarketFormId.otp.value
  };

  try{
    const request = await commonAjax("aftermarket-channel/index.php", postData);
    if(request.activity === "verify"){

      document.forms.aftermarketFormId.mobile.style.display = "none";
      document.forms.aftermarketFormId.otp.style.display = "inline-block";
      verifyButtonID.innerHTML = "Submit";
      alert(request.message ?? "something went wrong");
      activity = "otpsubmit";

    } else if(request.activity === "otpsubmit"){

      document.forms.aftermarketFormId.mobile.style.display = "inline-block";
      document.forms.aftermarketFormId.mobile.readOnly = true;
      document.forms.aftermarketFormId.otp.style.display = "none";
      verifyButtonID.innerHTML = "Verified";
      verifyButtonID.removeAttribute("onclick");
      alert(request.message ?? "something went wrong");
      activity = "verified";
      document.forms.aftermarketFormId.proceed.disabled = false;

    } else if(request.activity === "resend"){

      document.forms.aftermarketFormId.otp.value = "";
      document.forms.aftermarketFormId.mobile.style.display = "inline-block";
      document.forms.aftermarketFormId.otp.style.display = "none";
      verifyButtonID.innerHTML = "Resend";
      alert(request.message ?? "something went wrong");
      activity = "verify";

    } else {

      alert("something went wrong");
      activity = "verify";

    }

  } catch(err) {alert("error occurred!");console.log(err);}

}

async function contactFormSubmit(event) {
  event.preventDefault();
  if(verifyButtonID.innerHTML === "Verified"){
    try{

      const request = await commonAjax("aftermarket-channel/index.php", $("#aftermarketFormId").serialize());
      if(request.success == true){

        alert(request.message);
        aftermarketFormId.remove();
        $("#acknowledgeContent").fadeIn();
        acknowlegeName.innerHTML = request.data.name ?? '-';
        acknowlegeCompany.innerHTML = request.data.company ?? '-';
        acknowlegeService.innerHTML = request.data.service ?? '-';

      }
      else{

        alert(request.message ?? "something went wrong");
        location.reload();
      }

    } catch(err) {alert("error occurred!");location.reload();};

  } else {
    alert("Verfify your email first!");
  }
}

function printDiv() {
  var divContents = document.getElementById("acknowledgeContentPrint").innerHTML;

  var a = window.open('', '', 'height=500, width=500');
  a.document.write('<html>');
  a.document.write('<body style="text-align:center;"><br>');
  a.document.write(divContents);
  a.document.write('</body></html>');
  a.document.close();
  a.print();
}
</script>
<?php include('includes/footer-new.php');?>