<?php include(ROOT.('/views/layouts/header.php')) ?>
<section>
    <div class="container">
        <div class="row">
            
                
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul> 
                        <?php endif; ?>

                        <div class="add-form">
                            <h2>Add user</h2>
                            <form action="#" method="post">
                                <input type="login" name="login" placeholder="Login" value="<?php echo $login; ?>"/>
                                <input type="password" name="password" placeholder="password" value="<?php echo $password; ?>"/>
                                <input type="f_name" name="f_name" placeholder="First name" value="<?php echo $f_name; ?>"/>
                                <input type="l_name" name="l_name" placeholder="Last name" value="<?php echo $l_name; ?>"/>
                                <input type="gender" name="gender" placeholder="gender" value="<?php echo $gender; ?>"/> 
                                <input type="date_of_birth" name="date_of_birth" placeholder="Date of birth" value="<?php echo $date_of_birth; ?>"/>
                                <input type="submit" name="submit" class="btn btn-default" value="Add new user"/>
                            </form>
                        </div>
                        
            <button><a href='/users/page-1'> Back to Admin Panel</a></button>
                
                <br>
                
            
        </div>
    </div>
</section>

