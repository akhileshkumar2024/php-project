<select class="form-control" name="category"id ="category">
    //<option value="">select a category</option>
    <?php
    include("./common/db.php");
    $query="select * from category";
    $result = $conn->query($query);
    foreach($result as $row){
        $name = ucFirst($row['name']);
          $id = $row['id'];
        echo "<option value=$id>$name</option>";

    }
    ?>
</select>
