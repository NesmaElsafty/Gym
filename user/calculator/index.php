<?php 
require_once '../config/PHPheader.php';
error_reporting(0);
// checkAuth('clients','../../index.php');

    if ($data['result'] != 0) {
        $_SESSION['result'] = true;
    }else{
      if (isset($_SESSION['result'])) {
        unset($_SESSION['result']);
      }
    }
if(empty($_SESSION['unID'])){
  $_SESSION['cal_err'] = 'You Will Not Get The Result Before Signing In';
  // exit();
}

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: #222B33;
  }

  #regForm {
    background-color: #222B33;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300px;
  }

  h1 {
    text-align: center;  
  }

  input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }

  /* Hide all steps by default: */
  .tab {
    display: none;
  }

  button {
    background-color: #4CAF50;
    color: #ffffff;
    border:none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
  }

  button:hover {
    opacity: 0.8;
  }

  #prevBtn {
    background-color: #bbbbbb;
  }

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none; 
    border-radius: 50%; 
    display: inline-block;
    opacity: 0.5;
  }

  .step.active {
    opacity: 1;
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #4CAF50;
  }
</style>
<link rel="icon" href="../config/New folder/images/WhatsApp Image 2019-09-23 at 1.28.30 PM.jpg">
<link rel="stylesheet" type="text/css" href="../config/New folder/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../config/New folder/css/bootstrapmodefied.css">
<link rel="stylesheet" type="text/css" href="../config/New folder/css/all.min.css">
<link rel="stylesheet" type="text/css" href="../config/New folder/css/fontawesome.min.css">
<link rel="stylesheet" type="text/css" href="../config/New folder/css/mainpage.css">
<link rel="stylesheet" type="text/css" href="../config/New folder/css/meals.css">
<link rel="stylesheet" type="text/css" href="../config/New folder/css/effort.css">
<link rel="stylesheet" type="text/css" href="../config/New folder/css/effort3.css">
<link rel="stylesheet" type="text/css" href="../config/New folder/css/weight.css">
<title>Calculator</title>
<body>
 <!--strat navbar -->
 <!--strat navbar -->

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container" style="max-width: 1150px;">
    <a class="navbar-brand" href="#">
      <img src="../config/New folder/images/WhatsApp Image 2019-09-23 at 1.28.30 PM.jpg" alt="protien" class="img-fluid">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Calculator</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../ourDoctor/index.php">Our Doctors</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Our Products
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../supplements/index.php">Supplement</a>
            <a class="dropdown-item" href="../packages/index.php">Backges</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../menu/index.php">Menu</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../ourdata/about_us.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../ourdata/contact_us.php">contact Us</a>
        </li>
        <?php if (!empty($data)) { ?> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="../user.png" class="img-responsive" style="width:40px;height: 40px;margin-left: 100px;">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../auth/profile.php?id=<?php echo $_SESSION['unID']; ?>">My Profile</a>
              <a class="dropdown-item" href="../auth/addEdit.php?id=<?php echo $_SESSION['unID']; ?>">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../auth/logout.php?id=<?php echo $_SESSION['unID']; ?>">Log out</a>
            </div>
          </li>
          <?php if (!empty($data['doctor'])) {?>
              <li style="font-size: 30px;position: relative;right: -5px;top:13px" >
              <a href="../chat/chatroom.php?id=<?php $_SESSION['unID']; ?>"><i class="far fa-comments" style="color: white;"></i></a>
              <span style="width:10px;height:10px;border-radius:50%;/"></span>
            </li>
            <?php } ?>
        <?php }else{ ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Regist
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../auth/addEdit.php">Sign Up</a>
            <a class="dropdown-item" href="../auth/login.php">Login</a>
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a class="dropdown-item" href="../products/menu/index.php">Menu</a> -->
          </div>
        </li>
        <?php } ?>
      </ul>   
    </div>
  </div>
</nav>

<?php if (isset($_SESSION['cal_err'])) { ?>
  <div class="alert alert-danger" style="text-align: center;" role="alert">
<?php echo $_SESSION['cal_err'];  ?>
  </div>
<?php 
// exit();
  unset($_SESSION['cal_err']);
} ?>
<?php
if (isset($_SESSION['result'])) { ?>
  <div class="alert alert-danger" style="text-align: center;" role="alert">
    Your Previous Needed Calories Was: <?php echo $data['result'];?>, Your Data Will be Changed if You Calculated Your Needed Calories Again.
   </div>
<?php } ?>



<form id="regForm" action="calculator.php" method="post">

  <!-- One "tab" for each step in the form: -->
  <div class="tab " >

    <div class="container"style="padding:20px 0 20px 0;">
      <div class="row bodies" style="margin-top:-50px;">
        <div style="position:relative;right:-50px;" class="male">
          <input type="radio" name="gender" id="male" value="male" style="visibility: hidden;">
          <label for="male" >
            <img src="../config/New folder/images/WhatsApp Image 2019-10-26 at 1.35.39 AM.jpeg" style="img-responsive;width:200px;height:200px;border-radius:50%;" alt="responsive img"class="img-fluid man col-xs-5">
          </label>
        </div>
        <div style="position:relative;right:-500px;"class="female">
          <input type="radio" name="gender" id="female" value="male" style="visibility: hidden;">
          <label for="female" >
            <img src="../config/New folder/images/WhatsApp Image 2019-10-26 at 1.36.32 AM.jpeg" style="img-responsive;width:200px;height:200px;border-radius:50%;" alt="responsive img"class="img-fluid woman col-xs-5"></label>
          </div>
        </div>
      </div>


    </div>
    <!--start meat icons-->
    <div class="tab">
      <div class="container checkbox">
        <div class="row checkbox1">
         <table  class="offset-md-7">
           <tr>
             <td colspan="2"><p style="font-size: 30px; " class="col-xs-10">choose your favourite meal</p></td>
           </tr>
           <tr>
             <td class="col-md-6 col-xs-10">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultChecked1" name="food[]" value="meat">
                <label class="custom-control-label" for="defaultChecked1">
                  <img src="../config/New folder/images/meat-flat.png" class="img-responsive active"></label>
                </div>

              </td> 
              <td class="col-md-6 col-xs-10">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="defaultChecked2" name="food[]" value="chicken">
                  <label class="custom-control-label" for="defaultChecked2">
                    <img src="../config/New folder/images/fried-chicken-icon-256.png" class="img-responsive "></label>
                  </div>

                </td> 
              </tr>
              <tr>
               <td>
                 <p>meat</p>
               </td>
               <td>
                <p>chicken</p>
              </td>
            </tr>       
            <tr>
              <td>
                <div>

                </div>

                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="defaultChecked3" name="food[]" value="fish">
                  <label class="custom-control-label" for="defaultChecked3"> 
                    <img src="../config/New folder/images/dcdeb93dc6b057342ecb6978ab470028.png" class="img-responsive" id="image">
                  </label>
                </div>

              </td> 
              <td>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="defaultChecked4" name="food[]" value="turkey">
                  <label class="custom-control-label" for="defaultChecked4">
                    <img src="../config/New folder/images/WhatsApp Image 2019-10-26 at 3.41.00 AM.jpeg" class="img-responsive" >
                  </label>
                </div>

              </td>
            </tr>
            <tr>
              <td>
                <p>fish</p>
              </td>
              <td>
               <p>turkey</p>
             </td>
           </tr> 
         </table>
       </div>
     </div>
     <!--end meat icons-->

   </div>
   <div class="tab">

    <div class="container checkbox">
      <div class="row checkbox1">
       <table  class="offset-md-7">
         <tr>
           <td colspan="2"><p style="font-size: 30px;">choose your favourite meal</p></td>
         </tr>
         <tr>
           <td>
             <div class="custom-control custom-checkbox ">
               <input type="checkbox" class="custom-control-input invisible " id="defaultUnchecked" name="food[]" value="Mushrooms">
               <label class="custom-control-label " for="defaultUnchecked">
                <img src="../config/New folder/images/2102433.png" class="img-responsive">
              </label>
            </div>
          </td> 
          <td>
           <div class="custom-control custom-checkbox ">
             <input type="checkbox" class="custom-control-input invisible" id="defaultUnchecked2" name="food[]" value="broccoli">
             <label class="custom-control-label " for="defaultUnchecked2">
              <img src="../config/New folder/images/848844_food_512x512.png" class="img-responsive ">
            </label>
          </div>
        </td> 
      </tr>
      <tr>
       <td>
         <p>Broccoli</p>
       </td>
       <td>
        <p>Mushrooms</p>
      </td>
    </tr>       
    <tr>
      <td>
        <div>

        </div>

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="defaultChecked8" name="food[]" value="zucchini">
          <label class="custom-control-label" for="defaultChecked8">
            <img src="../config/New folder/images/226218_fruit_256x256.png" class="img-responsive" id="image">'
          </label>
        </div>
      </td> 
      <td>
        <div>

        </div>

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="defaultIndeterminate" name="food[]" value="Cauliflower">
          <label class="custom-control-label" for="defaultIndeterminate">
            <img src="../config/New folder/images/Cauliflower.png" class="img-responsive">
          </label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <p>zucchini</p>
      </td>
      <td>
       <p>Cauliflower</p>
     </td>
   </tr> 
 </table>

</div>
</div>
<!--end meat icons-->

</div>
<div class="tab">

  <div class="container checkbox">
    <div class="row checkbox1">
     <table  class="offset-md-7">
       <tr>
         <td colspan="2"><p style="font-size: 30px;">choose your favourite meal</p></td>
       </tr>
       <tr>
         <td>
           <div class="custom-control custom-checkbox ">
             <input type="checkbox" class="custom-control-input invisible " id="defaultUnchecked7" name="food[]" value="cheese">
             <label class="custom-control-label " for="defaultUnchecked7">
              <img src="../config/New folder/images/Google-Noto-Emoji-Food-Drink-32377-cheese-wedge.ico" class="img-responsive">
            </label>
          </div>
        </td> 
        <td>
         <div class="custom-control custom-checkbox ">
           <input type="checkbox" class="custom-control-input " id="defaultIndeterminate6" name="food[]" value="egg">
           <label class="custom-control-label " for="defaultIndeterminate6">
            <img src="../config/New folder/images/eggs-icon-4.jpg" class="img-responsive ">
          </label>
        </div>
      </td> 
    </tr>
    <tr>
     <td>
       <p>cheese</p>
     </td>
     <td>
      <p>egg</p>
    </td>
  </tr>       
  <tr>
    <td>
      <div>

      </div>

      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultChecked5" name="food[]" value="almonds">
        <label class="custom-control-label" for="defaultChecked5">
          <img src="../config/New folder/images/icon-256-256-true-000e29cf393dc9e866f266a0728fa0c8.png" class="img-responsive" id="image">
        </label>
      </div>
    </td> 
    <td>
      <div>

      </div>

      <div class="custom-control custom-checkbox">
       <input type="checkbox" class="custom-control-input" id="defaultIndeterminate4" name="food[]" value="butter">
       <label class="custom-control-label" for="defaultIndeterminate4">
        <img src="../config/New folder/images/butter-bloodstained-ritual-of-the-night-wiki-guide (1).png" class="img-responsive">
      </label>
    </div>
  </td>
</tr>
<tr>
  <td>
    <p>almonds</p>
  </td>
  <td>
   <p>Butter</p>
 </td>
</tr> 
</table>
</div>
</div>
</div>
<!--end meat icons-->
<!--start effort-->
<div class="tab">

  <div class="container myeffort"style="margin-right:-200px">
    <div class="row d-block">
      <div class="p">
        <p class="d-block" style="position: relative;top:90">Physical Effort</p>
      </div>
      <ul class="donate-now">
        <li>
          <input type="radio" id="111" name="activity_level" value="1" />
          <label for="111">I don't do any physical effort</label>
        </li>
        <li>
          <input type="radio" id="222" name="activity_level" value="2" />
          <label for="222">I'm lightly active</label>
        </li>
        <li>
          <input type="radio" id="333" name="activity_level" value="3" />
          <label for="333">Someconfig/times I walk</label>
        </li>
        <li>
          <input type="radio" id="444" name="activity_level" value="4" />
          <label for="444">I do exercises once or twice per week</label>
        </li>
        <li>
          <input type="radio" id="555" name="activity_level" value="5" />
          <label for="555">I do exercises from three to five times per week</label>
        </li>
      </ul>
    </div>
  </div>

</div>

<div class="tab">

  <div class="container myeffort"style="margin-right:-200px">
    <div class="row d-block">
      <div class="p">
        <p class="d-block" style="position: relative;top:90">How your day usually goes?</p>
      </div>
      <ul class="donate-now">
        <li>
          <input type="radio" id="a25" name="routine" value="In the office" />
          <label for="a25">In the office</label>
        </li>
        <li>
          <input type="radio" id="a50" name="routine" value="In the office but I go out regularly" />
          <label for="a50">In the office but I go out regularly</label>
        </li>
        <li>
          <input type="radio" id="a75" name="routine" value="I walk most of the day" />
          <label for="a75">I walk most of the day</label>
        </li>
        <li>
          <input type="radio" id="a100" name="routine" value="Handwork" />
          <label for="a100">Handwork</label>
        </li>
        <li>
          <input type="radio" id="666" name="routine" value="I stay at home most of the day" />
          <label for="666">I stay at home most of the day</label>
        </li>
      </ul>
    </div>
  </div>

</div>
<div class="tab">

  <div class="container check1">
    <div class="row effort d-block ">
      <div class="p ">
        <p class="d-block pp" style="margin-right: -380px;margin-bottom: 70px;">You can choose more than one choice</p>
      </div>
      <ul class="offset-md-3 ul1">
        <li class="li1">
          <label class="checkboxcontainer">
            <input type="checkbox" name="routine_issues[]" value="I don't sleep enough">
            <span class="checkmark"></span>I don't sleep enough
          </label>
        </li>
        <li class="li1">
          <label class="checkboxcontainer">
            <input type="checkbox" name="routine_issues[]" value="I eat late sometimes">
            <span class="checkmark"></span>I eat late sometimes
          </label>
        </li>
        <li class="li1">
          <label class="checkboxcontainer">
            <input type="checkbox" name="routine_issues[]" value="I eat a lot of salty food">
            <span class="checkmark"></span>I eat a lot of salty food
          </label>
        </li>
        <li class="li1">
          <label class="checkboxcontainer">
            <input type="checkbox" name="routine_issues[]" value="I need to eat alot of sweets">
            <span class="checkmark"></span>I need to eat alot of sweets
          </label>
        </li>
        <li class="li1">
          <label class="checkboxcontainer">
            <input type="checkbox" name="routine_issues[]" value="I love soft drinks so much">
            <span class="checkmark"></span>I love soft drinks so much
          </label>
        </li>
      </ul>
    </div>
  </div>

</div>
<div class="tab">

  <div class="container myeffort"style="margin-right:-200px">
    <div class="row d-block">
      <div class="p">
        <p class="d-block" style="position: relative;top:90">Your Goal</p>
      </div>
      <ul class="donate-now">
        <li>
          <input type="radio" id="999" name="goal" value="Fat loss" />
          <label for="999">Fat loss</label>
        </li>
        <li>
          <input type="radio" id="777" name="goal" value="Musles gain" />
          <label for="777">Musles gain</label>
        </li>
        <li>
          <input type="radio" id="888" name="goal" value="Maintenance yor weight"  />
          <label for="888">Maintenance yor weight</label>
        </li>
      </ul>
    </div>
  </div>

</div>
<div class="tab">

  <div class="container offset-md-3 final">
    <div class="row">
      <table >
        <tr class="tr1">
          <td colspan="3" class="measurements td1" style="font-family: sans-serif ;font-size:25px;font-weight: bold;">measurements</td>
        </tr>
        <tr class="tr1">
          <td class="icon td1"><i class="fas fa-birthday-cake"></i></td>
          <td class="td1 text"><input type="text" required placeholder="your age" name="age"></td>
          <td class="td1 text1"><p>Age</p></td>
        </tr>
        <tr class="tr1">
          <td class="icon td1"><i class="fas fa-ruler"></i></td>
          <td class="td1 text"><input type="text" required placeholder="your height" name="height"></td>
          <td class="td1 text1"><p>Height</p></td>
        </tr>
        <tr class="tr1">
          <td class="icon td1"><i class="fas fa-balance-scale-right"></i></td>
          <td class="td1 text"><input type="text" required placeholder="your weight" name="weight"></td>
          <td class="td1 text1"><p>Your weight</p></td>
        </tr>
      </table>
    </div>
  </div>

</div>




<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" style="border-radius: 20px;outline: none;" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" style="border-radius: 20px;outline: none;" onclick="nextPrev(1)">Next</button>
  </div>
</div>
<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
    <!--end footer-->
    <script src="../config/New folder/js/jquery-3.4.1.min.js"></script>  
    <script src="../config/New folder/js/popper1.min.js"></script>       
    <script src="../config/New folder/js/bootstrap.min.js"></script>
</body>
</html>
