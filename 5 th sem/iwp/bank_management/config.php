<?php
if($mysqli=mysqli_connect("localhost","root","123456789","bank_management")){
    return true;
}else{
    return false;
}
?>