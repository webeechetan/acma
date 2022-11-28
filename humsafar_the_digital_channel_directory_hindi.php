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
        <input type="hidden" value="hin" name="lang">
          <div class="row">
            <div class="col-12 mb-4 text-center">
              <h3 class="title"><b class="text-orange">ACMA</b> हमसफ़र डिजिटल चैनल डायरेक्टरी </h3>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-4">
              <input type="text" class="form-control text-capitalize" style="text-transform: capitalize;" name="name" placeholder="नाम" required>
            </div>
            <div class="col-12 mb-4">
              <input type="text" class="form-control" name="address" placeholder="पता" required>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4 mb-4">
              <select class="form-control" name="state" onchange="locationapi('city')" id="am_state">
                  <option value="" selected disabled>राज्य चुनें</option>
              </select>
            </div>
            <div class="col-sm-4 mb-4">
              <select class="form-control" name="city"  id="am_city">
                  <option value="" selected disabled>शहर चुनें</option>
              </select>
            </div>
            <div class="col-sm-4 mb-4">
              <input type="text" class="form-control" name="pincode" placeholder="पिन कोड">
            </div>
          </div>

          <div class="row">
              <div class="col-12 mb-4">
              <input type="text" class="form-control" name="company" placeholder="कंपनी का नाम" required>
            </div>
            <div class="col-12 mb-4">
              <input type="email" class="form-control" name="email" placeholder="ईमेल आईडी" required>
            </div>
            <div class="col-12 d-flex mb-2">
              <input type="tel" class="form-control" name="mobile" placeholder="मोबाइल नंबर" required>
              <button type="button" onclick="verifyOTP()" class="btn btn-link ml-2" id="sendOTPButtonID" style="min-width: 90px;">OTP भेजें</button>
            </div>
            <div class="col-12 mb-4">
              <label><b>आपके पंजीकृत मोबाइल नंबर पर ओटीपी भेजा जाएगा</b></label>
            </div>
            <div class="col-12 mb-4" id="otpContent" style="display:none;">
              <div class="verify-div bg-light p-4 px-sm-5 text-center">
                <div class="d-sm-flex">
                  <input type="text" class="form-control mr-2 mb-3 mb-sm-0" name="otp" placeholder="यहां डालें OTP" style="">
                  <button type="button" onclick="verifyOTP()" class=" text-nowrap btn btn-primary" id="verifyButtonID">OTP वेरीफाई करें</button>
                </div>
                <div class="d-flex justify-content-center mt-3">
                  <button type="button" onclick="verifyOTP('resend')" class="btn btn-link" id="resendButtonID">OTP दुबारा भेजें</button>
                  <button type="button"  class="btn btn-link ml-3" id="changeButtonID" onclick="changeNumber()">मोबाइल नंबर बदलें</button>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <label><b>सेवा श्रेणी</b></label>
            </div>
            <div class="col-12 mb-4">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="डीलर" name="service[]">
                <label class="form-check-label" for="inlineCheckbox11"><b>डीलर</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox22" value="डिस्ट्रीब्यूटर" name="service[]">
                <label class="form-check-label" for="inlineCheckbox22"><b>डिस्ट्रीब्यूटर</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox33" value="रिटेलर" name="service[]">
                <label class="form-check-label" for="inlineCheckbox33"><b>रिटेलर</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox44" value="वर्कशॉप ओनर" name="service[]">
                <label class="form-check-label" for="inlineCheckbox44"><b>वर्कशॉप ओनर</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox55" value="मैकेनिक/तकनीशियन" name="service[]">
                <label class="form-check-label" for="inlineCheckbox55"><b>मैकेनिक/तकनीशियन</b></label>
              </div>
              <div class="form-check form-check-inline" data-am="category">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox66" onclick="checkboxval()" value="option6" name="service[]">
                <label class="form-check-label" for="inlineCheckbox66"><b>अन्य:</b></label>
                <input type="text" class="form-control ml-2 text-capitalize" onkeyup="checkboxval()">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <label><b>प्रस्तुत किए गए खंड</b></label>
            </div>
            <div class="col-12 mb-4">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="ट्रैक्टर" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox1"><b>ट्रैक्टर</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="टू-व्हीलर" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox2"><b>टू-व्हीलर</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="थ्री-व्हीलर" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox3"><b>थ्री-व्हीलर</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="पैसेंजर व्हीकल" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox4"><b>पैसेंजर व्हीकल</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="एलसीवी" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox5"><b>एलसीवी</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="एमसीवी" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox5"><b>एमसीवी</b></label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="एचसीवी" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox5"><b>एचसीवी</b></label>
              </div>
              <div class="form-check form-check-inline" data-am="category">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox8"  onclick="checkboxval()" value="option8" name="segment[]">
                <label class="form-check-label" for="inlineCheckbox8"><b>अन्य:</b></label>
                <input type="text" class="form-control ml-2 text-capitalize" onkeyup="checkboxval()">
              </div>
            </div>
          </div>
          
          <?php
          $b_p_c = ["बॉडी पार्ट्स", "ड्राइव ट्रांसमिशन और स्टीयरिंग पार्ट्स", "इलेक्ट्रिकल इक्विपमेंट और इलेक्ट्रिकल पार्ट्स", "इंजन पार्ट्स", "सस्पेंशन और ब्रेकिंग पार्ट्स", "वेहिकुलर एक्सेसरीज", "लुब्रिकेंट्स और फिल्टर", "टायर और बैटरी"];
          ?>
          <div class="row">
            <div class="col-12">
              <label><b>व्यापक उत्पाद श्रेणी</b></label>
            </div>
            <div class="col-12 mb-4">
            <?php
            $count  = 0;
            foreach($b_p_c as $bpc) {
                ++$count;
            ?>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="bpc_<?php echo $count; ?>" value="<?php echo $bpc; ?>" name="broad_product_category[]">
                <label class="form-check-label" for="bpc_<?php echo $count; ?>"><b><?php echo $bpc; ?></b></label>
              </div>
             <?php
            }
             ?>
              <div class="form-check form-check-inline" data-am="category">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox8"  onclick="checkboxval()" value="option8" name="broad_product_category[]">
                <label class="form-check-label" for="inlineCheckbox8"><b>अन्य:</b></label>
                <input type="text" class="form-control ml-2 text-capitalize" onkeyup="checkboxval()">
              </div>
            </div>
          </div>
          
          <div class="row mt-3">
              <div class="col text-center">
                  <button type="submit" class="btn btn-primary" name="proceed">SUBMIT</button>
              </div>
          </div>
        </form>
        <!-- ACKNOWLEDGE -->
        <div class="row justify-content-center"  id="acknowledgeContent" style="display:none;"><!-- style="display:none;" -->
          <div class="col-sm-12">
            <div class="acknowledgeContent bg-white shadow-sm">
                <div id="acknowledgeContentPrint" class="px-4 bg-white">
                      <div class="row certificate-border">
                        <div class="watermark-acma-logo">
                            <img src="images/ACMA-print.png" class="img-fluid">
                        </div>
                        <div class="col-sm-12" style="margin:auto;">
                            <div  style="text-align:center;"><img src="images/ACMA-print.png" class="img-fluid w-50"></div>
                        </div>
                        <div class="col-12 text-center">
                            <br>
                            <div class="text-big">यह स्वीकार और प्रमाणित किया जाता है कि  
                        	<span id="acknowlegeCompany" style="font-weight:bold;"></span> से <span id="acknowlegeName" class="text-capitalize" style="font-weight:bold;"></span> ने <span id="acknowlegeService" style="font-weight:bold;"></span> के रूप में ऑटोमोटिव कंपोनेंट मैन्युफैक्चरर्स एसोसिएशन ऑफ इंडिया (ACMA) का, 
                        	ACMA आफ्टरमार्केट चैनल डायरेक्टरी के अभियान के
                        	तहत पंजीकरण कराया है,  जो कि पूरे ऑटोमोटिव इकोसिस्टम को 
                        	कवर करता है।
                        	</div>
                        	<br>
                        	<h6>ऑटोमोटिव कंपोनेंट मैन्युफैक्चरर्स एसोसिएशन ऑफ इंडिया (ACMA)<br>
                        	छठी मंजिल, द कैपिटल कोर्ट <br>
                        	ओलोफ पाल्मे मार्ग, मुनिरक <br>
                        	नई दिल्ली 110 067</h6>
                        	<br>
                        </div>
                        <div class="col-12" style="margin-bottom: 20px;">
                            <div style="display:inline-block; float:left; text-align: center; font-family: 'Dancing Script', cursive; font-weight:bold;">Vinnie Mehta <br>(DG, ACMA)</div> 
                            <div style="display:inline-block; float:right; text-align: center; font-family: 'Dancing Script', cursive; font-weight:bold;">Rama Shankar Pandey <br>(Managing Director, Hella India)</div>
                        </div>
                      </div>
                </div>
              <div class="row my-4 text-center">
                <div style="margin:auto;">
                    <button class="btn btn-primary  mr-2 mb-2" onclick="printDiv()">प्रिंट</button>
                    <button class="btn btn-primary mb-2" id="downloadPDF"> डाउनलोड पीडीऍफ़</button>
                </div>
              </div>
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
function locationapi(e) {
        if(!sessionStorage.getItem("access-token")) {
            const myHeaders = {
                "url": "https://www.universal-tutorial.com/api/getaccesstoken",
                "method": "GET",
                "headers": {
                    "api-token": "kP6UVhJHppu8hjoPirrViYUkS7HsYdAWgDXTpnxYcQChRbP5kWT7hmHMUkU_MlrzNjg",
                    "Accept": "application/json",
                    "user-email": "gejahom937@sejkt.com"
                }
            };
            $.ajax(myHeaders).done((response) => {
                sessionStorage.setItem("access-token", response.auth_token);
                apiCalling();
            });
        } else { apiCalling(); }

        function apiCalling() {
            let url;
            switch(e) {
                case "state":
                    url = "https://www.universal-tutorial.com/api/states/India";
                    break;
                case "city":
                    url = "https://www.universal-tutorial.com/api/cities/"+am_state.value;
                    break;
                default:
                    return;
            }
            const settings = {
            "url": url,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": `Bearer ${sessionStorage.getItem("access-token")}`,
                "Accept": "application/json",
            },
        };

            $.ajax(settings).done(function (response) {
            if(response.error) {
                sessionStorage.removeItem("access-token");
                locationapi(e);
                return;
            }
            let collection = "";
            switch(e) {
                case "state":
                    collection = "<option selected disabled>राज्य चुनें</option>";
                    for(let i = 0; i < response.length; i++) {
                        collection += `<option value="${response[i].state_name}">${response[i].state_name}</option>`;
                    }
                    $("#am_state").html(collection);
                    break;
                case "city":
                    collection = "<option selected disabled>शहर चुनें</option>";
                    for(let i = 0; i < response.length; i++) {
                        collection += `<option value="${response[i].city_name}">${response[i].city_name}</option>`;
                    }
                    $("#am_city").html(collection);
                    break;
            }
            // $('select').selectpicker('refresh');
            });
        }
    }
function checkboxval() {
    let checkbox, textbox;
   const c = $("div[data-am='category']");
   for(let t of c) {
       checkbox = $(t).find(`input[type = 'checkbox']`);
       textbox = $(t).find(`input[type = 'text']`);
       if($(checkbox).prop('checked') === true) {
           $(checkbox).val($(textbox).val());
           continue;
       }
       $(checkbox).val('');
       $(textbox).val('');
   }
}
let phoneNumber = document.forms.aftermarketFormId.mobile.value;
let activity = "verify";

const verifyOTP = async (e = false) => {

    if(document.forms.aftermarketFormId.mobile.value == "" || document.forms.aftermarketFormId.mobile.value == null){

        alert("सबसे पहले मोबाइल नंबर भरें");
        return;
    }

    if(e === "resend"){activity = "verify";}

    var postData = {

        "mobile": document.forms.aftermarketFormId.mobile.value,
        "activity": activity,
        "otp": document.forms.aftermarketFormId.otp.value
    };
    try{

        const request = await commonAjax("aftermarket-channel/index.php", postData);
        handleRequest(request);
    } catch(err) {alert("error occurred!");console.log(err);}
}

function handleRequest(status) {
    switch(status.activity) {
        case "verify":
            $("#otpContent").fadeIn();
            document.forms.aftermarketFormId.mobile.readOnly = true;
            sendOTPButtonID.removeAttribute("onclick");
            $("#sendOTPButtonID").hide();
            activity = "otpsubmit";
            break;

        case "otpsubmit":
            $("#sendOTPButtonID").show();
            sendOTPButtonID.innerHTML = "वेरिफाइड";
            sendOTPButtonID.removeAttribute("onclick");
            activity = "verified";
            $("#otpContent").fadeOut();
            document.forms.aftermarketFormId.proceed.disabled = false;
            break;

        case "resend":
            document.forms.aftermarketFormId.otp.value = "";
            // verifyButtonID.disabled = true;
            // verifyButtonID.setAttribute('onclick', );
            activity = "otpsubmit";
            break;

        default:
            activity = "verify";
    }
    alert(status.error_hindi ?? "something went wrong");
}

function changeNumber() {

    $("#otpContent").fadeOut();
    $("#sendOTPButtonID").show();
    document.forms.aftermarketFormId.mobile.readOnly = false;
    sendOTPButtonID.setAttribute("onclick", "verifyOTP()");
    document.forms.aftermarketFormId.otp.innerHTML = "";
    activity = "verify";
}

async function contactFormSubmit(event) {
  event.preventDefault();
  if(sendOTPButtonID.innerHTML === "वेरिफाइड"){
    try{
      const request = await commonAjax("aftermarket-channel/index.php", $("#aftermarketFormId").serialize());
      if(request.success == true){

        alert(request.error_hindi);
        aftermarketFormId.remove();
        $("#acknowledgeContent").fadeIn();
        acknowlegeName.innerHTML = request.data.name ?? '-';
        acknowlegeCompany.innerHTML = request.data.company ?? '-';
        acknowlegeService.innerHTML = request.data.service ?? '-';

      }
      else{

        alert(request.error_hindi ?? "something went wrong");
        location.reload();
      }

    } catch(err) {alert("Error occurred!");location.reload();};

  } else {
    alert("पहले अपना मोबाइल नंबर वेरिफाइड करें");
  }
}

function printDiv() {
  var divContents = document.getElementById("acknowledgeContentPrint").innerHTML;

  var a = window.open('', '', 'height=500, width=500');
  a.document.write('<html>');
  a.document.write('<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet"><link rel="stylesheet" href="css/bootstrap.min.css"><link rel="stylesheet" href="css/custom.css">');
  a.document.write('<body style="text-align:center;">');
  a.document.write('<br><div class="container" style="position:relative;">');
  a.document.write(divContents);
  a.document.write('</div></body></html>');
  a.document.close();
  setTimeout(() => a.print(), 2000);
}
window.onload = function () {
 document.getElementById("downloadPDF")
        .addEventListener("click", () => {
            const htmlDATA = this.document.getElementById("acknowledgeContentPrint");
            var opt = {
                margin: 1,
                filename: 'Acknowledgement.pdf',
                image: { type: 'jpeg', quality: 2 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
            };
            html2pdf().from(htmlDATA).set(opt).save();
        });
        
    $(`h4[data-footer='contact-us']`).html(`संपर्क करें`);
    
    $("li[data-footer='address']").html(`<span><i class="fas fa-map-marker-alt"></i></span><span> ऑटोमोटिव कंपोनेंट मैन्युफैक्चरर्स<br/>एसोसिएशन ऑफ इंडिया<br/>कैपिटल कोर्ट, छठी मंजिल, ओलोफ पाल्मे मार्ग,<br/>मुनिरका,  नई दिल्ली - 110 067</span>`);
}
</script>
<?php include('includes/footer-new.php');?>
<script>
    locationapi('state');
</script>