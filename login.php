
<?php


?>




<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <style type="text/css">
        body {
            background-image: url("day8back.jpg");
            background-size: 100%
        }
        .container {
            display: flex;
            align-content: center;
            justify-content: center;
            margin-top: 20vh;
        }

        .form {
            display: flex;
            align-content: center;
            justify-content: center;
        }

        .formControl {
            padding: 16px;
            margin: 4px;
            height: 2vh;
            width: 30vw;
        }

        .text {
            font-family: "Arial Black", Gadget, sans-serif;
            font-size: 1.2vw;
            font-feature-settings: normal;
            margin-left: 2vw;
            color: white;
        }

        button {
            font-family: "Arial Black", Gadget, sans-serif;
            background-color: lightgray;
            border: none;
            font-feature-settings: normal;
            align-self: center;
            margin: 8px;
            width: 29.5vw;
            height: 5vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form">
            <form class="formSignin" method="POST">
                <h2 class="text">Welcome to Awesome Battleship Battle</h2>
                <input type="text" name="username" class="formControl" placeholder="Username" required><br/>
                <button class="btn btn-lg btn-primary btn-block" type="submit" >New game</button>
            </form>
        </div>
    </div>
</body>
</html>