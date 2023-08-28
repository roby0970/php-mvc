<style>
body{ 
            margin: 0px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif !important; 
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

.overflow{
    overflow-x: auto;
}

.table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    overflow-x: auto;
    .tbody {

        .td, .th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        .tr:nth-child(even){background-color: #f2f2f2;}
        
        .tr:hover {background-color: #ddd;}
        
        .th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            
        }
    }
    
    
}

.header{
    top: 0px;
    background-color: #04AA6D;
    color: white;
    min-width: 100%;
    height: 70px;

    .top-nav {
        padding: 15px;
    }

    .top-nav-list {
        display: flex; 
        flex-direction: row;
        /* justify-content: space-between; */
        align-items:center;

        .navigation-list {
            display: flex;
            flex-direction:row;
            justify-content: space-around;
            width: 100%;
            /* gap: 200px; */
        }

        /* s */
    }
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

button[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-family: Arial, Helvetica, sans-serif !important; 
}
a.btn:hover {
  background-color: #45a049;
}

a.btn {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-family: Arial, Helvetica, sans-serif !important; 
}
button[type=submit].secondary {
  width: 100%;
  background-color: white;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: 2px solid black;
  border-radius: 4px;
  cursor: pointer;
  font-family: Arial, Helvetica, sans-serif !important; 
}

a.cancel-btn {
    width: 100%;
    background-color: white;
    color: black;
    padding: 14px 20px;
    text-align: center;
    margin: 8px 0;
    border: 2px solid black;
    border-radius: 4px;
    cursor: pointer;
}

.link-logout, .link-login {
    color: white;
    padding: 7px 10px;
    border: 2px solid white;
    border-radius: 4px;
    cursor: pointer;
}

.content {
    flex: 1;
    padding-left: 15px;
    padding-right: 15px;
    padding-bottom: 15px;
    margin-top: 75px;

    .login-form {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        .container {
            min-width: 40%;
            /* min-height: 580px; */
            /* background-color: gray; */
            
            .form-container {
                margin-top: 50px;
                display: flex;
                flex-direction: column;
                
                gap: 40px;
                

                .login-title {
                    font-size: 2em;
                    font-weight: 800;
                    align-self: center;
                }

                

            }
        }
    }

    
    .users-lists {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;

        .users-list-container {
            width: 100%;
            /* min-height: 580px; */
            /* background-color: gray; */
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 15px;
        
            .index-text-container{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;

                .index-text {
                    font-size: 2em;
                    font-weight: 800;
                }
            }

            .container-add-user {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                
            }

        }

    }

    .delete-view {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;

        .delete-container {
            min-width: 60%;
            /* min-height: 580px; */
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 15px;

            .form-action  {
                margin-top: 30px;
                display: flex;
                flex-direction: column;
               
                gap: 10px;
                margin-left: 50px;
                margin-right: 50px;
            }
        }

    }

    .delete-container h1 {
        font-size: 2rem;
        font-weight: 700;
    }

    .edit {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;

        .edit-container {
            min-width: 60%;
            /* min-height: 580px; */
            /* background-color: gray; */
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 15px;

            .edit-title {
                    font-size: 2em;
                    font-weight: 800;
                    align-self: center;
            }

            .edit-form {
                margin-top: 50px;
                display: flex;
                flex-direction: column;
               
                gap: 30px;
                margin-left: 50px;
                margin-right: 50px;
            }
        }
    }
}

.user-actions { 
    display: flex;
    flex-direction: row;
    gap: 10px;
    justify-content: space-around;
}

.form-action {
    display: flex;
    flex-direction: column;
    gap: 5px;
}



.btn--primary {
    background-color: red;
}



.footer {

    background-color: #04AA6D;
    padding: 15px;
    height: 55px;
    color: white;
    margin-bottom: 0px;
}
</style>