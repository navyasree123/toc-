<?php
session_start();
require('usr_funcs.php');
require('config.php');

if(!valid_user_check()){
    header("Location: index.php");
}

$user=generate_name();
do_header('Dependent');
do_menu($user);
try{
    if($_SESSION['user_type']=='employee'){
        $sql="select b.customer_name,b.customer_address,a.account_number,a.customer_id,a.balance,a.account_type from account as a,customer as b,employee as c where a.customer_id=b.customer_id and b.customer_name=c.dependent_name";
        if($result=$mysqli->query($sql)){
            if($result->num_rows>0){
                if($row=$result->fetch_array()){
                    ?>
  <table class='table table-striped'>
    <thead>
      <tr>
        <th colspan='2' class='table-inverse'>
          <center>My Dependent</center>
        </th>
      </tr>
    </thead>
    <tr>
      <td>Name: </td>
      <td>
        <?php echo $row[0]; ?>
      </td>
    </tr>
    <tr>
      <td>Address: </td>
      <td>
        <?php echo $row[1]; ?>
      </td>
    </tr>
    <tr>
      <td>Account Number: </td>
      <td>
        <?php echo $row[2]; ?>
      </td>
    </tr>
    <tr>
      <td>Customer ID: </td>
      <td>
        <?php echo $row[3]; ?>
      </td>
    </tr>
    <tr>
      <td>Balance: </td>
      <td>
        <?php echo $row[4]; ?>
      </td>
    </tr>
    <tr>
      <td>Account Type: </td>
      <td>
        <?php echo $row[5]; ?>
      </td>
    </tr>
  </table>
  <?php
                }else{
                    throw new Exception("Can't fetch Array");
                }
            }else{
                throw new Exception("Something Went Wrong");
            }
        }else{
            throw new Exception("Can't Run the Query");
        }
    }else{
        throw new Exception("Restricted Area");
    }
}catch(Exception $e){
    do_exp_conent($e->getMessage());
}


do_footer();
?>