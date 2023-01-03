<link rel='stylesheet' type='text/css' href='css/style.css'>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- selectize -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <!-- fonts -->
    <script src="https://kit.fontawesome.com/43040fb5ec.js" crossorigin="anonymous"></script>
    <!-- frameworks -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <title>Home page</title>
</head>
<body>    



<script>
    // this script need to in body but before html content to avoid flickering
    const localTheme = localStorage?.getItem("theme");
    if (localTheme === "dark") {
      document.body.classList.add("dark-theme");
    } else {
      document.body.classList.remove("dark-theme");
    }
  </script>



<nav id="navb">
  <div class="container-fluid align-items-center">
    <a class="navbar-brand" href="index.html">
      <span class="text">BANKING</span><span class="find">SYSTEM</span>
    </a>    
    <div class="mode d-flex align-items-center">
      <a class="nav-link" href="index.html"> <span class="find">Home</span></a>
      <a class="nav-link" href="about.html"> <span class="find">About Us</span></a>
      <img class="logo" id="icon" src="images/moon.png" />
   </div>
  </div>
</nav>

    <div class="bg_holder">
        <div class="container1">            
            <ul class="navbar1">
                <li class="tab1">Customers</li>
                <li class="tab1">Transfer</li>
                <li class="tab1">Transactions</li>
            </ul>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="padding-left:1.4em ;">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                  </tr>
                </thead>
                <tbody class="table_body">

                <!-- DUMMY VALUES -->
                    <!-- fetched dynamically from db -->
                </tbody>

            </table>

            

        
            <div class="transfer_window">
                <div class="sendbox">
                    <select id="customer1"  name="c1" placeholder="Sender">
                     <!-- fetched dynamically from db -->

                     
                    </select>
                
                    <i class="fa-solid fa-arrow-right right_arrow"></i>
                
                    <select id="customer2" name="c2" placeholder="Receiver">
                        <!-- fetched dynamically from db -->
                    </select>
                </div>
            
                <div class="amount_box">
                    <input id="amount" name="amount" type="int" placeholder="Amount">
                </div>
                
            
                <div id="send_btn" >Send</div>              
            </div>
            

            <div class="transaction_window">
                    <!-- fetched dynamically from db -->
            </div>
        </div>
        <script src="js/page_switch.js"></script>                

        <script src="js/update_db.js"></script>

        <script src="js/fetch_db.js"></script>
        <script>

var icon = document.getElementById("icon");
icon.onclick = function () {
  document.body.classList.toggle("dark-theme");
  if (document.body.classList.contains("dark-theme")) {
    icon.src = "images/sun.png";
    localStorage.setItem("theme", "dark");
  } else {
    icon.src = "images/moon.png";
    localStorage.setItem("theme", "light");
  }
};

const initIcon = () => {
  if (document.body.classList.contains("dark-theme")) {
    icon.src = "images/sun.png";
  } else {
    icon.src = "images/moon.png";
  }
};
window.onload = initIcon();

        </script>

    </div>

    
</body>
</html>

                  