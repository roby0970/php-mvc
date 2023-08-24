

<h1 id="index-text">Roles list </h1>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>name</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($this->roles as $key => $value) {
            echo '<tr>';
            echo '<th>'. $key .'</th>';
            echo '<th>'. $value->name .'</th>';
            echo '</tr>';
        }
        ?>
    </tbody>

</table>