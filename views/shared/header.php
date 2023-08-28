<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Seminar CMS" />

    <!-- <link rel="stylesheet" href="/assets/styles.css" type="text/css" media="screen"> -->

    <title>CMS |
        <?php echo $data['viewName']; ?>
    </title>
    <?php include 'assets/styles.php'; ?>

</head>

<body>

   

    <header class="header" id="header">
    <div class="top-nav" >
            <div class="top-nav-list">
                <?php
                if (isset($_SESSION['username']))
                {
                    echo '<p class="username-tag">Welcome, <b>' . $_SESSION['username'] , "</b></p>";
                }
                echo '<ul class="navigation-list">';
                echo '<div class="link-navigation"><a href="/Home">Home</a></div>';
                if (isset($_SESSION['username']))
                {    
                    echo '<div class="link-navigation"><a href="/Users">Users</a></div>';
                    echo '<div class="link-navigation"><a href="/Roles">Roles</a></div>';
                    echo '</ul>';
                    echo '<div class="link-logout"><a href="/Login/logoutUser">Logout</a></div>';
                }
                else
                {
                    echo '</ul>';
                    echo '<div class="link-login"><a href="/Login">Login</a></div>';
                }
                ?>

            </div>
        </div>
    </header>
    <div class="content">