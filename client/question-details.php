<div class="container">
    <h1 class ="heading">Question</h1>
    <div class="row">
    <div class=""col-8>
    <?php
    include("./common/db.php");
    $query ="select * from questions where id=$qid";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $cid= $row['category_id'];
    echo "<h4 class='margin-bottom-15 question-title'>question : ".$row['title']."</h4><p>".$row['description']."</p>";
      include("answers.php");

       ?>
       <form action="./server/requests.php" method="post">
        <input type="hidden" name="question_id value=:">

       <textarea name="answer" class="form-control margin-bottom-15" placeholder="Type your answer"></textarea>
       <button class="btn btn-primary">Write your answer</button>
       </form>
    </div> 
    <div class="col-4">
      
        <?php
        $categoryQuery = "select name from category where id = $cid";
        $categoryResult = $conn->query($query);
        $categoryRow = $categoryResult->fetch_assoc();
        echo "<h1>".ucfirst($categoryRow['name'])."</h1>";
       
        $query= "select * from questions where category_id = $cid and id!=qid";
        $result = $conn->query($query);
        foreach($result as $row){
            $id = $row['id'];
            $title= $row['title'];
            echo "<div class='question-list'>
            <h4><a href=?q-id=$id >$title</a></h4>
            </div>";
        }
        ?>


    </div>  
</div>
</div>
