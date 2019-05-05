<?php
session_start();
require('usr_funcs.php');
require('config.php');

if(!valid_user_check()){
    header("Location: index.php");
}

@$get_task=$_GET['deposit_task'];

do_header("Deposit");
do_menu($_SESSION['valid_user']);
do_deposit_menu();
if(emp_check()){
  try{
    throw new Exception("RESTRICTED AREA");
  }catch(Exception $e){
    do_exp_content($e->getMessage());
  }
}
if($get_task==''){
  do_depo_content(strtoupper("Most banks offer higher rates of interest for senior citizens, with  <a style='text-decoration:none;' href='#'>PIGGY BANK</a> the rates of interest range from 5% -7.25%."),"The rate of interest is increased by 0.25% for senior citizens. The rate of interest of the FD vary depending on the term as it does with FDs in general.");
}
if($get_task=='view_balance'){
  try{
                if($_SESSION['user_type']=='customer'){
                    $sql="SELECT * from account where account_number=".$_SESSION['valid_user_account_number']."";
                }else{
                    $sql="select * from employee where employee_id=".$_SESSION['valid_user'];
                }
            if($result=$mysqli->query($sql)){ 
                if($result->num_rows >0){
                    if($row=$result->fetch_array()){
    if(emp_check()){ account_emp(); }else{ ?>
  <table class='table table-striped'>
    <thead>
      <tr>
        <th colspan='2' class='table-inverse'>
          <center>Balance</center>
        </th>
      </tr>
    </thead>
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
        <?php echo $row[2]; ?>
      </td>
    </tr>
    <?php if($row[2]<10000){echo "<p><span style='color:red;'>*Your Amount should be greater than 10000</span></p>";} ?>
  </table>
  <?php
                    }
                    }else{
                        throw new Exception("Something Went Wrong. Can't fetch_array()");
                    }
                }else{
                    throw new Exception("Sorry You haven't entered the details yet.");
                }
            } else{
                throw new Exception("Something went wrong. Can't execute the query");
            }
        }catch(Exception $e){
                do_exp_content($e->getMessage());
            }
}
if($get_task=='prev_deposit'){
  ?>
    <table class='table table-bordered'>
        <tr>
            <th colspan='2' class='table-inverse'>
                <center>Deposit Details</center>
            </th>
        </tr>
        <?php
    try{
        $sql="select deposit_number,amount,date from deposit where account_number=".$_SESSION['valid_user_account_number'];
        if($result=$mysqli->query($sql)){
            if($result->num_rows>0){
                while($row=$result->fetch_array()){
                    ?>
            <tr>
                <td>Deposit Number: </td>
                <td>
                    <?php echo $row[0]; ?>
                </td>
            </tr>
            <tr>
                <td>Amount: </td>
                <td>
                    <?php echo $row[1]; ?>
                </td>
            </tr>
            <tr>
                <td>Date: </td>
                <td>
                    <?php echo $row[2]; ?>
                </td>
            </tr>
            <tr>
                <td colspan='2'></td>
            </tr>
            <?php
                }
            }else{
                throw new Exception("Something Went Wrong");
            }
        }else{
            throw new Exception("Can't Execute the Query");
        }
    }catch(Exception $e){
        do_exp_content($e->getMessage());
    }
    
    ?>
    </table>
<?php
}
if($get_task=='deposit'){
  if(!isset($_POST['submit_deposit'])){
    ?>
  <div class='container'>
    <h2 class="form-signin-heading">Please Enter An Amount</h2>
    <form method='post' class="form-inline">
      <div class="form-group">
        <label class="sr-only" for="exampleInputAmount">Amount (in rupees)</label>
        <div class="input-group">
          <div class="input-group-addon">&#8377;</div>
          <input name='amount' type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
          <div class="input-group-addon">.00</div>
        </div>
      </div>
      <button type="submit" name='submit_deposit' class="btn btn-primary">DEPOSIT</button>
    </form>
  </div>
  <?php
    }else{
      try{
        $amount=(int)$_POST['amount'];
        $details=array();
        $details=deposit_details($_SESSION['valid_user_account_number']);
        if(empty($details) || !is_array($details)){
          throw new Exception("Can't Fetch User Details");
        }
        if(trim($amount)=='' || empty($amount)){
          throw new Exception ("Fill Form Correctly");
        }
        if($amount<1000 || $amount >500000){
          throw new Exception("LIMIT EXCEEDED");
        }
        $date=date('Y-m-d');
        $depo="INSERT INTO DEPOSIT(customer_id,amount,account_number,date)  VALUES(".$details[0].",".$amount.",".$_SESSION['valid_user_account_number'].",'$date')";
        if(!$mysqli->query($depo)){
          throw new Exception("Something Went Wrong Please Try again Later");
        }
        $amount+=$details[1];
        $sql="UPDATE account set balance=$amount where account_number=".$_SESSION['valid_user_account_number'];
        if($result=$mysqli->query($sql)){
          do_depo_content("DEPOSIT WAS SUCCESSFUL","CLICK <a href='deposit.php?deposit_task=prev_deposit'>HERE</a> TO CHECK.      ");
        }else{
          throw new Exception("SOMETHING WENT WRONG");
        }
      }catch(Exception $e){
        do_exp_content($e->getMessage());
      }
    }
}
do_footer();
?>