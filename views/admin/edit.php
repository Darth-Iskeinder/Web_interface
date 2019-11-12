<?php include(ROOT.('/views/layouts/header.php')) ?>

<h2>Edit a user</h2>

<form method="post">
    
    <?php foreach ($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo $value; ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
        <br>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

button><a href='/users/page-1'> Back to Admin Panel</a></button>
