
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Josefin+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Content" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div id="pageWrapper">
        <div class="loginWrapper">
            <div class="bgLogin">
                <div class="form">
                    <div class="bodyform">
                        <h1>login</h1>
                        <form action="login.php" method="post" id="form">
                            <table>
                                <tr>
                                    <th><label>Your Email</label></th>
                                    <td>
                                        <input type="text" name="email" id="email" class="inputname" placeholder="yourmail@mail.com">
                                        <span class="error_ms" id="error_ms"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label>Your Password</label></th>
                                    <td>
                                        <input type="password" name="pwd" id="pwd" class="inputpass" placeholder="eg.abc12345">
                                        <span class="error_ms" id="error_ms">Error Email</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="checkbox" class="check">
                                        <span class="checktext">Keep me Login</span>
                                    </th>
                                </tr>

                            </table>
                            <div class="btnlogin">
                                <input type="submit" id="login" class="btnlog" value="LOGIN" name="login">
                                <p class="signin"><a href="#">Create new account</a></p>
                            </div>
                        </form>
                        <script type="text/javascript">
                            <!--validate form-->
                            function validateEmail(Email){
                                var re = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                                return re.test(Email);
                            }
                            $(function () {
                                $('#email').on('blur',function () {
                                    var email = $('#email').val();
                                    if(email !=''){
                                        if(validateEmail(email)){
                                            $('#error_ms').html('');

                                        }else{
                                            $('#error_ms').html('invalid');
                                            $('#error_ms').show();
                                        }
                                    }else{
                                        $('#error_ms').html('nothing');
                                        $('#error_ms').show();
                                    }
                                });
                                $('#pwd').on('blur',function(){
                                    $(this).next('#error_ms').show(); //use for the same class *require
                                });
                            })
//                            login submit button


                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
