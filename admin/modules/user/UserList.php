<?php
    require_once (__DIR__ ."/../../../lib/dao/UserDao.php");
    $userDao=new UserDao();
    $userList=$userDao->getAllUser();
    $limit=5;
    $pageTotal=ceil(count($userList)/$limit);

    function show($userList/*,$start,$end*/){
        $html="<tr><th>ID</th><th>Tài Khoản</th><th> Mật khẩu</th><th> Họ tên</th><th>Số điện thoại</th><th> Email</th><th>Vai trò</th><th colspan='2'>Hành động</th></tr>";
        foreach ($userList as $user) {
                $html  .= "<tr>";
                 $html .= "<td>" . $user['id'] . "</td>" .
                "<td>" . $user['username'] . "</td>" .
                "<td>" . $user['password'] . "</td>" .
                "<td>" . $user['name'] . "</td>" .
                "<td>" . $user['phone'] . "</td>" .
                "<td>" . $user['email'] . "</td>" .
                "<td>" . $user['role'] . "</td>" .
                "<td><button class='delete' id='{$user['id']}'>Xóa</button></td> <td><button class='edit' id='{$user['id']}'>Sửa</button> </td>";
                $html .= "</tr>";
        }

        /*for ($user=$start;$user<$end;$user++) {
            $html  .= "<tr>";
            $html .= "<td>" . $userList[$user]['id'] . "</td>" .
                "<td>" . $userList[$user]['username'] . "</td>" .
                "<td>" . $userList[$user]['password'] . "</td>" .
                "<td>" . $userList[$user]['name'] . "</td>" .
                "<td>" . $userList[$user]['phone'] . "</td>" .
                "<td>" . $userList[$user]['email'] . "</td>" .
                "<td>" . $userList[$user]['role'] . "</td>" .
                "<td><button class='delete' id='{$userList[$user]['id']}'>Xóa</button></td> <td><button class='edit' id='{$userList[$user]['id']}'>Sửa</button> </td>";
            $html .= "</tr>";
        }*/

        return $html;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh Sách người dùng</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        #form-them,#form-sua{
            display: none;
            position: absolute;
            top: 250px;
            left: 600px;
        }

    </style>
</head>
<body>
    <center><input id="input_search" type="text"><button id="btn_search" >Tìm</button></center>
    <br>
    <button id="them">Thêm user</button>
    <table  id="bang">
        <tbody class="table_user_list">

        </tbody>

    </table>

    <div id="phan_trang">

    </div>

    <br/><br/>
    <div id="form-them">
        <form action="">
            <table>
                <tr>
                    <td>
                        Tài khoản
                    </td>
                    <td>
                        <input id="username"   type="text" name="username">
                    </td>
                </tr>

                <tr>
                    <td>
                        Mật khẩu
                    </td>
                    <td>
                        <input id="password"   type="text" name="password">
                    </td>
                </tr>

                <tr>
                    <td>
                        Họ tên
                    </td>
                    <td>
                        <input id="name"   type="text" name="name">
                    </td>
                </tr>

                <tr>
                    <td>
                        Số điện thoại
                    </td>
                    <td>
                        <input  id="phone"  type="text" name="phone">
                    </td>
                </tr>

                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input id="email"  type="text" name="email">
                    </td>
                </tr>

                <tr>
                    <td>
                        Vai trò
                    </td>
                    <td>
                        <input id="role" type="text" name="role">
                    </td>
                </tr>

            </table>
            <center><button class="submit-add" type="submit">Thêm</button></center>
        </form>
    </div>



    <div id="form-sua">
        <form action="">
            <table>
                <tr>
                    <td>
                        Tài khoản
                    </td>
                    <td>
                        <input id="username-sua"   type="text" name="username">
                    </td>
                </tr>

                <tr>
                    <td>
                        Mật khẩu
                    </td>
                    <td>
                        <input id="password-sua"   type="text" name="password">
                    </td>
                </tr>

                <tr>
                    <td>
                        Họ tên
                    </td>
                    <td>
                        <input id="name-sua"   type="text" name="name">
                    </td>
                </tr>

                <tr>
                    <td>
                        Số điện thoại
                    </td>
                    <td>
                        <input  id="phone-sua"  type="text" name="phone">
                    </td>
                </tr>

                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input id="email-sua"  type="text" name="email">
                    </td>
                </tr>

                <tr>
                    <td>
                        Vai trò
                    </td>
                    <td>
                        <input id="role-sua" type="text" name="role">
                    </td>
                </tr>

            </table>
            <center><button class="submit_sua" type="submit">Sửa</button></center>
        </form>
    </div>
</body>

<script>
    let id_sua=0;
    $(document).ready(function(){
        let html="<?php echo show($userList); ?>";
        $('.table_user_list').html(html);


        $(".delete").click(function(){
            var id_xoa=$(this).attr('id');
            deleteUser(id_xoa);
        });


        $("#btn_search").click(function(){
            let search=$('#input_search').val();
            console.log(search);
            searchUser(search);
        });

        $("#input_search").on("keyup", function() {
            let search=$('#input_search').val();
            console.log(search);
            searchUser(search);
        })



        $('#them').click(function () {
            $('#bang').css("opacity","0.1");

            $('#form-them').show();
        })

        $(".edit").click(function () {
            id_sua=$(this).attr('id');
            $('#bang').css("opacity","0.1");
            $('#form-sua').show();
            console.log(id_sua);
            $.ajax({
                url: "http://localhost:81/webbandienthoai/admin/modules/user/UseJsonController.php",
                contentType: "application/json; charset=utf-8",
                method: "GET",
                dataType: "json",
                data: {
                    id: id_sua,
                },
                success: function(res) {

                    $('#username-sua').val(res.username);
                    $('#password-sua').val(res.password);
                    $('#name-sua').val(res.name);
                    $('#phone-sua').val(res.phone);
                    $('#email-sua').val(res.email);
                    $('#role-sua').val(res.role);

                },
                error: function (e) {
                    alert("error");
                }
            })


        })

        $(".submit_sua").click(function () {
            editUser(id_sua);
        })
    });




    function deleteUser(id) {

        $.ajax({
            url: "http://localhost:81/webbandienthoai/admin/modules/user/UseJsonController.php",
            contentType: "application/json; charset=utf-8",
            method: "DELETE",
            dataType: "json",
            data: {
                id: id,
            },
            success: function(res) {

                alert(res.message);
                location.reload();

            },
            error: function (e) {
                alert("error");
            }
        })
    }


    $(".submit-add").on("click", function(e) {
        e.preventDefault();

            let user = {
                username: $("#username").val(),
                password: $("#password").val(),
                name: $("#name").val(),
                phone: $("#phone").val(),
                email: $("#email").val(),
                role: $("#role").val(),
            }
            $.ajax({
                async: false,
                url: "http://localhost:81/webbandienthoai/admin/modules/user/UseJsonController.php",
                method: "POST",
                data: user,
                dataType: "json",
                success: function(res) {
                    alert(res.message);
                    location.reload();
                },
                error: function (e) {
                    alert("error");
                }
            })

    })


    function editUser(id_sua){
        let user = {
            id: id_sua,
            username: $("#username-sua").val(),
            password: $("#password-sua").val(),
            name: $("#name-sua").val(),
            phone: $("#phone-sua").val(),
            email: $("#email-sua").val(),
            role: $("#role-sua").val(),
        }
        $.ajax({
            async: false,
            url: "http://localhost:81/webbandienthoai/admin/modules/user/UseJsonController.php",
            method: "UPDATE",
            data: user,
            dataType: "json",
            success: function(res) {
                alert(res.message);
                location.reload();
            },
            error: function (e) {
                alert("error");
            }
        })
    }


    function searchUser(search) {

        $.ajax({
            url: "http://localhost:81/webbandienthoai/admin/modules/user/UseJsonController.php",
            contentType: "application/json; charset=utf-8",
            method: "GET",
            dataType: "json",
            data: {
                search: search,
            },
            success: function(res) {

                let html2="<tr><th>ID</th><th>Tài Khoản</th><th> Mật khẩu</th><th> Họ tên</th><th>Số điện thoại</th><th> Email</th><th>Vai trò</th><th colspan='2'>Hành động</th></tr>";
                res.forEach(function (element) {
                    html2 += "<tr>";
                    html2 += "<td>"  + element.id  + "</td>"  +
                    "<td>"  + element.username  + "</td>"  +
                    "<td>"  + element.password  + "</td>"  +
                    "<td>"  + element.name  + "</td>"  +
                    "<td>"  + element.phone  + "</td>"  +
                    "<td>"  + element.email  + "</td>"  +
                    "<td>"  + element.role  + "</td>"  +
                    "<td><button class='delete' id='{$user['id']}'>Xóa</button></td> <td><button class='edit' id='{$user['id']}'>Sửa</button> </td>";
                    html2 += "</tr>";
                })


                $('.table_user_list').html(html2);

            },
            error: function (e) {
                alert("error");
            }
        })
    }
</script>





</html>