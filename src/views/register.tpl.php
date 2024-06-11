<?php include 'partials/header.tpl.php'; ?>
<main>
    <h1>Home</h1>
    <div class="navig">
        <a href="home">Home</a>
    </div>
    <div class="container">
        <form class="form-mod" action="registerAction" method="POST">
            <div class="form-row">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-row">
                <label for="last_name">Last Name</label>
                <input type="text" name="lastname" id="lastname">
            </div>
            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-row">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-row">
                <button type="submit">Sign in</button>
            </div>
        </form>

</main>
<?php include 'partials/footer.tpl.php'; ?>