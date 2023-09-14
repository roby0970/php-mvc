<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Seminar CMS" />

    <!-- <link rel="stylesheet" href="/assets/styles.css" type="text/css" media="screen"> -->
    <?php
    include dirname(__FILE__)."/../../controllers/Menus.php";
    ?>
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
                    if (isset($_SESSION['permission'])) 
                    {
                        if(in_array("readUsers", array_map('mapToName', $_SESSION['permission']))) {
                            echo '<div class="link-navigation"><a href="/Users">Users</a></div>';
                        }
			
			            if(in_array("readRoles", array_map('mapToName', $_SESSION['permission']))) {
                            echo '<div class="link-navigation"><a href="/Roles">Roles</a></div>';
                        }
			
                        if(in_array("readPages", array_map('mapToName', $_SESSION['permission']))) {
                            echo '<div class="link-navigation"><a href="/Pages">Pages</a></div>';
                        }

                        echo '<div class="link-navigation"><a href="/Navigations">Navigations</a></div>';
                    }   
                    

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
    <?php
    if (isset($_SESSION['username']))
    {  
        echo '<div class="navigation" style="display: block">';
    }
    else
    {
        echo '<div class="navigation" style="display: none">';
    }

    ?>
        <h2>Navigation</h2>
        <ul>
            <?php
                
                $menus = new Menus();
                $menus_items = $menus->getMenus();
                if (empty($menus_items)) {

                } else {
                    foreach ($menus_items as $m) {
                        echo '<li><a href="'.$m->path.'">'.$m->name.'</a></li>';
                     }
                }
                 
            ?> 
        </ul>
    </div>
    <div class="content">