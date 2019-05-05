<?php
require('usr_funcs.php');
require 'config.php';
session_start();
?>
    <?php
    do_header("Bank Management");
do_index_menu();
        if(!valid_user() && !valid_user_account_number()){
                if(!isset($_POST['Rsubmit'])){
					register_form();
                }else{
                        try{
                            $username=$_POST['username'];
                            $pass1=$_POST['pass1'];
                            $pass2=$_POST['pass2'];
                            $account_number=(int)$_POST['account_number'];
                            if(empty($account_number) || trim($account_number) =='' || empty($username) || empty($pass1) || empty($pass2) || trim($username) =='' || trim($pass1)=='' || trim($pass2) ==''){
                                throw new Exception("Please Enter the form Correctly");
                            }
                            if($pass1!=$pass2){
                                throw new Exception("The Passwords Doesn't Match");
                            }
                            if(username_check($username)){
                                throw new Exception("The Username is Already Taken\n Please Choose a different name");
                            }
                            $sql="INSERT INTO user_accounts(username,password,account_number) values ('".$username."','".$pass."',".$account_number.")";
                            if($mysqli->query($sql)){
                                    echo "You have been registered.Please ";
                                    echo "<a href='index.php'>Login </a>";

                            }else{
                                throw new Exception("Can't Execute the Query");
                            }
                        } catch (Exception $ex) {
                            do_exp_content($ex->getMessage());
                        }
                    }
        }else{
            header("Location: main.php");
        }
do_footer();
        ?>