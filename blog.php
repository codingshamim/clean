<?php include "php/header.php" ?>
<?php 
$postsSql = "select * from posts";
$postQuery  = mysqli_query($conn,$postsSql);

?>
    <!-- main content start -->
    <main>
      <section class="blogSection">
        <div class="container">
            <div class="row flexCol">
                <?php 
             while($postsAll = mysqli_fetch_assoc($postQuery)){
           

                ?>
                <div class="blogCardItem row  itemsCenter mobileRes">
                    <img class="cardImg" src="shajjad/cleaning/posts/<?php  echo $postsAll['thumb'] ?>" alt="">
                   <div class="blogCardContent">
                    <h1><?php  echo $postsAll['title'] ?> </h1>
                    <div class="authorBox ">
                        <img src="imgs/authors/author-2.jpg" alt="">
                       <h5 class="mobileRes row itemsCenter flexCol"> <span>16 Minute Ago</span></h5>
                    </div>
                   </div>
                </div>
                <?php 
                  }
                ?>
           
            </div>
        </div>
      </section>
    </main>
    <!-- main content end -->
    <?php include "php/footer.php" ?>