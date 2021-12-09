<!DOCTYPE html>
<html>

    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
    ob_start();
    include('../head_css.php'); ?>
    <body class="skin-black">
        <?php 
        
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>
        <div class="">           
            <aside class=""> 
                <section class="content-header">
                    <h1> Dashboard</h1>            
                </section> 
                <section class="content">
                    <div class="row">
                        <div class="box">
                            <!-- <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                <div class="info-box">
                                <a href="../resident/resident.php"><span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span></a>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Resident</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblresident");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div> 
                                  </div> 
                                </div> -->
                                <!-- <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../clearance/clearance.php"><span class="info-box-icon bg-aqua"><i class="fa fa-file"></i></span></a> -->

                                    <!-- <div class="info-box-content">
                                      <span class="info-box-text">Total Clearance</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblclearance where status = 'Approved' ");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                  </div>
                                </div> 
                             </div>   
                         </div>
                      </div>
                    </div>   -->
                </section> 
                <section class="content">
                    <div class="row">
                        <div class="box">
                            <div class="box-header">
                                <div style="padding:10px;">
                                <form action="export.php" method="post"></form>
                            </div>                            
                         </div>
                            <div class="box-body table-responsive">
                                <div class="row">                      
                                    <div class="col-md-6 col-sm-12 col-xs-12">                     
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                               Resident Educational Attainment
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-donut-chart"></div>
                                            </div>
                                        </div>            
                                    </div>                
                                </div> 
                            </div>
                         </div>
                    </div>   
                </section>
            </aside>
        </div>     
        <?php }
        include "../footer.php";
        include "../report/donut-chart.php";  
        ?>
        <script type="text/javascript">

             $(function() {
             $("#table").dataTable({
             "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,5 ] } ],"aaSorting": []
         });
      });
 </script>
    </body>
</html>