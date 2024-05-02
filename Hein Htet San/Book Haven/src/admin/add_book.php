<?php

    include("../php/config.php");
    if(isset($_POST['save'])){
        $btitle = $_POST['title'];
        $bauthor = $_POST['author'];
        $bcatid = $_POST['category'];
        $bprice = $_POST['price'];
        $bdescp = $_POST['desc'];
        if(isset($_FILES['image'])){
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            // get file extension
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);
            $extensions = ['png', 'jpeg', 'jpg'];
            if(in_array($img_ext, $extensions) === true){
                $new_img_name = str_replace(' ', '_', $img_name);
                $path =  "../books/".$new_img_name;
                if(move_uploaded_file($tmp_name, $path)){
                    $sql = "INSERT INTO book 
                            (title,Author,catid,prices,cover_img,description) VALUES
                            ('$btitle','$bauthor',$bcatid,$bprice,'$new_img_name','$bdescp')";
                    $query = mysqli_query($con, $sql);
                    header("location:./book.php");
                }
            }
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

                    <form action="" method="POST" class="shadow p-3" enctype="multipart/form-data">
                        <h4 class="mb-4"><i class="bi bi-book"></i> Add Book</h4>
                        <div class="d-flex flex-column mb-3">
                            <label for="">Title</label>
                            <input type="text" class="" name="title" value="" placeholder="Enter Title" required>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label for="">Author</label>
                            <input type="text" class="" name="author" placeholder="Enter author" value="" required>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label for="">Category</label>
                            <select name="category" id="" class="" required>
                                <option value="null">Choose Category</option>
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
                            <input type="number" class="" name="price" value="" placeholder="Enter price" required>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label for="" class="label">Cover Image</label>
                            <label for="cover-image" class="img-input">Choose Image</label>
                            <input type="file" class="" id="cover-image" name="image" required>
                        </div>
                        <div class="d-flex flex-column mb-4">
                            <label for="">Description</label>
                            <textarea name="desc" id="" cols="30" rows="10" placeholder="Enter book description" required></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="./book.php" class="backbtn btn btn-secondary text-decoration-nonea">Back</a>
                            <button class="" name="save"><i class="bi bi-plus"></i> Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
