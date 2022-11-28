<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$OtherdocTable=App\Models\OtherdocTable::find((int)$_GET['id']);
	if($OtherdocTable){
		$OtherdocTable->delete();
	}
	header( 'location:all-other-doc.php?msg=delete' );			
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
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Documents</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Copy URL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $DocTables=App\Models\OtherdocTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($DocTables as $DocTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td>https://www.acma.in/uploads/otherdocmanager/<?php echo $DocTable->doc;?></td>
					<td><a onclick="return confirm('Are you sure want to delete?')" href="all-other-doc.php?id=<?php echo $DocTable->id;?>&action=delete">Delete</a></td>
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
				$DocTables->withPath('all-other-doc.php'); 
				$pages= $DocTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-other-doc.php?".
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