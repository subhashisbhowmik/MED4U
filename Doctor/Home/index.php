<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 29-08-2016
 * Time: 02:42
 */
require_once '../../functions.php';
checkAuth("../../Logout/");

if (isset($_REQUEST['logout'])) header("Location: ../../Logout/");
if (!isset($_COOKIE['username']) | $_COOKIE['username'] === "") header("Location: ../../Login/");
//if (isset($_SESSION['started'])) echo $_SESSION['started'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,user-scalable=no">
    <link rel="stylesheet" href="s.css">
    <link rel="stylesheet" href="header-styles.css">
    <title>MED4U- Doctor's Home</title>
</head>
<body>
<div id="preloader">
    <div id="preloader-text">MED4U</div>
    <div class="signal"></div>
</div>
<div id="header">
    <div class="head-elem"><a>Logo</a></div>


    <div class="head-elem">
        <div id="search-bar">
            <div id="search-bar-wrapper">
                <div id="search-close"><img src="./back.svg"/></div>
                <input id="search-input" for="search-input" type="search" value="" alt="search items..."
                       name="search-input"
                       placeholder="Search MED4U..."/>
                <button id="search-btn"><img src="./search-icon.svg"/></button>
            </div>
            <div id="search-results">
                <div class="loader"></div>
            </div>
        </div>
    </div>


    <div class="head-elem" id="settings-btn-cont">
        <div id="settings-btn" class="inlineblock">&#9776;</div>
        <div id="settings-close" class="inlineblock">&#x2715;</div>
        <!-- or &#x2630;  -->
        <div id="settings-select">
            <div class="select-opt profile-go">Profile</div>
            <div class="select-opt">Settings</div>
            <a href="?logout=1">
                <div class="select-opt">log out</div>
            </a>
        </div>
    </div>
</div>


<div id="main-flow">


    <div id="wrapper">

        <div class="item" id="i1" style="background-color:#3cb2c6 !important;">
            <div align="center" class="tile_icon"><img src="../../SVG/phone-contact.svg"/> </div>
            <button class="tileClose">&#x2715;</button>
            <div class="item_content"></div>
            <div class="text"><p>APPOINTMENTS</p></div>
        </div>
        <div class="item" id="i2" style="background-color:#b2cf1e !important;">
            <div align="center" class="tile_icon"><img src="../../SVG/phonendoscope.svg"/> </div>
            <button class="tileClose">&#x2715;</button>
            <div class="item_content"></div>
            <div class="text"><p>DOCTORS</p></div>
        </div>
        <div class="item" id="i3" style="background-color:#62615f !important;">
            <div align="center" class="tile_icon"><img src="../../SVG/verification-of-delivery-list-clipboard-symbol.svg"/> </div>
            <div class="text"></div>
            <button class="tileClose">&#x2715;</button>
            <div class="item_content"></div>
            <div class="text"><p>PRESCRIPTION</p></div>
        </div>
        <div class="item" id="i4" style="background-color:#424b5a !important;">
            <div align="center" class="tile_icon"><img src="../../SVG/pill.svg"/> </div>
            <div class="text"></div>
            <button class="tileClose">&#x2715;</button>
            <div class="item_content"></div>
            <div class="text"><p>MEDICINES</p></div>
        </div>
        <div class="item" id="i5" style="background-color:#2abab3 !important;">
            <div align="center" class="tile_icon"><img src="../../SVG/history-clock-button.svg"/> </div>
            <div class="text"></div>
            <button class="tileClose">&#x2715;</button>
            <div class="item_content"></div>
            <div class="text"><p>HISTORY</p></div>
        </div>
        <div class="item" id="i6" style="background-color:#f7644e !important;">
            <div align="center" class="tile_icon"><img src="../../SVG/first-aid-kit.svg"/> </div>
            <div class="text"></div>
            <button class="tileClose">&#x2715;</button>
            <div class="item_content"></div>
            <div class="text"><p>MED FARMS</p></div>
        </div>
        <div class="item" id="i7" style="background-color:#edb22b !important;">
            <div align="center" class="tile_icon"><img src="../../SVG/hospital-building.svg"/> </div>
            <div class="text"></div>
            <button class="tileClose">&#x2715;</button>
            <div class="item_content"></div>
            <div class="text"><p>HOSPITALS</p></div>
        </div>
        <div class="item" id="i8" style="background-color:#9b69e9 !important;">
            <div align="center" class="tile_icon"><img src="../../SVG/ambulance.svg"/> </div>
            <div class="text"></div>
            <button class="tileClose">&#x2715;</button>
            <div class="item_content"></div>
            <div class="text"><p>EMERGENCY</p></div>
        </div>
        <div class="item" id="i9" style="background-color:#1079af !important;">
            <div align="center" class="tile_icon"><img src="../../SVG/settings.svg"/> </div>
            <div class="text"></div>
            <button class="tileClose">&#x2715;</button>
            <div class="item_content"></div>
            <div class="text"><p>SETTINGS</p></div>
        </div>
    </div><!--items list end-->


    <div id="feed-peek">
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                fekj adnjk adadad a adkjad adakjdjk fgk kbj b evkv evev jke v vev
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjyajyuuahmja djadjhj yajyuuahmjadj adjhjy ajyuuahmjadjadjhj yajyuuahmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjyajyuuahmja djadjhj yajyuuahmjadj adjhjy ajyuuahmjadjadjhj yajyuuahmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjyajyuuahmja djadjhj yajyuuahmjadj adjhjy ajyuuahmjadjadjhj yajyuuahmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjyajyuuahmjadj adjhjyajyuua hmjadjadjhjya jyuuahmjadjadjh jyajyuuahmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjyajyuuahmja djadjhjyajy uuahmjadjadjh jyajyuuah mjadja dj h j y ajyu uahmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjy ajyuua hmjadja djhjyaj yuuahmjad jadjhjy ajyuuahmj adjadjhjy ajyuua hmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjy ajyuua hmjadja djhjyaj yuuahmjad jadjhjy ajyuuahmj adjadjhjy ajyuua hmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjy ajyuua hmjadja djhjyaj yuuahmjad jadjhjy ajyuuahmj adjadjhjy ajyuua hmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjy ajyuua hmjadja djhjyaj yuuahmjad jadjhjy ajyuuahmj adjadjhjy ajyuua hmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjy ajyuua hmjadja djhjyaj yuuahmjad jadjhjy ajyuuahmj adjadjhjy ajyuua hmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjy ajyuua hmjadja djhjyaj yuuahmjad jadjhjy ajyuuahmj adjadjhjy ajyuua hmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjy ajyuua hmjadja djhjyaj yuuahmjad jadjhjy ajyuuahmj adjadjhjy ajyuua hmjadjad
            </div>
        </div>
        <div class="feed">
            <div class="feed-header"><a href="#">Feed Header text</a></div>
            <div class="feed-content">
                jhjy ajyuua hmjadja djhjyaj yuuahmjad jadjhjy ajyuuahmj adjadjhjy ajyuua hmjadjad
            </div>
        </div>

    </div>


</div><!--main flow ends-->
<div id="footer"><br> footer text <br></div>
<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript" src="./header.js"></script>
<script type="text/javascript" src="./script.js"></script>

<style>
</style>
</body>
</html>
