<html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div id="wrapper">
<h1 class="register-title">Welcome</h1>
<form class="register">

    <input type="text" class="register-input" placeholder="First Name" maxlength="20" required>
    <input type="text" class="register-input" placeholder="Middle Name" maxlength="20">
    <input type="text" class="register-input" placeholder="Last Name" maxlength="20" required>
    <br>
    <br>
    <div class="register-switch">
        <input type="radio" name="sex" value="F" id="sex_f" class="register-switch-input" checked>
        <label for="sex_f" class="register-switch-label">Female</label>
        <input type="radio" name="sex" value="M" id="sex_m" class="register-switch-input">
        <label for="sex_m" class="register-switch-label">Male</label>
    </div>

    <div id="birthday-input">
    
    <label class="DOB">Birthday</label><br/>
    <label class="month">
        <select class="select-style" name="BirthMonth">
            <option value="">Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>

        </select>
        <label><input class="birthday" maxlength="2" name="BirthDay" placeholder="Day" required=""
                      style="text-decoration-color: #5D92BA"></label>
        <label><input class="birthyear" maxlength="4" name="BirthYear" placeholder="Year" required=""></label>
    </label>
    
    </div>

    <div>
                    <!--  for cross <div class="check-logo">&#xd7;</div>  -->
    <input type="email" class="register-input input-with-checkbox" placeholder="Email address" required><div class="check-logo">&#x2713;</div>
    <!--span style="display: inline"><img height="20px" src="../images/logo.png"/></span--></div>
    <input type="password" class="register-input input-with-checkbox" maxlength="8" placeholder="Password" required><div class="check-logo">&#x2713;</div>
    <input type="password" class="register-input input-with-checkbox" maxlength="8" placeholder="Confirm Password" required><div class="check-logo">&#x2713;</div>
    <input type="submit" value="GET STARTED" class="register-button">
</form>
</div>

<script type="text/javascript" src="../js/jq.js"></script>
<script type="text/javascript" src="js/index.js"></script>

</body>
</html>
