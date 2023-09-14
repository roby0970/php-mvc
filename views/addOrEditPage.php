<div class="edit">
    <div class="edit-container">
        <h1 class="edit-title" id="index-text"><?php echo $data['viewName']?></h1>

        <form action="/Pages/<?php echo $data['action']?>" method="POST" class="edit-form">
        <input type="hidden" name="action" id="action" value="<?php echo $data['action']?>">

            <input type="hidden" name="pageId" value="<?php if (isset($data['pageId'])) { echo $data['pageId']; } ?>">
            <div class="input-container">
                <label for="formName">Page name: </label>
                <input type="text" name="formName" value="<?php if (isset($data['pageName'])) { echo $data['pageName']; } ?>"/>

                <label for="formName">Page content: </label>
                <input type="text" name="formContent" value="<?php if (isset($data['pageContent'])) { echo $data['pageContent']; } ?>"/>

                <label for="formName">Image location: </label>
                <input type="text" name="imageLocation" value="<?php if (isset($data['imageLocation'])) { echo $data['imageLocation']; } ?>"/>
            </div>
            <fieldset>
                <legend>Choose roles that can access this page:</legend>
            
            <?php foreach ($data['rolesList'] as $role) {
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
                <a class="cancel-btn" href="/Pages">Cancel<a>
            </div>
        </form>
    </div>
</div>