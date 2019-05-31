<html>
    <head>
        <title>Yard Sale</title>
        <script src="bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php require_once 'process.php'; ?>
        <div class="container">
        <?php
        $mysqli = new mysqli('localhost', 'root', 'ghi96djdHRM4OXgS', 'yardsale')
        or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM items");
        //while to fetch
        ?>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                          <a href="index.php?edit=<?php echo $row['id'];?>"> Edit</a>
                    </td>
                    <td>
                          <a href="index.php?delete=<?php echo $row['id'];?>"
                        > Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <?php
    pre_r($result->fetch_assoc());

    function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    }
    ?>

    <div class="form-rows">
        <p>Add New</p>
        <form action="process.php" method="POST">
        <input type="hidden" name ="id" value="<?php echo $id ?>"></input>
        <div class="form-group"
                 accesskey=""<label>name</label>
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="name">
            </div>
            <div class="form-group"
                 <label>description</label>
                <input type="text" name="description" value="<?php echo $description; ?>" placeholder="description">
            </div>
            <div class="form-group"
                 <label>price</label>
                <input type="text" name="price" value="<?php echo $price; ?>" placeholder="price">
            </div>
            <?php 
            if($update==true):
            ?>
            <button type="submit" name="update">Update</button>
<?php else: ?>
<button type="submit" name="update">Update</button>
    <?php endif; ?>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="save">Enter</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html