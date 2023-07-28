<?php include "php/header.php";
include "php/conn.php";
$selPost = "select * from posts order by id desc";
$selPostQuery = mysqli_query($conn, $selPost);
$selFetchPost = mysqli_fetch_assoc($selPostQuery);




$userIds = $selFetchPost['user'];

$usernameSql = "select * from user where id = '$userIds'";
$usernameQuery = mysqli_query($conn, $usernameSql);
$userName = mysqli_fetch_assoc($usernameQuery);
// get the time ago function 

?>

<div class="container " style="padding: 0;">
    <!-- homeSection start  -->
    <div class="homeSection" id="home">
        <div class="row justifyBetween itemsCenter resCol">
            <div class="homeContent">
                <div class="cateContent row itemsCenter">
                    <button class="btn"><?php echo $selFetchPost['cate'] ?></button>
                    <p><?php echo $selFetchPost['time'] ?></p>
                </div>
                <div class="homeTextContent">
                    <h1><a href="view.php?posts=<?php echo $selFetchPost['id'] ?>"><?php echo $selFetchPost['title'] ?></a> </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, laboriosam vel. Non voluptatibus id enim praesentium eaque. Fugit iste libero consequatur quaerat distinctio, dicta sint, veniam totam tempora velit accusamus.


                    </p>
                    <div class="authorBox ">
                        <img src="imgs/authors/author-2.jpg" alt="">
                        <h5 class="mobileRes row itemsCenter"><?php echo $userName['name'] ?> <span><?php echo $selFetchPost['time'] ?></span></h5>
                    </div>
                </div>

            </div>
            <div class="homeImg">
                <img src="shajjad/cleaning/posts/<?php echo $selFetchPost['thumb'] ?>" alt="">
            </div>
        </div>
    </div>
    <!-- homeSection end -->
</div>


<!-- main content start  -->
<main>
    <section class="featureContainer">
        <div class="container">
            <div class="row justifyCenter itemsCenter resCol laptop">

                <?php

                $selPost2 = "select * from posts order by id desc limit 0,3";
                $selPostQuery2 = mysqli_query($conn, $selPost2);
                while ($posts2 = mysqli_fetch_assoc($selPostQuery2)) {




                ?>
                    <div class="featureBox row justifyCenter itemsCenter mobileTwoRes">
                        <div class="featureImg">
                            <img src="shajjad/cleaning/posts/<?php echo $posts2['thumb'] ?>" alt="">
                        </div>
                        <div class="featureContent">
                            <h1><a href="view.php?posts=<?php echo $posts2['id'] ?>" style="color:#222831"> <?php echo $posts2['title'] ?></a></h1>
                            <div class="timeContent mobileRes row">
                                <span class="title">Sep, 2021</span>
                                <span class="times">13k views</span>
                            </div>
                        </div>

                    </div>

                <?php     } ?>
            </div>
        </div>
    </section>

    <section class="newBlog">
        <div class="container">
            <div class="titleBox">
                <h1>New Blogs</h1>
            </div>
            <div class="row">
                <?php

                $selPost3 = "select * from posts order by id desc limit 0,6";
                $selPostQuery3 = mysqli_query($conn, $selPost3);
                while ($posts3 = mysqli_fetch_assoc($selPostQuery3)) {




                ?>
                    <div class="blogCard">




                        <div class="cateBtnContainer">
                            <a href=""><?php echo $posts3['cate'] ?></a>
                        </div>
                        <a href="view.php?posts=<?php echo $posts3['id'] ?>" style="color: #222831;"> <img src="shajjad/cleaning/posts/<?php echo $posts3['thumb'] ?>" alt="">
                        </a> <span class="titleBar">27 September</span>
                        <h1> <a href="view.php?posts=<?php echo $posts3['id'] ?>" style="color: #222831;"> <?php echo $posts3['title'] ?></a></h1>

                    </div>

                <?php     } ?>


            </div>
        </div>
    </section>

    <section class="mostViews">
        <div class="container">
            <div class="titleBox">
                <h1>Most Views</h1>
            </div>
            <?php
            $postSql = "select * from posts order by views";
            $postquery = mysqli_query($conn, $postSql);
            $postsView = mysqli_fetch_assoc($postquery);


            $stringTwo = $postsView['Descs'];
            function shortenTwo($stringTwo, $length = 212)
            {
                if (strlen($stringTwo) > $length) {
                    $words = explode(' ', $stringTwo);
                    $lastWord = end($words);
                    $charsLastWord = strlen($lastWord);

                    $stringTwo = wordwrap($stringTwo, $length - 7 - $charsLastWord); // -7 because we count the chars of " (...) "
                    $stringTwo = explode("\n", $stringTwo, 2);
                    $stringTwo = $stringTwo[0] . ' (...) ' . $lastWord;
                }
                return $stringTwo;
            }
            ?>
            <div class="row justifyCenter itemsCenter resCol">
                <div class="mostViewsContent">
                    <div class="cateContent row itemsCenter">
                        <button class="btn"><?php echo $postsView['cate'] ?></button>
                        <p>August 12, 2021</p>
                    </div>
                    <div class="mostViewsContenttext">
                        <h1><a href="view.php?posts=<?php echo $postsView['id'] ?> ?>">
                                <?php echo $postsView['title'] ?>
                            </a></h1>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, laboriosam vel. Non voluptatibus id enim praesentium eaque. Fugit iste libero consequatur quaerat distinctio, dicta sint, veniam totam tempora velit accusamus.

                        </p>


                    </div>

                </div>

                <div class="mostViewsImg">
                    <img src="shajjad/cleaning/posts/<?php echo $postsView['thumb'] ?>" alt="">
                </div>
            </div>
        </div>

    </section>

    <section class="newsLetter">
        <div class="container">
            <div class="row flexCol justifyCenter itemsCenter resCol ">
                <div class="newsLeft">
                    <div class="newsLetterText">
                        <img src="imgs/theme/svg/send.svg" alt="">
                        <h1>Subscribe</h1>

                    </div>
                    <h1 class="newLetterTextTwo">To Our News Letter</h1>

                </div>
                <form class="newsRight row  justifyCenter itemsCenter resCol mobileRes mobileTwoRes" method="post">
                    <input type="email" placeholder="Enter Your Email" id="email" name="email" required>
                    <button id="subs" class="btn">Subscribe</button>
                </form>
            </div>


        </div>
    </section>
</main>
<!-- main content end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
       
		$('#subs').click(function(event){
         var btns = document.querySelector('#subs').innerHTML = "Please Wait ..";
			event.preventDefault();
			var	email = $('#email').val();
            if(email == ""){
                alert("please Write your email")
            }
           else{
            $.ajax({
			    type: "POST",
			    url: "upload.php",
			    data: { email:email },		    
			  
			    success: function(result){
                   ;
                   var btns = document.querySelector('#subs').innerHTML = "Subscribe";
                   alert("Subscribed");
			    }
            });
           }
			
		
			
		});
	});
</script>
<?php include "php/footer.php" ?>