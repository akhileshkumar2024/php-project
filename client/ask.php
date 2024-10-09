<div class="container">
    <h1 class="heading">Ask a question</h1>
    <!-- <form action ="" methos ="post"> -->
    <form action="./server/requests.php" method ="post">
        
        <div class="col-6 offset-sm-6 margin-bottom-15">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" class="form-control" id="email" placeholder="enter your question">
        </div>

        <div class="col-6 offset-sm-6 margin-bottom-15">
            <label for="description" class="form-label">description</label>
            <textarea name="description" class="form-control" id="description" placeholder="enter your question"></textarea>
        </div>

        <div class="col-6 offset-sm-6 margin-bottom-15">
            <label for="category" class="form-label">category</label>
            <?php
            include("category.php");
            ?>
        </div>
        
        <div class="col-6 offset-sm-6 margin-bottom-15">
            <button type="submit" name="ask" class="btn btn-primary">ask question</button>
        </div>
    </form>


   

</div>
