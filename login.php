<?php  
    include 'process.php';
    if(isset($_POST["SubmitButton"]))
    {
        $my_username = $_POST['username']; 
        $my_password = $_POST['password'];
        check_login($my_username, $my_password);
    }
?>

<form action="" method="post">
<fieldset>
    <table>
        <tbody>
            <tr>
                <td>Username</td>
                <td> <input size="25" type="text" name="username" placeholder="Nhập tên tài khoản"  autocomplete="off" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input size="25" type="password" name="password" placeholder="Nhập mật khẩu" required></td>
            </tr>
            <tr>
                <td> <input type="reset" value="Reset"> </td>
                <td> <input type="submit" value="Submit" name=SubmitButton> </td>
            </tr>
        </tbody>
    </table>
</fieldset>
