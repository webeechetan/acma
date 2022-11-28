<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$DocTable=App\Models\DoccoronaTable::find((int)$_GET['id']);
	if($DocTable){
		$DocTable->delete();
	}
	header( 'location:all-doc-corona.php?msg=delete' );			
}
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <p align="right"><a style="background-color:blue; color:#fff; padding:5px 10px;" href="all-doc-corona.php">Covid19 Doc</a>&nbsp;&nbsp;<a  style="background-color:blue; color:#fff; padding:5px 10px;" href="add-new-doc-corona.php">Add New Covid19 Doc</a></p>     
          <?php
			if(isset($_GET['msg']) && $_GET['msg'] == 'delete'){
		  ?>
				<div class="alert">
                    Delete Record Successfully.
                </div>
          <?php
			}
			if(isset($_GET['msg']) && $_GET['msg'] == 'add'){
		  ?>
				<div class="alert">
                    Added Record Successfully.
                </div>
          <?php
			}
		  ?>    
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Corona Documents</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Section</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $DocTables=App\Models\DoccoronaTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($DocTables as $DocTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td><?php echo $DocTable->title;?></td>
					<td><?php echo $DocTable->cat;?>
					</td>
					<td><?php echo $DocTable->section;?></td>
					<td><?php echo $DocTable->uploaddate;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-doc-corona.php?id=<?php echo $DocTable->id;?>&action=delete">Delete</a></td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Section</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$DocTables->withPath('all-doc-corona.php'); 
				$pages= $DocTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-doc-corona.php?".
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