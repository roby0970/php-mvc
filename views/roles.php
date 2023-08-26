
<div class="users-lists">
    <div class="users-list-container">
        <div class="index-text-container">
            <h1 id="index-text" class="index-text"><?php echo $data['rolesAction']?> Roles</h1>
        </div>
        <div class="container-add-user">
            <a href="./CreateRoles">Add role</a></li>
        </div>

        <table class="table">
            <tbody class="tbody">
                <tr class="tr">
                    <th class="th">Id</th>
                    <th class="th">name</th>
                    <th class="th"></th>
                    <th class="th"></th>
                </tr>

                <?php 
                if (empty($this->roles)) {
                    echo '<p>No data available</p>';       
                }
            
                else {
                    foreach($this->roles as $key => $value) {
                        echo '<tr class="tr">';
                        echo '<td class="td">'. $value->id .'</td>';
                        echo '<td class="td">'. $value->name .'</td>';
                        echo '<td class="td"> 
                                
                                <a href="./EditRoles/'.$value->id.'">Edit</a>
                            </td>';
                        echo '<td class="td"> 
                                <a href="./DeleteRoles/'.$value->id.'">Delete</a>
                            </td>';
                        echo '</tr>';
                    }
                }
                
                ?>
            </tbody>
        </table>
            </div>
            </div>
