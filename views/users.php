<div class="users-lists">
    <div class="users-list-container">
        <div class="index-text-container">
            <h1 id="index-text" class="index-text">View users</h1>
        </div>
        <?php
        if (isset($data['access']) && in_array("addUsers", $data['access'])) {
            echo
                '
                    <div class="container-add-user">
                        <a href="/Users/create" class="add-user-text">Add user</a></li>
                    </div>
                ';
        }
        ?>

        <div class="overflow">
            <table class="table">
                <tbody class="tbody">
                    <tr class="tr">
                        <th class="th">Id</th>
                        <th class="th">email</th>
                        <th class="th">username</th>
                        <th class="th">role</th>
                        <?php
                        if (isset($data['access']) && in_array("editUsers", $data['access'])) {
                            echo '<th class="th"></th>';
                        }
                        ?>
                        <?php
                        if (isset($data['access']) && in_array("deleteUsers", $data['access'])) {
                            echo '<th class="th"></th>';
                        }
                        ?>
                    </tr>

                    <?php
                    if (empty($this->users)) {
                        echo '<p>No data available</p>';
                    } else {
                        foreach ($this->users as $key => $value) {
                            echo '<tr class="tr">';
                            echo '<td class="td">' . $value->id . '</td>';
                            echo '<td class="td">' . $value->email . '</td>';
                            echo '<td class="td">' . $value->username . '</td>';
                            echo '<td class="td">' . $value->roleName . '</td>';
                            if (isset($data['access']) && in_array("editUsers", $data['access'])) {
                                echo
                                    '<td class="td"> 
                                <a href="Users/edit/' . $value->id . '">Edit</a>
                            </td>';
                            }
                            if (isset($data['access']) && in_array("deleteUsers", $data['access'])) {
                                echo '<td class="td"> 
                                <a href="Users/delete/' . $value->id . '">Delete</a>
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
</div>