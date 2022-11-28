<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$PressCoverage=App\Models\PressCoverageTable::find((int)$_GET['id']);
	if($PressCoverage){
		$PressCoverage->delete();
    $target = FS_UPLOADS_PATH.'/press-release/';
    unlink($target.$PressCoverage->file);
	}
	header( 'location:all-press-coverage.php?msg=delete' );			
}
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Press Release</h3>
              <?php
                if(isset($_GET['msg']) && $_GET['msg'] == 'delete'){
              ?>
                <span class="text-warning">Delete Record Successfully.</span>
            <?php
                }
            ?>  
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $PressCoverageTable=App\Models\PressCoverageTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                $srno = 1; 
		        foreach($PressCoverageTable as $data){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td><?php echo $data->date;?></td>
					<td><?php echo $data->description;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-press-coverage.php?id=<?php echo $data->id;?>&action=delete">Delete</a></td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Upload Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$PressCoverageTable->withPath('all-press-release.php'); 
				$pages= $PressCoverageTable->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-press-release.php?".
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