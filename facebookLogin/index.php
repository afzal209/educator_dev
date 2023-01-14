<?php 
session_start();
if (!isset($_SESSION['access_token'])) {
    header("location:login.php");
}
?>
<div>
    <img src="<?php echo $_SESSION['userData']['picture']['url']?>" alt="">
</div>

<table>
    <td>
        <tr>First Name</tr>
        <tr><?php echo $_SESSION['userData']['first_name'] ?></tr>       
    </td>
    <td>
        <tr>Last Name</tr>
        <tr><?php echo $_SESSION['userData']['last_name'] ?></tr>       
    </td>
    <td>
        <tr>email</tr>
        <tr><?php echo $_SESSION['userData']['email'] ?></tr>       
    </td>
    
</table>