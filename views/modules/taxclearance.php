<?php

if($_SESSION["profile"] == "special"){

  echo '<script>

    window.location = "home";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Tax Clearance Management

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>
 <li>
			<button onClick="window.print()" class="btn btn-info btnPrintAnnual"><i class="fa fa-print"></i></button>`
	  </li>
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#addEmptaxclearance">

        Add Customer

        </button>

      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Referencce No</th>
             <th>Enterprise Name</th>
             <th>Reg/Filed Date</th>
             <th>Due Date</th>
            
             <th>Date Modified</th>
           
             <th>Actions</th>

           </tr> 

          </thead>

          <tbody>
          
          <?php

            $item = null;
            $valor = null;

            $Customers = ControllerEmptaxclearance::ctrShowEmptaxclearance($item, $valor);
			

            foreach ($Customers as $key => $value) {
              

              echo '<tr>

                      <td>'.($key+1).'</td>

                      <td>'.$value["REGISTRATION_NUMBER"].'</td>

                      <td>'.$value["ENTERPRISE_NAME"].'</td>

                      <td>'.$value["YEAR_FILED"].'</td>

                      <td>'.$value["NEXT_PERIOD"].'</td>

                              

                      <td>'.$value["MODIFIED_DATE"].'</td>

                     

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-warning btnEditEmptaxclearance" data-toggle="modal" data-target="#modalEditEmptaxclearance" regNumber="'.$value["REGISTRATION_NUMBER"].'"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnDeleteEmptaxclearance" regNumber="'.$value["REGISTRATION_NUMBER"].'"><i class="fa fa-times"></i></button>

                        </div>  

                      </td>

                    </tr>';
            
              }

          ?>
            
          </tbody>

        </table>

      </div>
    
    </div>

  </section>

</div>

<!--=====================================
MODAL ADD CUSTOMER
======================================-->

<div id="addEmptaxclearance" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST">

        <!--=====================================
        MODAL HEADER
        ======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: #fff">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Add taxclearance Customer</h4>

        </div>

        <!--=====================================
        MODAL BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
		  
		  
		   <!-- REGISTRATION NUMBER INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input class="form-control input-lg" type="text" maxlength="14" id="newEmptaxclearance" name="newRegNumber" value ="<?php if (isset($_POST["newRegNumber"])){echo $_POST["newRegNumber"];}?>" placeholder="Enter Reference No" required>
              </div>
            </div>

             <!-- NAME INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" name="newName" value ="<?php if (isset($_POST["newName"])){echo $_POST["newName"];}?>" placeholder="Enterprise Name" required>
              </div>
            </div>

            



             <!--  DATE INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input class="form-control input-lg" type="text" name="newfileddate" value ="<?php if (isset($_POST["newfileddate"])){echo $_POST["newfileddate"];}?>" placeholder="Period Filed e.g(000000)" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required >
              </div>
            </div>

          </div>

        </div>

        <!--=====================================
        MODAL FOOTER
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <input class="form-control input-lg" type="hidden" min="0" name="newIdDocument" placeholder="Write your ID" value = "<?php echo rand(100000000, 999999999); ?>">
          <button type="submit" name="submit" class="btn btn-primary">Save taxclearance Customer</button>
        </div>
      </form>

      <?php

        $createEmptaxclearance = new ControllerEmptaxclearance();
        $createEmptaxclearance -> ctrCreateEmptaxclearance();

      ?>
    </div>

  </div>

</div>


<!--=====================================
MODAL EDIT CUSTOMER
======================================-->

<div id="modalEditEmptaxclearance" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        MODAL HEADER
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit taxclearance Customer</h4>

        </div>

        <!--=====================================
        MODAL BODY
        ======================================-->

        <div class="modal-body">

      

          <div class="box-body">
		  
		  
		   <!-- REGISTRATION NUMBER INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input class="form-control input-lg" type="text" maxlength="14" name="editregnumber" id="editregnumber"  placeholder="Enter Tax Reference No">
              </div>
            </div>

             <!-- NAME INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" name="editname" id="editname" placeholder="Enterprise Name" required>
              </div>
            </div>

            

			<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input class="form-control input-lg" type="text" name="editfiledate" id="editfiledate" value ="<?php if (isset($_POST["newfileddate"])){echo $_POST["newfileddate"];}?>" placeholder="Period Filed e.g(000000)" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required >
              </div>
            </div>

            

          </div>

        </div>

        <!--=====================================
        MODAL FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			<input type="hidden" id="regNumber" name="regNumber">
          <button type="submit" class="btn btn-primary">Save changes</button>

        </div>

      </form>

      <?php
		
        $EditEmptaxclearance = new ControllerEmptaxclearance();
        $EditEmptaxclearance -> ctrEditEmptaxclearance();

      ?>

    

    </div>

  </div>

</div>

<?php

  $deleteEmptaxclearance = new ControllerEmptaxclearance();
  $deleteEmptaxclearance -> ctrDeleteEmptaxclearance();

?>