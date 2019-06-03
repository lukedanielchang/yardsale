<html>
    <head>
        <title>Yard Sale</title>
        <script src="main.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php require_once 'process.php'; ?>
        
            <?php
            $mysqli = new mysqli('localhost', 'root', 'ghi96djdHRM4OXgS', 'yardsale')
                    or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM items");
            //while to fetch
            ?>
        
        <h1>Welcome to the Yard Sale</h1>
        <div class="container">
            <div class="columns left" id="datarow">
                <table class="table">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">Name</th>
                            <th>Description</th>
                            <th onclick="sortTable(1)">Price</th>
                        </tr>
                    </thead>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                                <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <td>
                                <a href="index.php?delete=<?php echo $row['id']; ?>"
                                   >Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <?php
            pre_r($result->fetch_assoc());

            function pre_r($array) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
            ?>

            <div class="columns right" id="inputform">
                <p>Add New</p>
                <form action="process.php" method="POST" id="formI">
                    <input type="hidden" name ="id" value="<?php echo $id ?>"></input>
                    <div><label>name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" id="name" placeholder="name">
                    </div>
                    <div>
                         <label>description</label>
                        <input type="text" name="description" value="<?php echo $description; ?>" placeholder="description">
                    </div>
                    <div>
                         <label>price</label>
                        <input type="text" name="price" value="<?php echo $price; ?>" placeholder="price">
                    </div>
                    <?php
                    if ($update == true):
                        ?>
                        <button type="submit" name="update" onclick="validate()">Update</button>
                    <?php else: ?>
                        <button type="submit" name="save" onclick="validate()">Update</button>
                    <?php endif ?>
                    <div>
                        <button type="submit" name="save" onclick="validate()">Enter</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <footer>
        <p>Thanks for Coming By</p>
    </footer>
</html
