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
    <style>
    .input-size {
        width:418px;
    }
    </style>
    <body class="skin-black">
        <?php 
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="">
                <section class="content-header">
                    <h1> Resident</h1>    
                </section>
                <?php 
                if(!isset($_GET['resident']))
                {
                ?>
                <section class="content">
                    <div class="row">
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addCourseModal"><i class="" aria-hidden="true"></i> Add Residents</button>  
                                        <?php 
                                            if(!isset($_SESSION['staff']))
                                            {
                                        ?>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="" aria-hidden="true"></i> Delete</button> 
                                        <?php
                                            }
                                        ?>
                                
                                    </div>                                
                                </div>
                                <div class="box-body table-responsive">
                                <form method="post"  enctype="multipart/form-data">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <?php 
                                                    if(!isset($_SESSION['staff']))
                                                    {
                                                ?>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                <?php
                                                    }
                                                ?>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Birthdate</th>
                                                <th>Birthplace</th>
                                                <th>Age</th>
                                                <th>Barangay</th>
                                                <th>Household Member</th>
                                                <th>Civil Status</th>
                                                <th>Occupation</th>
                                                <th>Religion</th>
                                                <th>Nationality</th>
                                                <th>Gender</th>
                                                <th>Educational Attainment</th>
                                                <th>Former Address</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!isset($_SESSION['staff']))
                                            {
                                                $squery = mysqli_query($con, "SELECT image,id,CONCAT(lname, ', ', fname, ' ', mname) as cname, bdate, bplace, age, barangay, totalhousehold, civilstatus, occupation, religion, nationality, gender, highestEducationalAttainment, formerAddress FROM tblresident order by image");
                                                while($row = mysqli_fetch_array($squery))
                                                {
                                                    echo '
                                                    <tr>
                                                        <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                        <td style="width:70px;"><image src="image/'.basename($row['image']).'" style="width:60px;height:60px;"/></td>
                                                        <td>'.$row['cname'].'</td>
                                                        <td>'.$row['bdate'].'</td>
                                                        <td>'.$row['bplace'].'</td>
                                                        <td>'.$row['age'].'</td>
                                                        <td>'.$row['barangay'].'</td>
                                                        <td>'.$row['totalhousehold'].'</td>
                                                        <td>'.$row['civilstatus'].'</td>
                                                        <td>'.$row['occupation'].'</td>
                                                        <td>'.$row['religion'].'</td>
                                                        <td>'.$row['nationality'].'</td>
                                                        <td>'.$row['gender'].'</td>
                                                        <td>'.$row['highestEducationalAttainment'].'</td>
                                                        <td>'.$row['formerAddress'].'</td>
                                                        <td><button class="btn btn-success btn-sm" data-target="#editModal'.$row['id'].'" data-toggle="modal"><i class="" aria-hidden="true"></i> Edit</button></td>
                                                    </tr>
                                                    ';

                                                    include "edit_modal.php";
                                                }
                                            }
                                            else{
                                                $squery = mysqli_query($con, "SELECT image,id,CONCAT(lname, ', ', fname, ' ', mname) as cname, bdate, bplace, age, barangay, totalhousehold, civilstatus, occupation, religion, nationality, gender, highestEducationalAttainment, formerAddress FROM tblresident order by image");
                                                while($row = mysqli_fetch_array($squery))
                                                {
                                                    echo '
                                                    <tr>
                                                        <td style="width:70px;"><image src="image/'.basename($row['image']).'" style="width:60px;height:60px;"/></td>
                                                        <td>'.$row['cname'].'</td>
                                                        <td>'.$row['bdate'].'</td>
                                                        <td>'.$row['bplace'].'</td>
                                                        <td>'.$row['age'].'</td>
                                                        <td>'.$row['barangay'].'</td>
                                                        <td>'.$row['totalhousehold'].'</td>
                                                        <td>'.$row['civilstatus'].'</td>
                                                        <td>'.$row['occupation'].'</td>
                                                        <td>'.$row['religion'].'</td>
                                                        <td>'.$row['nationality'].'</td>
                                                        <td>'.$row['gender'].'</td>
                                                        <td>'.$row['highestEducationalAttainment'].'</td>
                                                        <td>'.$row['formerAddress'].'</td>
                                                        <td><button class="btn btn-success btn-sm" data-target="#editModal'.$row['id'].'" data-toggle="modal"><i class=""></i> Edit</button></td>
                                                    </tr>
                                                    ';

                                                    include "edit_modal.php";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php include "../deleteModal.php"; ?>

                                    </form>
                                </div>
                            </div>
            <?php include "add_modal.php"; ?> 
            <?php include "function.php"; ?>
                    </div>  
                </section>
                <?php
                }
                ?>
            </aside>
        </div>
        
        <?php }
        include "../footer.php"; ?>
<script type="text/javascript">
</script>
    </body>
</html>