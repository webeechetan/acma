<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("includes/header.php");?>
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="introimg">
        <div class="container">
          <div class="secondarymenu">  
           <div class="row">
             <div class="secondarymenu-right">
                <?php include("includes/secondaory-menu.php");?>
             </div>
           </div>
          </div>
        </div>
        <img src="img/about-us.jpg" class="img-fluid">
    </div>
  </section><!-- #intro -->
  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="innerpage">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
              <h2>Member Search</h2>
              <?php 
                if(isset($_POST['productmanufactured'])){   
                    $searchbyproductcategory = $_POST['productmanufactured']; 
                }else{ 
                    $searchbyproductcategory = ''; 
                }
                ?>
              <?php 
                if(isset($_POST['main_companyname'])){ 
                  $searchbycompany = $_POST['main_companyname']; 
                }else{ 
                    $searchbycompany = ''; 
                }
                ?>
              <table width="100%" cellpadding="3" border="0" class="tablecss3">
                <tbody>
                <tr>
                  <th>Company</th>
                  <th>Address</th>
                  <th>Product Manufactured</th>
                  <th>Products</th>
                </tr>

                <?php
               
                        // echo $searchbycompany;
                        if($searchbycompany!='' && $searchbycompany != null){
                          // echo App\Models\MembersDatabase::where('companyname','=',$searchbycompany)->orderBy("id","DESC")->toSql();
                          // die;

                            $MembersDatabases=App\Models\MembersDatabase::where('companyname','=',$searchbycompany)->orderBy("id","DESC")->get();
                          }
                          else{
                            if($searchbyproductcategory!='' && $searchbyproductcategory!=null){
                         
                              $MembersDatabases=App\Models\MembersDatabase::where('companyname', $searchbyproductcategory)
                                                                          ->orWhere('productmanufactured', 'like', '%' . $searchbyproductcategory . '%')
                                                                          ->orWhere('product2', 'like', '%' . $searchbyproductcategory . '%')
                                                                          ->orWhere('product3', 'like', '%' . $searchbyproductcategory . '%')
                                                                          ->orWhere('product4', 'like', '%' . $searchbyproductcategory . '%')
                                                                          ->get();
                          }  
                          }
                          

                            $srno = 1; 
                            //  print_r($MembersDatabases);
                          if(isset($MembersDatabases)){
            		        foreach($MembersDatabases as $Member){?>
                        <tr>
                              <td width="25%" valign="top" align="left">
                                  <?php echo $Member->companyname;?>
                              </td>
                              <td width="25%" valign="top" align="left">
                                 <?php echo $Member->address1;?> <br>
                                 <?php echo $Member->city;?>, <?php echo $Member->pin;?>, <?php echo $Member->state;?><br>
                                 Phone : <?php echo $Member->phone;?><br>
                                 Fax : <?php echo $Member->fax;?><br>
                                 <?php echo $Member->website;?>
                              </td>
                              <td width="25%" valign="top" align="left">
                                <?php echo $Member->productmanufactured;?>
                              </td>
                              <td width="25%" valign="top" align="left">
                                  <?php echo $Member->product1;?> 
                                  <?php if(!empty($Member->product2)){ echo ','.$Member->product2;}?><?php if(!empty($Member->product3)){ echo ','.$Member->product3;}?>
                              </td>
                        </tr>
                          <?php } }?>
                      </tbody>
            </table>
              </div>
          </div>
     </div>
    </section><!-- #about -->

  </main>

  <?php include("includes/footer.php");?>