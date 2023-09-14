<div class="users-lists">
    <div class="users-list-container">
        <div class="index-text-container">
            <h1 id="index-text" class="index-text">View pages</h1>
        </div>

        <?php
        if (isset($data['access']) && in_array("addPages", $data['access'])) {
            echo '<div class="container-add-user">';
            echo '<a href="/Pages/create">Add page</a></li>';
            echo '</div>';
        }
        ?>


        <table class="table">
            <tbody class="tbody">
                <tr class="tr">
                    <th class="th">Id</th>
                    <th class="th">name</th>
                    <?php
                    if (isset($data['access']) && in_array("readPages", $data['access'])) {
                        echo '<th class="th"></th>';
                    }
                    ?>
                    <?php
                    if (isset($data['access']) && in_array("editPages", $data['access'])) {
                        echo '<th class="th"></th>';
                    }
                    ?>
                    <?php
                    if (isset($data['access']) && in_array("deletePages", $data['access'])) {
                        echo '<th class="th"></th>';
                    }
                    ?>
                </tr>

                <?php
                if (empty($this->pages)) {
                    echo '<p>No data available</p>';
                } else {
                    foreach ($this->pages as $key => $value) {
                        echo '<tr class="tr">';
                        echo '<td class="td">' . $value->id . '</td>';
                        echo '<td class="td">' . $value->name . '</td>';
                        if (isset($data['access']) && in_array("readPages", $data['access'])) {
                            echo '<td class="td"> 
                                
                                        <a href="/ViewPages/' . $value->id . '">View</a>
                                    </td>';
                        }
                        if (isset($data['access']) && in_array("editPages", $data['access'])) {
                            echo '<td class="td"> 
                                
                                        <a href="/Pages/edit/' . $value->id . '">Edit</a>
                                    </td>';
                        }
                        if (isset($data['access']) && in_array("deletePages", $data['access'])) {
                            echo '<td class="td"> 
                                <a href="/Pages/delete/' . $value->id . '">Delete</a>
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