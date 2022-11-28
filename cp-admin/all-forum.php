<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$ForumTable=App\Models\ForumTable::find((int)$_GET['id']);
	if($ForumTable){
		$ForumTable->delete();
	}
	header( 'location:all-forum.php?msg=delete' );			
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
            <div class="widget-header"> <i class="icon-envelope"></i>
              <h3>Forums</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Submit By</th>
                        <th>Subject</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $ForumTables=App\Models\ForumTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($ForumTables as $ForumTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td><?php echo $ForumTable->title;?></td>
					<td>
					    <?php 
					     $members=App\Models\MembersTable::find((int)$ForumTable->submitby);
    				     echo  $members->name;
    			        ?></td>
    			    <td>
					    <?php 
					     $forumsubject=App\Models\ForumsubjectTable::find((int)$ForumTable->subject);
    				     echo  $forumsubject->title;
    			        ?></td>       
					<td><?php echo $ForumTable->submiton;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-forum.php?id=<?php echo $ForumTable->id;?>&action=delete">Delete</a></td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Submit By</th>
                        <th>Subject</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$ForumTables->withPath('all-forum.php'); 
				$pages= $ForumTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-forum.php?".
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