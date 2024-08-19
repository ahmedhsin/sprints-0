<form method="post" enctype="multipart/form-data"> <!-- action="home.php" -->
        <div class="form-group">
            <label for="username">Username</label>
            <input name="username" type="text" class="form-control" value="<?php if(isset($_POST['username'])) echo $username ?>">
            <?php
            if(isset($username_error)){
            ?>
            <p class="alert alert-danger">
                <?php echo $username_error; ?>
            </p>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="text" class="form-control" value="<?php if(isset($_POST['email'])) echo $email ?>">
            <?php
            if(isset($email_error)){
            ?>
            <p class="alert alert-danger">
                <?php echo $email_error; ?>
            </p>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="skill">skill</label>
            <input name="skill" type="text" class="form-control" value="<?php if(isset($_POST['skill'])) echo $skill ?>">
            <?php
            if(isset($skill_error)){
            ?>
            <p class="alert alert-danger">
                <?php echo $skill_error; ?>
            </p>
            <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input name="image" type="file" class="form-control" value="<?php if(isset($_POST['image'])) echo $image ?>">
            <?php
            if(isset($image_error)){
            ?>
            <p class="alert alert-danger">
                <?php echo $image_error; ?>
            </p>
            <?php
            }
            ?>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Send</button>
        </div>
    </form>