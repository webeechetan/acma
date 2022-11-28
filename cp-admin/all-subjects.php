<?php include("header.php");

if(isset($_POST['subject'])){
	$subject = $_POST['subject'];	
	
    $DocsubjectTables = new App\Models\DocsubjectTable();
	$DocsubjectTables->name = $subject;
	$DocsubjectTables->save();

	header( 'location:all-subjects.php?msg=add' );	
	exit;
}
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$DocsubjectTable=App\Models\DocsubjectTable::find((int)$_GET['id']);
	if($DocsubjectTable){
		$DocsubjectTable->delete();
	}
	header( 'location:all-subjects.php?msg=delete' );			
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
            <div class="serachtop">
                <form method="post" action="all-subjects.php">
                  <input type="text" name="subject" placeholder="Subject Name...">    
                  &nbsp;&nbsp;
                  <input type="submit" name="action" value="Add New Subjects" class="go_btn">
                </form>
            </div>    
            <div class="widget-header"> <i class="icon-envelope"></i>
              <h3>Document Subjects</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $DocsubjectTables=App\Models\DocsubjectTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($DocsubjectTables as $DocsubjectTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td><?php echo $DocsubjectTable->name;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-subjects.php?id=<?php echo $DocsubjectTable->id;?>&action=delete">Delete</a></td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$DocsubjectTables->withPath('all-subjects.php'); 
				$pages= $DocsubjectTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-subjects.php?".
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