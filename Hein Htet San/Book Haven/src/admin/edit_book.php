<?php

    include("../php/config.php");
    $book_id = $_GET['id'];
    if(isset($_POST['save'])){
        $btitle = $_POST['title'];
        $bauthor = $_POST['author'];
        $bcatid = $_POST['category'];
        $bprice = $_POST['price'];
        $bdescp = $_POST['desc'];
        $sql3 = "UPDATE book 
                    SET title='$btitle', Author='$bauthor', catid=$bcatid, prices=$bprice,
                    description='$bdescp' WHERE id=$book_id";
        $query3 = mysqli_query($con, $sql3);
        if($query3){
            header("location:./book.php");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven | Dashboard | Order</title>
    <link rel="stylesheet" href="../assets/css/overview.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="../icons/svg/logo.svg">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center edit-book">
                <div class="edit-book-wrapper d-flex align-items-start justify-content-center p-md-5 pt-3">

                <?php
                
                    $sql1 = "SELECT * FROM book LEFT JOIN category ON book.catid=category.cat_id WHERE id=$book_id";
                    $query1 = mysqli_query($con, $sql1);
                    $row1 = mysqli_fetch_assoc($query1);
                        $title = $row1['title'];
                        $price = $row1['prices'];
                        $author = $row1['Author'];
                        $category = $row1['catname'];
                        $catid = $row1['catid'];
                        $cover_img = $row1['cover_img'];
                        $desc = $row1['description'];
                ?>

                    <form action="" method="POST" class="shadow p-3" enctype="multipart/form-data">
                        <h4 class="mb-4"><i class="bi bi-pen-fill"></i> Edit Book</h4>
                        <div class="d-flex flex-column mb-3">
                            <label for="">Title</label>
                            <input type="text" class="" name="title" value="<?php echo $title;?>" required>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label for="">Author</label>
                            <input type="text" class="" name="author" value="<?php echo $author;?>" required>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label for="">Category</label>
                            <select name="category" id="" class="" required>
                                <option value="<?php echo $catid;?>"><?php echo $category;?> </option>
                                <?php
                                    $sql2 = "SELECT * FROM category";
                                    $query2 = mysqli_query($con, $sql2);
                                    while($row2 = mysqli_fetch_assoc($query2)):
                                        $catname = $row2['catname'];
                                        $catid = $row2['cat_id'];
                                ?>
                                <option value="<?php echo $catid?>"><?php echo $catname;?></option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label for="">Price</label>
                            <input type="number" class="" name="price" value="<?php echo $price;?>" required>
                        </div>
                        <!-- <div class="d-flex flex-column mb-3">
                            <label for="" class="label">Cover Image</label>
                            <label for="cover-image" class="img-input"><?php echo $cover_img;?></label>
                            <input type="file" class="" id="cover-image" name="image" required>
                        </div> -->
                        <div class="d-flex flex-column mb-4">
                            <label for="">Description</label>
                            <textarea name="desc" id="" cols="30" rows="10" required><?php echo $desc;?></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="./book.php" class="backbtn btn btn-secondary text-decoration-nonea">Back</a>
                            <button class="" name="save">Save Changes</button>
                        </div>
                    </form>

                    

                </div>
            </div>
        </div>
    </div>
</body>
</html>
