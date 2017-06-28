<?php
        include 'adminHeader.php';
        include 'adminNav.php'; 
?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Create A New Article</h1>
                    </div>
                    
                    <!-- begin new article form -->
                    <form method="post" action="newsManagerInsertCommit.php" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <label for="publishLive" class="adminLabel">Publish live?</label>
                        <br />
                        <select name="publishLive">
                            <option value="yes">Yes</option>
                            <option value="no" selected>No</option>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <label for="title" class="adminLabel">Article Title: </label>
                        <input type="text" class="titleInput" name="title" />
                    </div>
                    <div class="col-md-6">
                        <label for="author" class="adminLabel">Author: </label>
                        <input type="text" class="authorInput" name="author" />
                    </div>
                        <div class="col-md-6">
                        <label for="pubDate" class="adminLabel">Publish Date: </label>
                        <input type="text" class="authorInput" name="pubDate" value="<?php echo date('F j\, Y'); ?>"></input>
                        </div>
                    <div class="col-lg-6">
                        <label for="image" class="adminLabel">Article Main Image: </label>
                        <p class="instructions">(PNG, JPG, JPEG, only)</p>
                        
                          Image: <input type="file" name="photo" size="25" />

                    </div>
                    <div class="col-lg-6">
                        <!--<label for="image" class="adminLabel">Image Preview: </label>-->
                    </div>
                    <div class="col-lg-12">
                        <label for="body" class="adminLabel">Article Body: </label>
                        <textarea name="body" class="bodyInput" id="postInput"></textarea>
                    </div>                
                        <div class="col-lg-12">
                        <input type="submit" class="saveButton" value="Submit Changes" name="submit" />
                        <a href="newsManager.php" class="cancelButton">Cancel</a>
                        </div>
                        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'postInput' );
                </script>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        
<?php include 'adminFooter.php'; ?>
