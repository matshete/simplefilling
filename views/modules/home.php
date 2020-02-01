<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Dashboard
      
      <small>Control panel</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="row">
      
      <?php
    
        if($_SESSION["profile"] =="administrator"){

         // include "home/top-boxes.php";

        }

      ?>
    
    </div>
    
    <div class="row">

      <div class="col-lg-12">

      <?php

        if($_SESSION["profile"] =="administrator"){

         // include "reports/sales-graph.php";

        }

      ?>
      
<table width="1330" height="279" border="0">
  <tr>
    <td width="23" height="273" align="left" valign="top"><p>&nbsp;</p></td>
    <td width="807" align="left" valign="top"><p><strong>Welcome</strong><br />
      This system  will assist you to keep the record of your customers in one place as an  accountant while tracking the once that are due or approaching their due dates  for filing so it can set the automated reminder to file. Does not require any  programming skills all you need is to capture the customer into the system once  using the interface menu on the left panel and the system will perform all the  work.</p>
     
 <p><strong>SimpleFiling System Developers:</strong><br />
        Stephen M  Masombuka - Accounting Officer<br />
        Frans Selepe - Programmer Analyst</a><br />
        Emmanuel Molobela - Programmer Analyst</a></p>


	 <p><strong>For Enquiries and Technical Support  Contact Us:</strong><br />
        Customer Care  Line: 011 866 7211<br />
        Email: <a href="mailto:admin@simplefiling.co.za">admin@simplefiling.co.za</a><br />
        Web: <a href="http://www.simplefiling.co.za">www.simplefiling.co.za</a></p>
      <p><strong>Physical Address:</strong><br />
        13475 Lapologa Str, Mzamo  Acres, Vosloorus Ext 11, 1475<br />
        White House Opposite Spruitview Shopping Centre. </p>
    <p><div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="204" id="gmap_canvas" src="https://maps.google.com/maps?q=spruitview%20white%20house&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:204px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:204px;width:600px;}</style></div></p></td>
    <td width="9" align="left" valign="top">&nbsp;</td>
    <td width="473" align="left" valign="top"><img src="views/img/template/banner.png" width="472" height="513" /></td>
  </tr>
</table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
      </div>

      <div class="col-lg-6">
        
        <?php

          if($_SESSION["profile"] =="administrator"){

          //  include "reports/bestseller-products.php";

          }

        ?>
		

      </div>

       <div class="col-lg-6">
        
        <?php

          if($_SESSION["profile"] =="administrator"){

           // include "home/recent-products.php";

          }

        ?>

      </div>

      <div class="col-lg-12">
           
        <?php

        if($_SESSION["profile"] =="special" || $_SESSION["profile"] =="seller"){

           echo '<div class="box box-success">

           <div class="box-header">

           <h1>Welcome ' .$_SESSION["name"].'</h1>

           </div>

           </div>';

        }

        ?>

      </div>

    </div>

  </section>

</div>
