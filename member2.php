<?php include( "includes/header.php");?>
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
		<img src="img/acma-60-5.jpeg" class="img-fluid">
	</div>
</section>

<main id="main">
	<section id="innerpage payment-page" class="greybg">
		<div class="container">
			<div class="paymentform">
				<h2>Fields with * are compulsory.</h2> 
				<script>
					window.onload=function(){var d=new Date().getTime();document.getElementById("tid").value=d;document.getElementById("order_id").value=d;};
				</script>
				<style>
					.paymentform input[type="email"]{width:100%;padding:5px;border:solid #adadad 1px;border-radius:5px;box-shadow:inset 1px 2px 8px rgba(0, 0, 0, 0.07)}
				</style>
				<form name="frm" class="sponsors-form" method="post" action="ccform/ccavRequestHandler.php">
					<div class="row">
						<div class="col-sm-6">
							<label>Name <span class="required">*</span> :</label>
							<input type="text" name="billing_name" required>
						</div>
						<div class="col-sm-6">
							<label>Designation <span class="required">*</span> :</label>
							<input type="text" name="designation" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Email <span class="required">*</span> :</label>
							<input type="text" name="billing_email" required>
						</div>
						<div class="col-sm-6">
							<label>Mobile No <span class="required">*</span> :</label>
							<input type="text" name="billing_tel" min="10" max="12" required>
						</div>
					</div>          

					<div class="row">
						<div class="col-sm-6">
							<label>Currency <span class="required">*</span> :</label>
							<input type="text" readonly class="form-control-plaintext" name="currency" value="INR">
						</div>
						<div class="col-sm-6">
							<input type="hidden" name="payment_type" value="Online">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<label>Payment Option <span class="required">*</span> :</label>
							<input type="radio" name="payment_option" value="OPTCRDC">Credit Card &nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="payment_option" value="OPTNBK">Net Banking &nbsp;&nbsp;&nbsp;&nbsp;
							<input class="payOption" type="radio" name="payment_option" value="OPTDBCRD">Debit card</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<input type="checkbox" name="agree" value="1">I agree the <a href="">Terms & Conditions</a>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 algncenter">
							<input type="submit" name="" Value="Proceed" class="btn">
						</div>
					</div>
					<input type="hidden" name="order_id" id="order_id" readonly/>
					<input type="hidden" name="status" id="status" value="0" />
					<input type="hidden" name="tid" id="tid" readonly />
					<input type="hidden" name="merchant_id" value="173497" />
					<input type="hidden" name="language" value="EN" />
					<input type="hidden" name="formname" value="deligates_session_form" />
					<input type="hidden" name="redirect_url" value="https://www.acma.in/ccform/ccavResponseHandler.php" />
					<input type="hidden" name="cancel_url" value="https://www.acma.in/ccform/ccavResponseHandler.php" />
				</form>
			</div>
		</div>
	</section>
</main>
<?php include( "includes/footer.php");?>
<script language="javascript" type="text/javascript" src="ccform/json.js"></script>
<script src="ccform/jquery-1.7.2.min.js"></script>

<script type="text/javascript">
$(function () {
	var jsonData;
	var access_code = "AVVM67DI04BP90MVPB"
	var amount = "6000.00";
	var currency = "INR";
	$.ajax({
		url: 'https://secure.ccavenue.com/transaction/transaction.do?command=getJsonData&access_code=' + access_code + '&currency=' + currency + '&amount=' + amount,
		dataType: 'jsonp',
		jsonp: false,
		jsonpCallback: 'processData',
		success: function (data) {
			jsonData = data;
			processData(data);
			$.each(jsonData, function (index, value) {
				if (value.Promotions != undefined && value.Promotions != null) {
					var promotionsArray = $.parseJSON(value.Promotions);
					$.each(promotionsArray, function () {
						console.log(this['promoId'] + " " + this['promoCardName']);
						var promotions = "<option value=" + this['promoId'] + ">" + this['promoName'] + " - " + this['promoPayOptTypeDesc'] + "-" + this['promoCardName'] + " - " + currency + " " + this['discountValue'] + " " + this['promoType'] + "</option>";
						$("#promo_code").find("option:last").after(promotions);
					});
				}
			});
		},
		error: function (xhr, textStatus, errorThrown) {
			alert('An error occurred! ' + (errorThrown ? errorThrown : xhr.status));
		}
	});
	$(".payOption").click(function () {
		var paymentOption = "";
		var cardArray = "";
		var payThrough, emiPlanTr;
		var emiBanksArray, emiPlansArray;
		paymentOption = $(this).val();
		$("#card_type").val(paymentOption.replace("OPT", ""));
		$("#card_name").children().remove();
		$("#card_name").append("<option value=''>Select</option>");
		$("#emi_div").hide();
		$.each(jsonData, function (index, value) {
			if (paymentOption != "OPTEMI") {
				if (value.payOpt == paymentOption) {
					cardArray = $.parseJSON(value[paymentOption]);
					$.each(cardArray, function () {
						$("#card_name").find("option:last").after("<option class='" + this['dataAcceptedAt'] + " " + this['status'] + "' value='" + this['cardName'] + "'>" + this['cardName'] + "</option>");
					});
				}
			}
			if (paymentOption == "OPTEMI") {
				if (value.payOpt == "OPTEMI") {
					$("#emi_div").show();
					$("#card_type").val("CRDC");
					$("#data_accept").val("Y");
					$("#emi_plan_id").val("");
					$("#emi_tenure_id").val("");
					$("span.emi_fees").hide();
					$("#emi_banks").children().remove();
					$("#emi_banks").append("<option value=''>Select your Bank</option>");
					$("#emi_tbl").children().remove();
					emiBanksArray = $.parseJSON(value.EmiBanks);
					emiPlansArray = $.parseJSON(value.EmiPlans);
					$.each(emiBanksArray, function () {
						payThrough = "<option value='" + this['planId'] + "' class='" + this['BINs'] + "' id='" + this['subventionPaidBy'] + "' label='" + this['midProcesses'] + "'>" + this['gtwName'] + "</option>";
						$("#emi_banks").append(payThrough);
					});
					emiPlanTr = "<tr><td>&nbsp;</td><td>EMI Plan</td><td>Monthly Installments</td><td>Total Cost</td></tr>";
					$.each(emiPlansArray, function () {
						emiPlanTr = emiPlanTr + "<tr class='tenuremonth " + this['planId'] + "' id='" + this['tenureId'] + "' style='display: none'>" + "<td> <input type='radio' name='emi_plan_radio' id='" + this['tenureMonths'] + "' value='" + this['tenureId'] + "' class='emi_plan_radio' > </td>" + "<td>" + this['tenureMonths'] + "EMIs. <label class='merchant_subvention'>@ <label class='emi_processing_fee_percent'>" + this['processingFeePercent'] + "</label>&nbsp;%p.a</label>" + "</td>" + "<td>" + this['currency'] + "&nbsp;" + this['emiAmount'].toFixed(2) + "</td>" + "<td><label class='currency'>" + this['currency'] + "</label>&nbsp;" + "<label class='emiTotal'>" + this['total'].toFixed(2) + "</label>" + "<label class='emi_processing_fee_plan' style='display: none;'>" + this['emiProcessingFee'].toFixed(2) + "</label>" + "<label class='planId' style='display: none;'>" + this['planId'] + "</label>" + "</td>" + "</tr>";
					});
					$("#emi_tbl").append(emiPlanTr);
				}
			}
		});
	});
	$("#card_name").click(function () {
		if ($(this).find(":selected").hasClass("DOWN")) {
			alert("Selected option is currently unavailable. Select another payment option or try again later.");
		}
		if ($(this).find(":selected").hasClass("CCAvenue")) {
			$("#data_accept").val("Y");
		} else {
			$("#data_accept").val("N");
		}
	});
	$("#emi_banks").live("change", function () {
		if ($(this).val() != "") {
			var cardsProcess = "";
			$("#emi_tbl").show();
			cardsProcess = $("#emi_banks option:selected").attr("label").split("|");
			$("#card_name").children().remove();
			$("#card_name").append("<option value=''>Select</option>");
			$.each(cardsProcess, function (index, card) {
				$("#card_name").find("option:last").after("<option class=CCAvenue value='" + card + "' >" + card + "</option>");
			});
			$("#emi_plan_id").val($(this).val());
			$(".tenuremonth").hide();
			$("." + $(this).val() + "").show();
			$("." + $(this).val()).find("input:radio[name=emi_plan_radio]").first().attr("checked", true);
			$("." + $(this).val()).find("input:radio[name=emi_plan_radio]").first().trigger("click");
			if ($("#emi_banks option:selected").attr("id") == "Customer") {
				$("#processing_fee").show();
			} else {
				$("#processing_fee").hide();
			}
		} else {
			$("#emi_plan_id").val("");
			$("#emi_tenure_id").val("");
			$("#emi_tbl").hide();
		}
		$("label.emi_processing_fee_percent").each(function () {
			if ($(this).text() == 0) {
				$(this).closest("tr").find("label.merchant_subvention").hide();
			}
		});
	});
	$(".emi_plan_radio").live("click", function () {
		var processingFee = "";
		$("#emi_tenure_id").val($(this).val());
		processingFee = "<span class='emi_fees' >" + "Processing Fee:" + $(this).closest('tr').find('label.currency').text() + "&nbsp;" + "<label id='processingFee'>" + $(this).closest('tr').find('label.emi_processing_fee_plan').text() + "</label><br/>" + "Processing fee will be charged only on the first EMI." + "</span>";
		$("#processing_fee").children().remove();
		$("#processing_fee").append(processingFee);
		if ($("#processingFee").text() == 0) {
			$(".emi_fees").hide();
		}
	});
	$("#card_number").focusout(function () {
		if ($('input[name="payment_option"]:checked').val() == "OPTEMI") {
			if (!($("#emi_banks option:selected").hasClass("allcards"))) {
				if (!$('#emi_banks option:selected').hasClass($(this).val().substring(0, 6))) {
					alert("Selected EMI is not available for entered credit card.");
				}
			}
		}
	});

	function processData(data) {
		var paymentOptions = [];
		var creditCards = [];
		var debitCards = [];
		var netBanks = [];
		var cashCards = [];
		var mobilePayments = [];
		$.each(data, function () {
			console.log(this.error);
			paymentOptions.push(this.payOpt);
			switch (this.payOpt) {
			case 'OPTCRDC':
				var jsonData = this.OPTCRDC;
				var obj = $.parseJSON(jsonData);
				$.each(obj, function () {
					creditCards.push(this['cardName']);
				});
				break;
			case 'OPTDBCRD':
				var jsonData = this.OPTDBCRD;
				var obj = $.parseJSON(jsonData);
				$.each(obj, function () {
					debitCards.push(this['cardName']);
				});
				break;
			case 'OPTNBK':
				var jsonData = this.OPTNBK;
				var obj = $.parseJSON(jsonData);
				$.each(obj, function () {
					netBanks.push(this['cardName']);
				});
				break;
			case 'OPTCASHC':
				var jsonData = this.OPTCASHC;
				var obj = $.parseJSON(jsonData);
				$.each(obj, function () {
					cashCards.push(this['cardName']);
				});
				break;
			case 'OPTMOBP':
				var jsonData = this.OPTMOBP;
				var obj = $.parseJSON(jsonData);
				$.each(obj, function () {
					mobilePayments.push(this['cardName']);
				});
			}
		});
	}
});
</script>