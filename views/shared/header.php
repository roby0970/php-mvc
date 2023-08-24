<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Seminar CMS" />

    <title>CMS |
        <?php echo $data['viewName']; ?>
    </title>
    <style>

    </style>

</head>

<body>


    <header id="header">
    <div class="top-nav" >
            <ul class="top-nav-list">
                <?php
                if (isset($_SESSION['username']))
                {
                    echo 'Welcome, ' . $_SESSION['username'];
                }
                ?>
                    </a></li>
                <?php
                if (isset($_SESSION['username']))
                {   
                    echo '<li><a href="./Users">Users</a></li>';
                    echo '<li><a href="./Roles">Roles</a></li>';
                    echo '<li><a href="./Login/logoutUser">Logout</a></li>';
                }
                else
                {
                    echo '<li><a href="./Login">Login</a></li>';
                }
                ?>

            </ul>
        </div>
    </header>