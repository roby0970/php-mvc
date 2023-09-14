<div class="users-lists">
    <div class="users-list-container">
        <div class="index-text-container">
            <h1 id="index-text" class="index-text">View roles</h1>
        </div>

        <?php
        if (isset($data['access']) && in_array("addRoles", $data['access'])) {
            echo '<div class="container-add-user">';
            echo '<a href="/Roles/create">Add role</a></li>';
            echo '</div>';
        }
        ?>


        <table class="table">
            <tbody class="tbody">
                <tr class="tr">
                    <th class="th">Id</th>
                    <th class="th">name</th>
                    <?php
                    if (isset($data['access']) && in_array("editRoles", $data['access'])) {
                        echo '<th class="th"></th>';
                    }
                    ?>
                    <?php
                    if (isset($data['access']) && in_array("deleteRoles", $data['access'])) {
                        echo '<th class="th"></th>';
                    }
                    ?>
                </tr>

                <?php
                if (empty($this->roles)) {
                    echo '<p>No data available</p>';
                } else {
                    foreach ($this->roles as $key => $value) {
                        echo '<tr class="tr">';
                        echo '<td class="td">' . $value->id . '</td>';
                        echo '<td class="td">' . $value->name . '</td>';
                        if (isset($data['access']) && in_array("editRoles", $data['access'])) {
                            echo '<td class="td"> 
                                
                                        <a href="/Roles/edit/' . $value->id . '">Edit</a>
                                    </td>';
                        }
                        if (isset($data['access']) && in_array("deleteRoles", $data['access'])) {
                            echo '<td class="td"> 
                                <a href="/Roles/delete/' . $value->id . '">Delete</a>
                            </td>';
                        }

                        echo '</tr>';
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>