<?php
require('config.php');
require('usr_funcs.php');
session_start();
$detail=account_cus_emp();
$user=$_SESSION['valid_user'];
if(emp_check()){
    $user=generate_name();
}
if(valid_user()){
    if(valid_user_account_number()){
        do_header('Account');
        do_menu($user);
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
          <center>Account Details</center>
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
        do_footer();
    }else{
        header('Location:index.php');
    }
}else{
        header('Location:index.php');
    }
?>