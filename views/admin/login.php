<?php include(ROOT.('/views/layouts/header.php')) ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                        
                </ul>
                <?php endif; ?>
                <div class="signup-form">
                    <h2>Enter to Admin panel</h2>
                    <form action="#" method="post">
                        <input type="login" name="login" placeholder="Login">
                        <input type="password" name="password" placeholder="password">
                        <input type="submit" name="submit" class="btn btn-default">
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</section>

