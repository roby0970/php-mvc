

<h1 id="index-text">Users list </h1>
<a href="./CreateUsers">Add user</a></li>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>email</th>
            <th>username</th>
            <th>role</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (empty($this->users)) {
            echo '<p>No data available</p>';       
           } else {
            foreach($this->users as $key => $value) {
                echo '<tr>';
                echo '<th>'. $value->id .'</th>';
                echo '<th>'. $value->email .'</th>';
                echo '<th>'. $value->username .'</th>';
                echo '<th>'. $value->roleName .'</th>';
                echo '<th> 
                            <a href="./EditUsers/'.$value->id.'">Edit</a>
                        </th>';
                    echo '<th> 
                            <a href="./DeleteUsers/'.$value->id.'">Delete</a>
                        </th>';
                echo '</tr>';
            }
           }
        
        ?>
    </tbody>

</table>