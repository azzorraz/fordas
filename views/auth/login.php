
<h2>Login</h2>
<?php if(isset($error)): ?>

<p style="color:red;">
    <?= $error ?>
</p>

<?php endif; ?>
<form method="post">

    <p>
        Username<br>
        <input type="text" name="username">
    </p>

    <p>
        Password<br>
        <input type="password" name="password">
    </p>

    <button type="submit">
        Login
    </button>

</form>