<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 29-08-2016
 * Time: 02:42
 */
require_once '../functions.php';
checkAuth("../Logout/");

if (isset($_REQUEST['logout'])) header("Location: ../Logout/");
if (!isset($_COOKIE['username']) | $_COOKIE['username'] === "") header("Location: ../Login/");
$username = $_COOKIE['username'];
$pid = sql("SELECT `id` FROM `users` WHERE `username`='$username'")->fetch_assoc()['id'];
$result = sql("SELECT * FROM `docstarred` WHERE `pid`='$pid'");
?>


<!DOCTYPE html>
<html>
<head>
    <meta content="" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,user-scalable=no">
    <link rel="stylesheet" href="docs.css">
    <title></title>
</head>
<body>


<div id="mainflow">

    <div id="staredHeader"
         style="width: 100%;padding: 15px;box-sizing: border-box;display: block;background-color: #e57373;color: #fff;">
        Your Starred Doctors
    </div>
    <div id="starredDocsWrapper">
        <?php

        foreach ($result as $row) {
            $docid = $row['docid'];
            $res = sql("SELECT * FROM `doctors` WHERE `id`='$docid'")->fetch_assoc();
            $qualifications = $res['qualifications'];
            $specializations = $res['specializations'];
            $docuserid = $res['userid'];
            $details = sql("SELECT *FROM `users` WHERE `id`='$docuserid'")->fetch_assoc();
            $name = $details['firstname'] . " " . $details['lastname'];
            $icon = dpLink($docuserid, $docid);
            $phone = $details['phone'];
            $email = $details['email'];
            echo '<div class="starredDocs">';
            echo '<div class="strDocPic"><img src="' . $icon . '"/></div>';
            echo '<div class="strDocCardRight">';
            echo '<div class="strDocName">' . $name . '</div>';
            echo '<div class="strDocInfo">' . $qualifications . '<br/>' . $specializations . '<br/>' . $phone . '<br/>' . $email . '</div>';
//            echo '<div class="strDocInfo">'.$specializations.'</div>';
            echo '</div></div>';
        }
        ?>
    </div>
    <div id="searchDiv">
        <div id="searchBox">
            <button id="searchBtn"><img src="./search-icon.svg"/></button>
            <input id="searchInput" type="text" name="input0" placeholder="Search All Doctors in MED4U..."/>
        </div>
        <div id="searchFilter">
            <div class="filterOption">FilterOpt</div>
            <div class="filterOption">FilterOpt</div>
            <div class="filterOption">FilterOpt</div>
        </div>

        <div id="searchResults">

        </div>
        <div id="noResult" style="display:none">No Matching Result Found.</div>
        <div id="dummy" style="display: none;">
            <div class="searchedDoc">
                <div class="searchedDocPic"><img src=""></div>
                <div class="searchedDocCardRight">
                    <div class="searchedDocName"></div>
                    <div class="searchedDocInfo"></div>
                </div>
            </div>
        </div>


    </div>

</div>


<!--
<div id="card-wrapper">
            <div class="card">
                <img src="./abc.png" class="dp-img"/>
                <div class="tileClose">&#x2715;</div>
                <div class="card-info-doc">
                    <div class="doc-name" >Doctor 0</div>
                    <div class="doc-contact">9874563210</div>
                    <div class="doc-designation">Degrees</div>
                    <div class="doc-domain">doc-domain</div>
                </div>
                <div class="venue-time">
                        <div class="place-list-doc">
                            <div class="fees">200</div>
                            chambar 1
                            <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>
                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>
                        </div>


                        <div class="place-list-doc">
                            <div class="fees">200</div>
                            chambar 2
                            <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>
                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>

                        </div>
                </div>
                <div class="full-info">
                    <div class="review">

                        <div class="review-elem">this is a review</div>
                        <div class="review-elem">this is a review</div>
                        <div class="review-elem">this is a review</div>
                        <div class="review-elem">this is a review</div>
                        <div class="review-elem">this is a review</div>
                    </div>
                </div>
            </div>


            <div class="card">
                <img src="./abc.png" class="dp-img"/>
                <div class="tileClose">&#x2715;</div>
                <div class="card-info-doc">
                    <div class="doc-name" >Doctor 1</div>
                    <div class="doc-contact">9874563210</div>
                    <div class="doc-designation">Degrees</div>
                    <div class="doc-domain">doc-domain</div>
                </div>
                <div class="venue-time">
                       <div class="place-list-doc">
                           <div class="fees">200</div>
                            chambar 1
                            <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>
                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>
                        </div>


                        <div class="place-list-doc">
                            <div class="fees">200</div>
                            chambar 2
                             <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>
                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>

                        </div>
                </div>
                <div class="full-info">
                    <div class="review">

                        <div class="review-elem">this is a review</div>
                        <div class="review-elem">this is a review</div>
                        <div class="review-elem">this is a review</div>
                        <div class="review-elem">this is a review</div>
                        <div class="review-elem">this is a review</div>
                    </div>
                </div>
            </div>


             <div class="card">
                 <div class="tileClose">&#x2715;</div>
            <img src="./abc.png" class="dp-img"/>
            <div class="card-info-doc">
                <div class="doc-name" >Doctor 2</div>
                <div class="doc-contact">9874563210</div>
                <div class="doc-designation">Degrees</div>
                <div class="doc-domain">doc-domain</div>
            </div>
            <div class="venue-time">
                    <div class="place-list-doc">
                            <div class="fees">200</div>
                            chambar 1
                            <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>

                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>
                        </div>


                        <div class="place-list-doc">
                            <div class="fees">200</div>
                            chambar 2
                            <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>

                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>

                        </div>
            </div>
            <div class="full-info">
                <div class="review">

                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                </div>
            </div>
        </div>





            <div class="card">
                <div class="tileClose">&#x2715;</div>
            <img src="./abc.png" class="dp-img"/>
            <div class="card-info-doc">
                <div class="doc-name">Doctor 3</div>
                <div class="doc-contact">9874563210</div>
                <div class="doc-designation">Degrees</div>
                <div class="doc-domain">doc-domain</div>
            </div>
            <div class="venue-time">
                    <div class="place-list-doc">
                            <div class="fees">200</div>
                            chambar 1

                            <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>
                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>
                        </div>


                        <div class="place-list-doc">
                            <div class="fees">200</div>
                            chambar 2

                            <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>
                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>

                        </div>
            </div>
                <div class="full-info">
                <div class="review">

                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                </div>
            </div>
        </div>








            <div class="card">
                <div class="tileClose">&#x2715;</div>
            <img src="./abc.png" class="dp-img"/>
            <div class="card-info-doc">
                <div class="doc-name"> Doctor 4</div>
                <div class="doc-contact">9874563210</div>
                <div class="doc-designation">Degrees</div>
                <div class="doc-domain">doc-domain</div>
            </div>
            <div class="venue-time">
                    <div class="place-list-doc">
                            <div class="fees">200</div>
                            chambar 1
                            <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>

                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>
                        </div>


                        <div class="place-list-doc">
                            <div class="fees">200</div>
                            chambar 2
                            <div class="venue-address">address</div>
                            <div class="venue-timing">7:00PM</div>

                            <div class="appt-making">
                                <div class="appt-btn-grp-control">make appointment?</div>
                               <div class="appt-btn-grp">
                                    <input type="button" value="yes" class="appt-btn">
                                    <input type="button" value="no" class="appt-btn">
                                </div>
                            </div>

                        </div>
            </div>
            <div class="full-info">
                <div class="review">

                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                    <div class="review-elem">this is a review</div>
                </div>
            </div>
        </div>
 </div-->


</div>


<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript" src="./script.js"></script>

</body>
</html>
