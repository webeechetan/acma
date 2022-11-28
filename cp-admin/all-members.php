<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$MembersTable=App\Models\MembersTable::find((int)$_GET['id']);
	if($MembersTable){
		$MembersTable->delete();
	}
	header( 'location:all-members.php?msg=delete' );			
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
            <div class="widget-header"> <i class="icon-user"></i>
              <h3>Members</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Website</th>
                        <th>Main Plant Address</th>
                        <th>Trade Mark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                $MembersTables=App\Models\MembersTable::orderBy("id","DESC")->paginate(100,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($MembersTables as $MemberTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td><a href="edit-member.php?id=<?php echo $MemberTable->id;?>"><?php echo $MemberTable->name;?></a></td>
					<td><?php echo $MemberTable->email;?></td>
					<td><?php echo $MemberTable->phone;?></td>
					<td><?php echo $MemberTable->website;?></td>
					<td><?php echo $MemberTable->mainaddress;?></td>
					<td><?php echo $MemberTable->trademark;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-members.php?id=<?php echo $MemberTable->id;?>&action=delete">Delete</a></td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Website</th>
                        <th>Main Plant Address</th>
                        <th>Trade Mark</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$MembersTables->withPath('all-members.php'); 
				$pages= $MembersTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-members.php?".
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