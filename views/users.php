
<div class="users-lists">
    <div class="users-list-container">
        <div class="index-text-container">
            <h1 id="index-text" class="index-text">Users list </h1>
        </div>
        <div class="container-add-user">
            <a href="./CreateUsers" class="add-user-text">Add user</a></li>
        </div>
        <div class="overflow">
            <table class="table">
                <tbody class="tbody">
                <tr class="tr">
                    <th class="th">Id</th>
                    <th class="th">email</th>
                    <th class="th">username</th>
                    <th class="th">role</th>
                    <th class="th"></th>
                    <th class="th"></th>
                </tr>
                
                <?php 
                if (empty($this->users)) {
                    echo '<p>No data available</p>';       
                } else {
                    foreach($this->users as $key => $value) {
                        echo '<tr class="tr">';
                        echo '<td class="td">'. $value->id .'</td>';
                        echo '<td class="td">'. $value->email .'</td>';
                        echo '<td class="td">'. $value->username .'</td>';
                        echo '<td class="td">'. $value->roleName .'</td>';
                        echo '<td class="td"> 
                                    <a href="./EditUsers/'.$value->id.'">Edit</a>
                                </td>';
                            echo '<td class="td"> 
                                    <a href="./DeleteUsers/'.$value->id.'">Delete</a>
                                </td>';
                        echo '</tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>