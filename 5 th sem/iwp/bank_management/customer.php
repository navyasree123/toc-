<?php
session_start();
require 'usr_funcs.php';
require 'config.php';
$user=$_SESSION['valid_user'];
$task=@$_GET['task'];
if(emp_check()){
    $user=generate_name();
}
if(!valid_user_check()){
    header("Location: index.php");
}
$user=$_SESSION['valid_user'];
if(emp_check()){
    $user=generate_name();
}
do_header("Customer");
do_menu($user);
if($task=='' || $task=='all'){
?>
  <table class='table table-bordered'>
    <tr>
      <th colspan='2' class='table-inverse'>
        <center>Customer Details</center>
      </th>
    </tr>
    <?php
    try{
        $sql="SELECT customer_id,customer_name FROM customer";
        if($result=$mysqli->query($sql)){
            if($result->num_rows>0){
                while($row=$result->fetch_array()){
                    ?>
      <tr>
        <td>Customer ID: </td>
        <td>
          <?php echo $row[0]; ?>
        </td>
      </tr>
      <tr>
        <td>Customer Name: </td>
        <td>
          <?php echo $row[1]; ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <center><a href='customer.php?task=det&id=<?php echo $row[0];?>'> View Details</a></center>
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
if($task=='det'){
    $id=$_GET['id'];
    try{
        $sql="SELECT b.customer_name, b.customer_id,a.account_number,a.account_type,b.customer_address from account as a,customer as b where a.customer_id=b.customer_id and a.customer_id=$id";
    if($result=$mysqli->query($sql)){
        if($result->num_rows>0){
            if($row=$result->fetch_array()){
                ?>
    <table class='table table-striped'>
      <thead>
        <tr>
          <th colspan='2' class='table-inverse'>
            <center>Customer Details</center>
          </th>
        </tr>
      </thead>
      <tr>
        <td>Customer Name: </td>
        <td>
          <?php echo $row[0]; ?>
        </td>
      </tr>
      <tr>
        <td>Customer ID: </td>
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
        <td>Account Type: </td>
        <td>
          <?php echo $row[3]; ?>
        </td>
      </tr>
      <tr>
        <td>Address: </td>
        <td>
          <?php echo $row[4]; ?>
        </td>
      </tr>
      <tr>
        <td colspan="2"><a href='customer.php'>Go Back</a></td>
      </tr>
    </table>
    <?php
            }
        }
    }
    }catch(Exception $e){
        do_exp_content($e->getMessage());
    }
}
do_footer();

?>