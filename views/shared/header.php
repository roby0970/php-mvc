<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Seminar CMS" />

    <!-- <link rel="stylesheet" href="styles.php" type="text/css" media="screen"> -->

    <title>CMS |
        <?php echo $data['viewName']; ?>
    </title>

    <style>
        body{ 
            margin: 0px;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        li {
            all: unset;
        }
        ul {
            all: unset;
        }
        a {
            all:unset;
            cursor: pointer;
        }
        p {
            all:unset;
        }
        h1 {
            all: unset;
        }

.header {
    position:fixed;
}

.header{
    top: 0px;
    background-color: green;
    min-width: 100%;
    height: 55px;

    .top-nav {
        padding: 15px;
    }

    .top-nav-list {
        display: flex; 
        flex-direction: row;
        gap: 20px;
        justify-content: space-between;

        .navigation-list {
            display: flex;
            flex-direction:row;
            gap: 200px;
        }

        /* s */
    }
}

.content {
    flex: 1;
    padding-left: 15px;
    padding-right: 15px;
    margin-top: 75px;

    .login-form {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        .container {
            min-width: 580px;
            min-height: 580px;
            background-color: gray;
            
            .form-container {
                margin-top: 50px;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 50px;
                margin-left: 50px;
                margin-right: 50px;

                .login-title {
                    font-size: 2em;
                    font-weight: 800;
                    align-self: center;
                }

                .input-container {
                    display: flex;
                    flex-direction: column;
                }

            }
        }
    }
}

.btn--primary {
   
        background-color: red;
    
}



.footer {

    background-color: green;
    padding: 15px;
    height: 55px;

    margin-bottom: 0px;
}
</style>

</head>

<body>

   

    <header class="header" id="header">
    <div class="top-nav" >
            <div class="top-nav-list">
                <?php
                if (isset($_SESSION['username']))
                {
                    echo '<p class="username-tag">Welcome, ' . $_SESSION['username'] , "</p>";
                }
                ?>
                    </a>
                <?php
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