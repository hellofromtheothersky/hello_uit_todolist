<script src="//code.jquery.com/jquery.js"></script>
<script> 
    $(document).ready(function()
    {
        $(document).on('click', '#summitbutton', function()
        {
            my_username=document.getElementById("username").value
            my_password=document.getElementById("password").value
            $.post("login_process.php",
            {
                login:1, my_username:my_username, my_password:my_password
            },
            function(data,status){
                if(status=="success")
                {
                    $(".thongbao").html(data);
                }
            }); 
        });
        $(document).on('click', '#resetbutton', function()
        {
            $(".thongbao").html("");
        });
    });   
</script>

<fieldset>
    <table>
        <tbody>
            <form method="post">
                <tr>
                    <td>Username</td>
                    <td> <input size="25" id='username' type="text" name="username" placeholder="Nhập tên tài khoản"  autocomplete="off" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td> <input size="25" id='password' type="password" name="password" placeholder="Nhập mật khẩu" required></td>
                </tr>
                <tr>
                    <td> <input type="reset" id=resetbutton value="Reset"> </td>
            </form>
                <td> <input type="submit" id=summitbutton value="Submit" name=SubmitButton> </td>
            </tr>
        </tbody>
    </table>
</fieldset>
<h2 class=thongbao></h2>
