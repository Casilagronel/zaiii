<!DOCTYPE html>
<html id="clearance">
<style>
    @media print {
        .noprint {
        visibility: hidden;
         }
    }
    @page { size: auto;  margin: 4mm; }
    </style>
    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
    ob_start();
    $_SESSION['clr'] = $_GET['clearance'];
    include('../head_css.php'); ?>
    <body class="skin-black" >
        <?php 
        
        include "../connection.php";
        ?>
       
        <center><div class="" ></center>
            <div style=" background: black;" >
                <div class="">
                    <div style="margin-top:20px; text-align: center; word-wrap: break-word;">
                        <?php
                            $qry = mysqli_query($con,"SELECT * from tblofficial");
                            while($row=mysqli_fetch_array($qry)){
                                if($row['sPosition'] == "Captain"){
                                    echo '
                                    <p>
                                    <b>'.strtoupper($row['completeName']).'</b><br>
                                    <span style="font-size:12px;">PUNONG BARANGAY</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Kagawad(Ordinance)"){
                                    echo '
                                    <p>
                                    KAG. '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Sports / Law / Ordinance</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Kagawad(Public Safety)"){
                                    echo '
                                    <p>
                                    KAG. '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Public Safety / Peace and Order</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Kagawad(Tourism)"){
                                    echo '
                                    <p>
                                    KAG. '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Culture & Arts / Tourism / Womens Sector</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Kagawad(Budget & Finance)"){
                                    echo '
                                    <p>
                                    KAG. '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Budget & Finance / Electrification</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Kagawad(Agriculture)"){
                                    echo '
                                    <p>
                                    KAG. '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Agriculture / Livelihood / Farmers Sector / PWD Sector</span>
                                    </p>
                                    ';
                                }elseif($row['sPosition'] == "Kagawad(Education)"){
                                    echo '
                                    <!-- <p>
                                    KAG. '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Health & Sanitation / Education</span>
                                    </p> -->
                                    ';
                                }elseif($row['sPosition'] == "Kagawad(Infrastracture)"){
                                    echo '
                                    <p>
                                    KAG. '.strtoupper($row['completeName']).'<br>
                                    <span style="font-size:12px;">Infrastracture / Labor Sector/ Environment / Beautification</span>
                                    </p>
                                    ';
                                }
                            }
                        ?>
                        
                    </div>
                </div>
                <div class="col-xs-7 col-sm-5 col-md-8" style="background: white ;  ">
                    <center><div class="pull-left" style="font-size: 16px; padding-left:550px"><b>
                        Republic of the Philippines<br>
                        Municipality of Opol<br>
                        Province of Batangas <br>
                        BARANGAY LOOC<br>
                        Tel. 999-0000<br></b>
                    </div></center>
                    <div class="pull-center">
                       <?php $qry1=mysqli_query($con,"SELECT * from tblresident r left join tblclearance c on c.residentid = r.id where residentid = '".$_GET['resident']."' and clearanceNo = '".$_GET['clearance']."' ");
                            while($row1 = mysqli_fetch_array($qry1)){
                        }
                        ?>

                    </div>
                    <div class="col-xs-12 col-md-12"><br>
                        <p class="text-center" style="font-size: 20px; font-size:bold;">OFFICE OF THE BARANGAY CAPTAIN<br><b style="font-size: 28px;">BARANGAY CLEARANCE</b></p><br>
                        <p style="font-size: 18px;">TO WHOM IT MAY CONCERN:</p>
                        <p style="text-indent:40px;text-align: justify; font-size: 18px;" >
                        This is to certify that, of legal age, male/female/single/ married/widow/widower, Filipino, is a resident of Purok No., Barangay Looc Nasubu Batangas, is one of the indigents in our barangay. </p><br>

                            <p style="text-indent:40px;text-align: justify; font-size: 18px;" >This certification is being issued upon the request of the above-named person for whatever legal purpose it may serve him best.</p>

                            <p style="text-indent:40px;text-align: justify; font-size: 18px;" >Issued this day of 2021 at the Office of the Punong Barangay, Barangay Looc, Nasugbu Batangas.
                     </p>

                        <?php
                            $qry=mysqli_query($con,"SELECT * from tblresident r left join tblclearance c on c.residentid = r.id where residentid = '".$_GET['resident']."' and clearanceNo = '".$_GET['clearance']."' ");
                            while($row = mysqli_fetch_array($qry)){
                                $bdate = date_create($row['bdate']);
                                $date = date_create($row['dateRecorded']);
                                echo '
                                <p><b>
                                    SURNAME: <u>'.strtoupper($row['lname']).'</u><br>
                                    FIRST NAME: <u>'.strtoupper($row['fname']).'</u><br>
                                    MIDDLE NAME: <u>'.strtoupper($row['mname']).'</u><br>
                                    ADDRESS: <u>'.strtoupper($row['formerAddress']).'</u><br>
                                    BIRTHDATE & PLACE: <u>'.strtoupper(date_format($bdate,"m-d-Y")).'/'.strtoupper($row['bplace']).'</u><br>
                                    GENDER/CIVIL STATUS: <u>'.strtoupper($row['gender']).'/SINGLE</u><br>
                                    NATIONALITY: <u>'.strtoupper($row['nationality']).'</u><br>
                                    RELIGION: <u>'.strtoupper($row['religion']).'</u><br>
                                    PURPOSE: <u>'.strtoupper($row['purpose']).'</u><br>
                                    FINDINGS: <u>NO DEROGATORY RECORD</u><br>
                                </b></p>
                                <p><b>
                                    RES. CERT. NO.: <u>'.strtoupper($row['clearanceNo']).'</u><br>
                                    ISSUED ON: <u>'.strtoupper(date_format($date,"F j, o")).'</u><br>
                                    ISSUED AT: <u>IGPIT OFFICE</u><br>
                                    OR. NO.: <u>'.strtoupper($row['orNo']).'</u><br>
                                    ISSUED ON: <u>'.strtoupper(date_format($date,"F j, o")).'</u><br>
                                </b></p>
                                ';
                            }
                        ?>
                    </div>  
                    <div class="col-md-5 col-xs-4" style="float:right;margin-top: -160px;">
                        <div style="height:236px; width:140px;  position: right; font-size: 18px;">
                            <!-- <center><span style="text-align: center; line-height: 160px;">Right Thumb Mark</span></center> -->
                        </div><br><br><br>
                        <p style="font-size: 18px;">Signature</p>
                    </div>
                </div>
                <div class="col-xs-offset-6 col-xs-5 col-md-offset-6 col-md-4" ><br><br><br>
                    <?php
                    $qry = mysqli_query($con,"SELECT * from tblofficial");
                    while($row=mysqli_fetch_array($qry)){
                        if($row['sPosition'] == "Captain"){
                            echo '
                            <p>
                            <b style="font-size:20px; text-align: center">'.strtoupper($row['completeName']).'<br>
                            <span style=" text-align: center;">Punong Barangay</span></b>
                            </p>
                            ';
                        }
                    }
                    ?>
                </div>
                <div class="col-xs-8 col-md-4">
                    <?php
                    $qry = mysqli_query($con,"SELECT * from tblofficial");
                    while($row=mysqli_fetch_array($qry)){
                        if($row['sPosition'] == "Captain"){
                            // echo '
                            // <p>
                            // <b style="font-size:18px;">'.strtoupper($row['completeName']).'<br>
                            // <span style=" text-align: center;">OFFICER OF THE DAY</span></b>
                            // </p>
                            // ';
                        }
                    }
                    ?>
                </div>
                <div class="col-xs-3 " style="margin-bottom:40px;">
                    <!-- <img class=" pull-right" src="barcode.php?clr=<?php echo base64_decode($_GET['val']);?>" style="width:170px; height: 60px; " /> -->

                    <!-- <span class="pull-right"><?php echo substr_replace($_GET['clearance'],'****',0,3);?> </span> -->
               
                </div>
            </div>
        </div>
    </body>
    <?php
    }
    ?>
    <script>
         function PrintElem(elem)
    {
        window.print();
    }

    function Popup(data) 
    {
    }
    </script>
</html>