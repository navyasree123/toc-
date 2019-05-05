<?php
session_start();
require('usr_funcs.php');
require('config.php');
$task=@$_GET['task'];
if(!valid_user_check()){
    header("Location: index.php");
}
$user=$_SESSION['valid_user'];
if(emp_check()){
    $user=generate_name();
}
do_header("Profile");
do_menu($user);
if($task=='' || $task=='all'){
?>
    <table class='table table-bordered'>
        <tr>
            <th colspan='2' class='table-inverse'>
                <center>My profile</center>
            </th>
        </tr>
        <?php
    try{
        $sql="select employee_id,employee_name from employee";
        if($result=$mysqli->query($sql)){
            if($result->num_rows>0){
                while($row=$result->fetch_array()){
                    ?>
            <tr>
                <td>Employee ID: </td>
                <td>
                    <?php echo $row[0]; ?>
                </td>
            </tr>
            <tr>
                <td>Employee Name: </td>
                <td>
                    <?php echo $row[1]; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center><a href='employee.php?task=det&id=<?php echo $row[0];?>'> View Details</a></center>
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
        $sql="SELECT * FROM employee WHERE employee_id=$id";
    if($result=$mysqli->query($sql)){
        if($result->num_rows>0){
            if($row=$result->fetch_array()){
                ?>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th colspan='2' class='table-inverse'>
                        <center>Employee Details</center>
                    </th>
                </tr>
            </thead>
            <tr>
                <td>Employee ID: </td>
                <td>
                    <?php echo $row[0]; ?>
                </td>
            </tr>
            <tr>
                <td>Employee Name: </td>
                <td>
                    <?php echo $row[1]; ?>
                </td>
            </tr>
            <tr>
                <td>Mobile Number: </td>
                <td>
                    <?php echo $row[2]; ?>
                </td>
            </tr>
            <tr>
                <td>Start Date: </td>
                <td>
                    <?php echo $row[3]; ?>
                </td>
            </tr>
            <tr>
                <td>Dependent Name: </td>
                <td>
                    <?php echo $row[4]; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><a href='employee.php'>Go Back</a></td>
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