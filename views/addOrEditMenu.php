<div class="edit">
    <div class="edit-container">
        <h1 class="edit-title" id="index-text"><?php echo $data['viewName']?></h1>

        <form action="/Navigations/<?php echo $data['action']?>" method="POST" class="edit-form">
            <input type="hidden" name="action" id="action" value="<?php echo $data['action']?>">

            <input type="hidden" name="pageId" value="<?php if (isset($data['pageId'])) { echo $data['pageId']; } ?>">
            <fieldset>
                <legend>Choose menus to show in navigation bar:</legend>
            
            <?php foreach ($data['menusList'] as $role) {
                if (isset($data['selectedrolesList'])) {
                    $isChecked = in_array($role, $data['selectedrolesList']);
                    if ($isChecked) {
                        echo "<input CHECKED type='checkbox' id=".$role->id." name=".$role->id." />";
                    } else {
                        echo "<input type='checkbox' id=".$role->id." name=".$role->id." />";
                    }
                } else {
                    echo "<input type='checkbox' id=".$role->id." name=".$role->id." />";
                }
                
                
                echo "<label for=".$role->id."> ".$role->name." </label>";
                echo '</br>';
            }
            ?>
            </fieldset>
            <div class="user-actions">
                <button type="submit" name="submit">Submit</button>
                <a class="cancel-btn" href="/Navigations">Cancel<a>
            </div>
        </form>
    </div>
</div>