<?php
    include 'adminHeader.php';
    include 'adminNav.php';
    require_once 'adminClasses/db.php';
        
    //get the id so right row is updated
    $id = $_GET['id'];

    $selectall = "SELECT * FROM newsarticles WHERE id='$id'";
    $data = $db->query($selectall);
        
    //fetch associative arrays from the data so we can reference column names in the foreach loop
    $data->setFetchMode(PDO::FETCH_ASSOC);
        
?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php foreach($data as $items){
                            echo '<h2><i class="grey">Currently Editing:</i><br> ' . $items['title'] . '</h2>';
                        } 
                        ?>
                    </div>
                    
                    <!-- begin new article form -->
                    <form method="post" action="newsManagerUpdateCommit.php">
                    <div class="col-lg-4">
                        <label for="publishLive" class="adminLabel">Publish live?</label>
                        <br />
                        <p><i>Previous Publish Status: </i><b><?php echo $items['publishlive']; ?></b></p>
                        <select name="publishLive">
                            <?php if($items['publishlive'] == 'yes'){      
                            echo
                            '<option value="yes" selected>Yes</option>
                            <option value="no">No</option>';
                            }
                            else{
                              echo  '<option value="yes">Yes</option>
                            <option value="no" selected>No</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="image" class="adminLabel">Article Main Image: </label>
                        <p class="instructions">(PNG, JPG, JPEG, only)</p>
                        <input type="file" name="fileToUpload" class="upload" />
                    </div> 
                    <div class="col-lg-4">
                        <label for="image" class="adminLabel">Current Image Preview: </label>
                        <br />
                        <img class="news-thumb-edit img-responsive" src="../images/<?php echo $items['image']; ?>" />
                    </div>
                    <div class="col-lg-12">
                        <input type="hidden" name="hiddenid" value="<?php echo $items['id']; ?>" />
                        <label for="title" class="adminLabel">Article Title: </label>
                        <input type="text" class="titleInput" name="title" value="<?php echo $items['title']; ?>" />
                    </div>
                    <div class="col-md-6">
                        <label for="author" class="adminLabel">Author: </label>
                        <input type="text" class="authorInput" name="author" value="<?php echo $items['author']; ?>" />
                    </div>
                        <div class="col-md-6">
                        <label for="pubDate" class="adminLabel">Publish Date: </label>
                        <input type="text" class="authorInput" name="pubDate" value="<?php echo $items['pubdate']; ?>"></input>
                        </div>           
                    <div class="col-lg-12">
                        <label for="body" class="adminLabel">Article Body: </label>
                        <textarea name="body" class="bodyInput" id="postInput"><?php echo $items['body']; ?></textarea>
                    </div>                
                        <div class="col-lg-12">
                        <input type="submit" class="saveButton" value="Submit Changes" name="update" />
                        <a href="newsManager.php" class="cancelButton">Cancel</a>
                        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'postInput' );
                </script>
                        </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- /#page-content-wrapper -->
        
<?php include 'adminFooter.php'; ?>