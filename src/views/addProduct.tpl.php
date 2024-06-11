<?php include 'partials/header.tpl.php'; ?>
<main>
    <h1>Añadir producto</h1>
    <div class="navig">
        <a href="home">Home</a>
        <a href="store">Go Back</a>
    </div>
    <div class="container">
        <form class="form-mod" action="addProductAction" method="POST">
            <div class="form-row">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-row">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div class="form-row">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" required>
            </div>
            <div class="form-row">
                <label for="stock_quantity">Quantity</label>
                <input type="number" name="stock_quantity" id="stock_quantity" required>
            </div>
            <div class="form-row">
                <button type="submit">Añadir Producto</button>
            </div>
        </form>
    </div>
</main>
<?php include 'partials/footer.tpl.php'; ?>
