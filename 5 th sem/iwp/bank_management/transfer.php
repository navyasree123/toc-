<?php
session_start();
require('config.php');
require('usr_funcs.php');
if(!valid_user_check()){
  header("index.php");
}
do_header("Transfer");
do_menu($_SESSION['valid_user']);


if(!isset($_POST['submit_transfer'])){
  ?>
  <div class='container' style='margin-top:50px;'>
    <h3><?php echo "Your Current Balance: ".tranfer_get_balance($_SESSION['valid_user_account_number']); ?></h3>
          <form method='post'>
            <div class="form-group">
              <label for="formGroupExampleInput2">Account Number:</label>
              <input name='account_number' type="text" name='pass2' class="form-control" id="formGroupExampleInput2" placeholder="Account Number"> </div><div class="form-group">
        <label class="sr-only" for="exampleInputAmount">Amount (in rupees)</label>
        <div class="input-group">
          <div class="input-group-addon">&#8377;</div>
          <input name='amount' type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
          <div class="input-group-addon">.00</div>
        </div>
      </div>
            <button name='submit_transfer' type="submit" class="btn btn-lg btn-primary btn-block">Transfer</button>
          </form>
        </div>
  <?php
}else{
  try{
    $amount=(int)$_POST['amount'];
    $account_number=$_POST['account_number'];
    if(empty($amount) || trim($amount)==''){
      throw new Exception("Fill the Form Correctly");
    }if(empty($account_number) || trim($account_number)==''){
      throw new Exception("Fill the Form Correctly");
    }
    if(!transfer_account_number_check($account_number)){
      throw new Exception("Enter a Valid Account Number");
    }
    if($amount<1000){
      throw new Exception("Add Higher Amount");
    }
    $balance_own=transfer_details($_SESSION['valid_user_account_number']);
    if($amount>$balance_own){
      throw new Exception("You Don't Have enough amount to Transfer");
    }
    $balance_other=transfer_details($account_number);
    if(($balance_own <0) || (empty($balance_own)) || ($balance_other <0) || (empty($balance_other))){
      throw new Exception("Can't Fetch Details");
    }
    $bal_own_new=$balance_own-$amount;
    $bal_other_new=$balance_other+$amount;
    $det=array($bal_own_new,$_SESSION['valid_user_account_number'],$bal_other_new,$account_number);
    if(do_transfer($det[0],$det[1]) && do_transfer($det[2],$det[3])){
      do_transfer_content("TRANSFER SUCCESSFUL","You can check your new balance now");
    }else{
      throw new Exception("Something Went Wrong. Please Try Again Later");
    }
  }catch(Exception $e){
    do_exp_content($e->getMessage());
  }
}


do_footer();
?>