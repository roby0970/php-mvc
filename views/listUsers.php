

<h1 id="index-text">Users list </h1>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>email</th>
            <th>username</th>
            <th>role</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($this->users as $key => $value) {
            echo '<tr>';
            echo '<th>'. $key + 1 .'</th>';
            echo '<th>'. $value->email .'</th>';
            echo '<th>'. $value->username .'</th>';
            echo '<th>'. $value->roleName .'</th>';
            echo '</tr>';
        }
        ?>
    </tbody>

</table>