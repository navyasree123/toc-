<?php
require('usr_funcs.php');
require 'config.php';
session_start();
?>
    <?php
    do_header("Bank Management");
do_index_menu();
        if(!valid_user() && !valid_user_account_number()){
                if(!isset($_POST['submit'])){
                ?>
        <div class='container' style='margin-top:50px;'>
            <form class="form-signin" method='post'>
                <h2 class="form-signin-heading">Please sign in</h2>
                <div class="form-group">
                    <label for="formGroupExampleInput">User ID</label>
                    <input name='username' type="text" class="form-control" id="formGroupExampleInput" placeholder="Username"> </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Password</label>
                    <input name='password' type="password" class="form-control" id="formGroupExampleInput" placeholder="password"> </div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="cus_emp" id="gridRadios1" value="customer" checked> Customer </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="cus_emp" id="gridRadios2" value="employee"> Employee </label>
                    </div>
                </div>
                <button name='submit' class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
        <?php
                }else{
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        $cus_emp=$_POST['cus_emp'];
                        if(trim($username)=='' || trim($password)==''|| empty($username) || empty($password)){
                            throw new Exception("Please Enter the Form");
                        }
                        if($cus_emp=='customer'){
                            $sql="select username,account_number from user_accounts where username='".$username."' and password='".$password."'";
                        }else{
                            $sql="select employee_id,telephone_number from employee where employee_id='".$username."' and telephone_number=".$password;
                        }
                        if($result=$mysqli->query($sql)){
                            if($result->num_rows >0){
                               if($row=$result->fetch_array()){
                                   $_SESSION['valid_user']=$row[0];
                                   $_SESSION['valid_user_account_number']=$row[1];
                                   $_SESSION['logged_in']=1;
                                   $_SESSION['user_type']=$cus_emp;
                                   header("Location:main.php");
                               }else{
                                   throw new Exception("Something went wrong. Can't fetch Array.");
                               }
                        }else{
                            throw new Exception(" User Not Found.");
                        }
                    }else{
                            throw new Exception("some error");
                        }
                }
        }else{
            header("Location: main.php");
        }
do_footer();
        ?>