<?php 
include("header.php");
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <p align="right">
              <a  style="background-color:blue; color:#fff; padding:5px 10px;" href="javascript:void(0)" onclick="openDownExcel('open')">Download</a>&nbsp;&nbsp;
              <a  style="background-color:blue; color:#fff; padding:5px 10px;" href="all-doc-corona.php">Covid19 Doc</a>&nbsp;&nbsp;
              <a href="add-new-doc-corona.php"  style="background-color:blue; color:#fff; padding:5px 10px;">Add New Covid19 Doc</a>
          </p>
          <p style="margin:0;">
            <a style="background-color:blue; color:#fff;vertical-align: -webkit-baseline-middle;" href="additional_member.php">Delegates Annual session member</a>
            <input type="search" placeholder="Search..." style="float:right;" value="<?php echo $_GET['search']; ?>" onkeyup="if(event.keyCode === 13){location.replace('?search='+this.value)}">
          </p>
          <div class="widget widget-nopad">
            <div class="widget-content">
                <!--<button><a href="additional_member.php">Delegates Annual session member</a></button>-->
            <div class="widget-header"> <i class="icon-user"></i>
              <h3>Online Payment Details</h3>
            </div>
            <div style="overflow:auto">
                <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Billing Details</th>
                        <th>Company Name</th>
                        <th>Event Details</th>
                        <th>Amount</th>
                        <th>Order ID</th>
                        <th>Form Name</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_GET['search']) && $_GET['search'] != '') {
                    $PaymentTables=App\Models\OnlinePaymentTable::where('responce_gateway', 'like', "%{$_GET['search']}%")->orderBy("id","DESC")->paginate(100,['*'],'page',(int)$_GET['page']);
                } else {
                    
                    $PaymentTables=App\Models\OnlinePaymentTable::orderBy("id","DESC")->paginate(100,['*'],'page',(int)$_GET['page']);
                }
                $srno = 1; 
		        foreach($PaymentTables as $PaymentTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td>Name : <?php echo $PaymentTable->billing_name;?><br>Designation : <?php echo $PaymentTable->designation;?><br>Email : <?php echo $PaymentTable->billing_email;?><br>Tel : <?php echo $PaymentTable->billing_tel;?><br>GST No : <?php echo $PaymentTable->gstno;?><br>Date : <?php echo $PaymentTable->billing_date;?><br><?php echo $PaymentTable->billing_address;?></td>
					<td><?php echo $PaymentTable->company_name;?></td>
					<td><?php echo $PaymentTable->event_name;?></td>
					<td><?php echo $PaymentTable->amount;?></td>
					<td><?php echo $PaymentTable->order_id;?></td>
					<td><?php echo $PaymentTable->formname;?></td>
					<td>
                        <?php if($PaymentTable->responce_gateway==null){
                            echo "Tracking Id : ".$PaymentTable->tid."<br>
                            Bank Ref No : <br>
                            Transaction Date: ".$PaymentTable->transaction_date."<br>
                            Order Status : ";
                        }else{
                            echo $PaymentTable->responce_gateway;
                        }?>
                    </td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Billing Details</th>
                        <th>Company Name</th>
                        <th>Event Details</th>
                        <th>Amount</th>
                        <th>Order ID</th>
                        <th>Form Name</th>
                        <th>Order Status</th>
                    </tr>
                </tfoot>
            </table>
            </div>
            <?php 
				$PaymentTables->withPath('index.php');
				$pages= $PaymentTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) { // print links for all pages
				    if($i <= 3) {
				        echo "<li><a href='index.php?".
							((isset($_GET['id']) && !empty($_GET['id']))?'id='.urlencode($_GET['id']).'&':'')."page=".$i."'";
							if ($i==$pages['current_page'])  echo " class='curPage'";
							echo ">".$i."</a></li>";
				    }
				    
				    if(($i > 3) && (($_GET['page']) == $i || ($_GET['page'] + 1) == $i || ($_GET['page'] + 2) == $i) && ($i < ($pages['last_page'] - 1))) {
				        echo "<li><a href='index.php?".
							((isset($_GET['id']) && !empty($_GET['id']))?'id='.urlencode($_GET['id']).'&':'')."page=".$i."'";
							if ($i==$pages['current_page'])  echo " class='curPage'";
							echo ">".$i."</a></li>";
				    }
				    
				    if($pages['last_page'] - 1 == ($i)) {
				        echo "<li><a href='index.php?".
							((isset($_GET['id']) && !empty($_GET['id']))?'id='.urlencode($_GET['id']).'&':'')."page=".$i."'";
							if ($i==$pages['current_page'])  echo " class='curPage'";
							echo ">".$i."</a></li>";
				    }
				} 
				echo "</ul></div>";	
					?>
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
<!-- /Download Modal-->
<div class="dowload_E_modal d-none" id="acmaDownloadModal" style="text-align:center">
    <div class="download_E_close" onclick="openDownExcel('close')">CLOSE</div>
    <section>
        <article class="download_E_margin">
            <h2> Download Excel</h2>
            <hr>
        </article>
        <h3>Humsafar the Digital Channel Directory</h3>
        <button class="btn btn-primary" onclick="location.href='download_excel.php'">Download Excel</button>
    </section>
</div>
<script>
    function openDownExcel(action) {
        acmaDownloadModal.style.transform = action == "open" ? "translate(-50%, -50%) scale(1)" : "translate(-50%, -50%) scale(0)";
    }
</script>
<!-- /main -->
<?php include("footer.php");?>