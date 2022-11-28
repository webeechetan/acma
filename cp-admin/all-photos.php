<?php include("header.php");
if(isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id']))
{
	$GalleryTable=App\Models\GalleryTable::find((int)$_GET['id']);
	if($GalleryTable){
		$GalleryTable->delete();
	}
	header( 'location:all-photos.php?msg=delete' );			
}

if(isset($_GET['action']) && $_GET['action'] == 'deactivate' && !empty($_GET['id']))
{
	$GalleryTable=App\Models\GalleryTable::find((int)$_GET['id']);
	if($GalleryTable){
		$GalleryTable->status = 0;
    $GalleryTable->save();
	}
	header( 'location:all-photos.php' );			
}

if(isset($_GET['action']) && $_GET['action'] == 'activate' && !empty($_GET['id']))
{
	$GalleryTable=App\Models\GalleryTable::find((int)$_GET['id']);
	if($GalleryTable){
		$GalleryTable->status = 1;
    $GalleryTable->save();
	}
	header( 'location:all-photos.php' );			
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
              <h3>Gallery</h3>
            </div>
            <table class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $GalleryTables=App\Models\GalleryTable::orderBy("id","DESC")->paginate(1000,['*'],'page',(int)$_GET['page']);
                
                $srno = 1; 
		        foreach($GalleryTables as $GalleryTable){
					?>
				<tr>
					<td width="50"><?php echo $srno;?></td>
					<td><?php echo $GalleryTable->title;?></td>
					<td><?php echo $GalleryTable->cat_gallery;?></td>
					<td><?php echo $GalleryTable->uploaddate;?></td>
					<td>
            <a onclick="return confirm('Are you sure want to delete?')" href="all-photos.php?id=<?php echo $GalleryTable->id;?>&action=delete">Delete</a>
            <?php
              if($GalleryTable->status==1){
            ?>
              <a onclick="return confirm('Are you sure want to Deativate?')" href="all-photos.php?id=<?php echo $GalleryTable->id;?>&action=deactivate">Deactivate</a>
            <?php }else{?>
              <a onclick="return confirm('Are you sure want to Activate?')" href="all-photos.php?id=<?php echo $GalleryTable->id;?>&action=activate">Activate</a>
            <?php }?>
          </td>
				</tr>
				<?php $srno++; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr no</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <?php 
				$GalleryTables->withPath('all-photos.php'); 
				$pages= $GalleryTables->toArray();
				echo "<div class='pagination'><span>Pages :</span><ul> ";
				for ($i=1; $i<=$pages['last_page']; $i++) {  // print links for all pages
							echo "<li><a href='all-photos.php?".
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