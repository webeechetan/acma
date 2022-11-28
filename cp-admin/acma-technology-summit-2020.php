<?php include("header.php");
?>

<link href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css" rel="stylesheet">

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
           
          <div class="widget widget-nopad">
            <div class="serachtop">
             
            <div class="widget-header"> <i class="icon-envelope"></i>
              <h3>Document Subjects</h3>
              <a href="ajax.php?download">Download CSV</a>
            </div>
                        <table id="table"
                            data-toggle="table"
                            data-height="500"
                            data-ajax="newsHtml"
                            data-search="false"
                            data-side-pagination="server"
                            data-pagination="true">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th data-field="billing_name" >Name </th>
                                        <th data-field="billing_email" >Email</th>
                                        <th data-field="designation" >Designation</th>
                                        <th data-field="billing_tel" >Telephone</th>
                                        <th data-field="company_name">Company</th>
                                        <!--<th data-field="eligibility">Eligibility</th>-->
                                      
                                        <th data-field="Member_Name1"> Member 1 Name</th>
                                        <th data-field="Member_Name2"> Member 2 Name</th>
                                        <th data-field="Member_Name3"> Member 3 Name</th>
                                        <th data-field="Member_Name4"> Member 4 Name</th>


                                    </tr>
                                </thead>
                                
                            </table>
           
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
<script>
    function newsHtml(params){
        var url = 'ajax.php?EVENT_2020'
            $.get(url + '&' + $.param(params.data)).then(function (result) {
                res =JSON.parse(result);
               
                mydata ={'total':0,rows:{}};
                arr =[];
                
                    mydata.total= res.total;
                    for(i=0;i<res.rows.length ;i++){
                       
                        action ='';
                        res.rows[i].Member_Name1 = '';
                        res.rows[i].Member_Name2 = '';
                        res.rows[i].Member_Name3 = '';
                        res.rows[i].Member_Name4 = '';
                        achma_event_member = res.rows[i].achma_event_members;
                        for(k=0; k<achma_event_member.length; k++){
                            $j=k+1;
                            switch($j){
                                case 1:
                                    res.rows[i].Member_Name1 = 'Name :'+achma_event_member[k].member_name +'<br/> Designation'+ achma_event_member[k].member_designation+'<br/> Email'+ achma_event_member[k].member_email+'<br/> Phone'+ achma_event_member[k].member_phone
                                break;
                                case 2:
                                    res.rows[i].Member_Name2 = 'Name :'+achma_event_member[k].member_name +'<br/> Designation'+ achma_event_member[k].member_designation+'<br/> Email'+ achma_event_member[k].member_email+'<br/> Phone'+ achma_event_member[k].member_phone
                                break;
                                case 3:
                                    res.rows[i].Member_Name3 = 'Name :'+achma_event_member[k].member_name +'<br/> Designation'+ achma_event_member[k].member_designation+'<br/> Email'+ achma_event_member[k].member_email+'<br/> Phone'+ achma_event_member[k].member_phone
                                break;
                                case 4:
                                    res.rows[i].Member_Name4 = 'Name :'+achma_event_member[k].member_name +'<br/> Designation'+ achma_event_member[k].member_designation+'<br/> Email'+ achma_event_member[k].member_email+'<br/> Phone'+ achma_event_member[k].member_phone
                                break;
                            }
                           
                        }
                        
                       
                        arr.push(res.rows[i]);
                    }
                    mydata.rows =arr;
               console.log(mydata);
              params.success(mydata)
            });
        }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
<?php include("footer.php");?>
  


