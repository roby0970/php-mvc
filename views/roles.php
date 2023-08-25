

<h1 id="index-text"><?php echo $data['rolesAction']?> Roles</h1>
<a href="./CreateRoles">Add role</a></li>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>name</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($this->roles as $key => $value) {
            echo '<tr>';
            echo '<th>'. $key .'</th>';
            echo '<th>'. $value->name .'</th>';
            echo '<th> 
                    
                    <a href="./EditRoles/'.$value->id.'">Edit</a>
                </th>';
            echo '<th> 
                    <a href="./DeleteRoles/'.$value->id.'">Delete</a>
                </th>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>