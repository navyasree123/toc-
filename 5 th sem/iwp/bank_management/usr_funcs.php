<?php
function do_header($title){
    ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <style type="text/css">
      .selector-for-some-widget {
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
      }
      
      .temp1,
      .temp2 {
        margin-top: 150px;
      }
    </style>
  </head>

  <body>
    <?php
}
function do_content(){
    ?>
      <section id="about" class="about temp1">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2>KEEP CALM AND BELIEVE IN US</h2>
              <p class="lead">We Protect you and your money even when you are asleep <a style='text-decoration:none;' href="#">BANK</a>.</p>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <?php
}
function do_content_emp(){
    ?>
        <section id="about" class="about temp1">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2>BANKING IS NECESSARY</h2>
                <p class="lead">Customer satisfaction is worthless. Customer loyalty is priceless. <a style='text-decoration:none;' href="#">BANK</a>.</p>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container -->
        </section>
        <?php
}
function do_footer(){
    ?>
          <hr class='temp2'>
          <div class="container marketing">
            <footer>
              <p>&copy; 2017 BANK, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  </body>

  </html>
  <?php
}
function do_exp_content($e){
    echo "<div class='container' style='margin-top:50px;'> $e </div>";
}
function do_index_menu(){
    ?>
    <center>
      <nav class="navbar navbar-light bg-faded">
        <div class="navbar-header"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
          <a class="navbar-brand" href="main.php">
            <h2>BANK</h2> </a>
        </div>
        <div class="nav navbar-nav"> <a class="nav-item nav-link active" href="index.php">Login</a> <a class="nav-item nav-link active" href="register.php">Register</a> </div>
      </nav>
    </center>
    <?php
}
function do_menu($user){
    ?>
      <nav class="navbar navbar-light bg-faded">
        <div class="navbar-header"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
          <a class="navbar-brand" href="main.php">
            <h2>BANK</h2> </a>
        </div>
        <div style="float:right;padding-right:80px;">
          <div class="nav navbar-nav"> <span class="nav-item nav-link active">
                            <?php echo ucfirst($user); ?>
                        </span> <a class="nav-item nav-link active" href="account.php">Account</a><?php if($_SESSION['user_type']!='employee'){ ?> <a class='nav-item nav-link active' href='deposit.php'>Deposit</a> <a class="nav-item nav-link active" href="employee.php">Employee</a>
            <?php
						}
                        if($_SESSION['user_type']=='employee'){
                            ?> <a class="nav-item nav-link active" href="customer.php">customer</a> <a class='nav-item nav-link active' href='dependent.php'>My Dependent</a>
              <?php
                        }
                        if($_SESSION['user_type']!='employee'){
                            ?><a class="nav-item nav-link active" href="transfer.php">Transfer</a><a class="nav-item nav-link active" href="loan.php">Loan</a>
                <?php
                        }
            ?> <a class="nav-item nav-link active" href="logout.php">Logout</a> </div>
        </div>
      </nav>
      <?php
}
function register_form(){
    ?>
        <div class='container' style='margin-top:50px;'>
          <form method='post'>
            <div class="form-group">
              <label for="formGroupExampleInput">Username</label>
              <input name='username' type="text" class="form-control" id="formGroupExampleInput" placeholder="Username"> </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Password</label>
              <input type="password" name='pass1' class="form-control" id="formGroupExampleInput2" placeholder="Password"> </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Confirm Password</label>
              <input type="password" name='pass2' class="form-control" id="formGroupExampleInput2" placeholder="Confirm Password"> </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Account Number:</label>
              <input name='account_number' type="text" name='pass2' class="form-control" id="formGroupExampleInput2" placeholder="Account Number"> </div>
            <button name='Rsubmit' type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
          </form>
        </div>
        <?php
}
function username_check($user){
    global $mysqli;
    $sql="select username from user_accounts where username='$user'";
    if($result=$mysqli->query($sql)){
        if($row=$result->num_rows>0){
            return true;
        }else{
            return false;
        }
    }else{
        echo "Can't Execute Query";
    }
}
function generate_name(){
    global $mysqli;
    if($_SESSION['user_type']='employee'){
        $sql="select employee_name from employee where employee_id=".$_SESSION['valid_user'];
        if($result=$mysqli->query($sql)){
            if($row=$result->fetch_array()){
                return $row[0];
            }
        }
    }
}
function valid_user(){
    if(isset($_SESSION['valid_user'])){
        if(trim($_SESSION['valid_user'])!=''){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function valid_user_account_number(){
    if(isset($_SESSION['valid_user_account_number'])){
        if(trim($_SESSION['valid_user_account_number'])!=''){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function view_account($user,$account_number){
    try{
        $account_number=(int)$account_number;
        if(!valid_user()){
            throw new Exception("You have to be signed in to view this.");
        }
        if(!valid_user_account_number()){
            throw new Exception("Something Went Wrong. <br />You have to be signed in to view this.");
        }
        $sql="SELECT * from account where account_number=$account_number";
        if($result=$mysqli->query($sql)){ 
            if($result->num_rows >0){
                if($row=$result->fetch_array()){
                    ?>
          <table>
            <tr>
              <td>Username: </td>
              <td>
                <?php echo $user; ?>
              </td>
            </tr>
            <tr>
              <td>Account Number: </td>
              <td>
                <?php echo $row[0]; ?>
              </td>
            </tr>
            <tr>
              <td>Customer Id: </td>
              <td>
                <?php echo $row[1]; ?>
              </td>
            </tr>
            <tr>
              <td>Balance: </td>
              <td>
                <?php echo $row[1]; ?>
              </td>
            </tr>
          </table>
          <?php
                }else{
                    throw new Exception("Something Went Wrong. Can't fetch_array()");
                }
            }else{
                throw new Exception("Sorry You haven't entered the details yet.");
            }
        } else{
            throw new Exception("Something went wrong. Can't execute the query");
        }
    } catch (Exception $ex) {
        do_exp_content($ex->getMessage());
    }
}
function valid_user_check(){
    if(isset($_SESSION['valid_user']) && isset($_SESSION['valid_user_account_number'])){
        if($_SESSION['valid_user']!='' && $_SESSION['valid_user_account_number']!=''){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function emp_check(){
    if($_SESSION['user_type']=='employee'){
        return true;
    }else{
        return false;
    }
}
function account_cus_emp(){
    if(emp_check()){
		$details=array('Employee Id: ','Name: ','Telephone: ','Start Date: ','Dependent Name: ');
        //$details=['Employee Id: ','Name: ','Telephone: ','Start Date: ','Dependent Name: '];
    }else{
		$details=array('Username','Account No.','Customer Id:','Balance: ');
        //$details=['Username','Account No.','Customer Id:','Balance: '];
    }
    return $details;
}

function account_emp(){
    global $row;
    global $detail;
    ?>
            <table class='table table-striped'>
              <thead>
                <tr>
                  <th colspan='2' class='table-inverse'>
                    <center>Account Details</center>
                  </th>
                </tr>
              </thead>
              <tr>
                <td>
                  <?php echo $detail[0]?>
                </td>
                <td>
                  <?php echo $_SESSION['valid_user']; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <?php echo $detail[1]; ?>
                </td>
                <td>
                  <?php echo $row[1]; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <?php echo $detail[2]; ?>
                </td>
                <td>
                  <?php echo $row[2]; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <?php echo $detail[3]; ?>
                </td>
                <td>
                  <?php echo $row[3]; ?>
                </td>
              </tr>
              <?php
        if(emp_check()){
            ?>
                <tr>
                  <td>
                    <?php echo $detail[4] ?>
                  </td>
                  <td>
                    <?php echo $row[4]; ?>
                  </td>
                </tr>
            </table>
            <?php
        }
}

//------------------------------LOAN-----------------------//

function do_loan_menu(){
    ?>
              <div class='container'>
                <nav class="navbar navbar-light bg-faded">
                  <ul class="nav navbar-nav">
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        LOAN
      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="loan.php?loan_task=check">CHECK LOAN</a> <a class="dropdown-item" href="loan.php?loan_task=request">REQUEST LOAN</a> <a class="dropdown-item" href="loan.php?loan_task=prev">CHECK PREVIOUS LOANS</a> </div>
                    </li>
                  </ul>
                </nav>
              </div>
              <?php
}

function do_loan_content($msg,$add_msg){
    ?>
                <section id="about" class="about temp1">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-12 text-center">
                        <h2><?php echo $msg; ?></h2>
                        <p class="lead">
                          <?php echo $add_msg; ?> <a style='text-decoration:none;' href="#">BANK</a>.</p>
                      </div>
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.container -->
                </section>
                <?php
}
function loan_active_check(){
    global $mysqli;
    try{
        $sql="SELECT loan_active from loan where account_number=".$_SESSION['valid_user_account_number'];
        if($result=$mysqli->query($sql)){
            if($result->num_rows>0){
              $loan_active=false;
              while($row=$result->fetch_array()){
                if($row[0]==1){
                  $loan_active=true;
                  break;
                }
              }  
              if($loan_active){
                return true;
              }else{
                return false;
              }
              /*if($row=$result->fetch_array()){
                    if($row[0]!=0){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    throw new Exception("Can't Fetch Array");
                } */
            }else{
                throw new Exception(" ");
            }
        }else{
            throw new Exception("Something Went Wrong. Can't Execute Query");
        }
    }catch(Exception $e){
        do_exp_content($e->getMessage());
    }
}

function check_loan(){
  global $mysqli;
    try{
        if(!loan_active_check()){
            do_loan_content('NO ACTIVE LOAN',"YOU CAN REQUEST LOAN NOW");
        }else{
            $sql="SELECT * FROM loan WHERE account_number=".$_SESSION['valid_user_account_number']." and loan_active=1";
            if($result=$mysqli->query($sql)){
                if($result->num_rows>0){
                    if($row=$result->fetch_array()){
                        ?>
                  <table class='table table-striped'>
                    <thead>
                      <tr>
                        <th colspan='2' class='table-inverse'>
                          <center>LOAN DETAILS</center>
                        </th>
                      </tr>
                    </thead>
                    <tr>
                      <td>Username: </td>
                      <td>
                        <?php echo $_SESSION['valid_user']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>LOAN Number: </td>
                      <td>
                        <?php echo $row[0]; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Customer Id: </td>
                      <td>
                        <?php echo $row[1]; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Amount: </td>
                      <td>
                        <?php echo $row[2]; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Account Number: </td>
                      <td>
                        <?php echo $row[3]; ?>
                      </td>
                    </tr>
                  </table>
                  <?php
                    }else{
                      throw new Exception("Can't Fetch Array");
                    }
                }else{
                  throw new Exception("No Loans Yet");
                }
            }else{
              throw new Exception("Can't Execute Query");
            }
        }
    }catch(Exception $e){
        do_exp_content($e->getMessage());
    }
}

function loan_prev(){
  global $mysqli;
  ?>
                    <table class='table table-bordered'>
                      <tr>
                        <th colspan='2' class='table-inverse'>
                          <center>PREVIOUS LOANS</center>
                        </th>
                      </tr>
                      <?php
  try{
    $sql="SELECT * FROM loan where account_number=".$_SESSION['valid_user_account_number'];
    if($result=$mysqli->query($sql)){
      if($result->num_rows>0){
        while($row=$result->fetch_array()){
                    ?>
                        <tr>
                          <td>LOAN Number: </td>
                          <td>
                            <?php echo $row[0]; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Amount: </td>
                          <td>
                            <?php echo $row[2]; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>LOAN ACTIVE: </td>
                          <td>
                            <?php if($row[4]==0){echo "PAID";}else{echo "<span style='color:red;'>DUE</span>";}?> </td>
                        </tr>
                        <tr>
                          <td colspan='2'></td>
                        </tr>
                        <?php
                }
      }else{
        throw new Exception("No Loans Yet");
      }
    }else{
      throw new Exception ("Can't Execute Query");
    }
  }catch(Exception $e){
    do_exp_content($e->getMessage());
  }
  echo "</table>";
}
function loan_details($ac_no){
  global $mysqli;
  $details=array();
    $sql="SELECT customer_id,account_number FROM account where account_number=".$_SESSION['valid_user_account_number'];
  if($result=$mysqli->query($sql)){
    if($result->num_rows>0){
      if($row=$result->fetch_array()){
        $details[]=$row[0];
        $details[]=$row[1];
        return $details;
      }
    }
  }
}

//-------------------- DEPOSIT ---------------------------//

function do_deposit_menu(){
    ?>
                          <div class='container'>
                            <nav class="navbar navbar-light bg-faded">
                              <ul class="nav navbar-nav">
                                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Deposit
      </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="deposit.php?deposit_task=deposit">DEPOSIT</a> <a class="dropdown-item" href="deposit.php?deposit_task=view_balance">VIEW BALANCE</a><a class="dropdown-item" href="deposit.php?deposit_task=prev_deposit">PREVIOUS DEPOSITS</a> </div>
                                </li>
                              </ul>
                            </nav>
                          </div>
                          <?php
}

function deposit_details($acc){
  global $mysqli;
  $details=array();
  $sql="select customer_id,balance from account where account_number=$acc";
  if($result=$mysqli->query($sql)){
    if($result->num_rows>0){
      if($row=$result->fetch_array()){
        $details[]=$row[0];
        $details[]=$row[1];
        return $details;
      }
    }
  }
}

function do_depo_content($msg,$add_msg){
    ?>
                            <section id="about" class="about temp1">
                              <div class="container">
                                <div class="row">
                                  <div class="col-lg-12 text-center">
                                    <h2><?php echo $msg; ?></h2>
                                    <p class="lead">
                                      <?php echo $add_msg; ?> <a style='text-decoration:none;' href="#">BANK</a>.</p>
                                  </div>
                                </div>
                                <!-- /.row -->
                              </div>
                              <!-- /.container -->
                            </section>
                            <?php
}





//-----------------------TRANSFER------------------------
function tranfer_get_balance($acc){
  global $mysqli;
  $output="";
  $sql="select balance from account where account_number=$acc";
  if($result=$mysqli->query($sql)){
    if($result->num_rows>0){
      if($row=$result->fetch_array()){
        $output=$row[0];
        return $output;
      }
    }
  }
}

function transfer_details($acc){
  global $mysqli;
  $details=0;
  $sql="select balance from account where account_number=$acc";
  if($result=$mysqli->query($sql)){
    if($result->num_rows>0){
      if($row=$result->fetch_array()){
        $details=$row[0];
        return $details;
      }
    }
  }
}


function transfer_account_number_check($acc){
  global $mysqli;
  $sql="select account_number from account where account_number=$acc";
  if($result=$mysqli->query($sql)){
    if($result->num_rows>0){
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }
}
function do_transfer($amount1,$acc1){
  global $mysqli;
  $sql="update account set balance=$amount1 where account_number=$acc1;";
  if($mysqli->query($sql)){
    return true;
  }else{
    return false;
  }
}
function do_transfer_content($msg,$add_msg){
    ?>
                            <section id="about" class="about temp1">
                              <div class="container">
                                <div class="row">
                                  <div class="col-lg-12 text-center">
                                    <h2><?php echo $msg; ?></h2>
                                    <p class="lead">
                                      <?php echo $add_msg; ?> <a style='text-decoration:none;' href="#">BANK</a>.</p>
                                  </div>
                                </div>
                                <!-- /.row -->
                              </div>
                              <!-- /.container -->
                            </section>
                            <?php
}
?>