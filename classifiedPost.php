<?php 
    $newtitle = 'Post an Ad';
        //get header but replace the title in the head tags
        ob_start();
        include('header.php');
        $buffer=ob_get_contents();
        ob_end_clean();
        $buffer=str_replace("%TITLE%",$newtitle,$buffer);
        echo $buffer;
?>
<h1>Post a Classified Ad</h1>
<p class="instructions">Note - inappropriate or offensive ads will be removed </p>
<p class="instructions"><span class="error">*</span> required</p>
<form method="post" action="classifiedPostCommit.php" enctype="multipart/form-data">
    <div class="col-md-6">
    <label for="title"><span class="error">*</span>Title: </label>
    <input type="text" class="titleInput" name="title" id="title" />
    <br />
    <label for="price"><span class="error">*</span>Price: $</label>
    <input type="text" name="price" />
    <br>
    <label for="email"><span class="error">*</span>Your email: </label>
    <input type="text" name="email" />
    <br>
    <label for="phone">Your phone number (optional): </label>
    <input type="text" name="phone" />
    <br>
    <label for="category"><span class="error">*</span>Ad Category: </label>
    <select name="category">
        <option value="textbooks" selected>Textbooks</option>
        <option value="housing">Housing</option>
        <option value="cars">Cars</option>
        <option value="bikes">Bikes</option>
    </select>
    <label for="contactpref">Your contact preference: </label>
    <select name="contactpref">
        <option value="phone" selected>Phone</option>
        <option value="text">Text</option>
        <option value="text">Email</option>
    </select>
    <br>
    <label for="postbody"><span class="error">*</span>Post body: </label><br>
    <textarea name="postbody" class="bodyInput" id="postInput"></textarea>
    </div>
    <div class="col-md-6">
        <label for="image" class="adminLabel"><span class="error">*</span>Post Main Image: </label>
                        <p class="instructions">(PNG, JPG, JPEG, only)</p>
                        <input type="file" name="photo" size="25" id="imgUp" />
                        <br>
                        <p>Image preview</p>
                        <img id="imgPreview" class="imgPreview img-responsive" src="#" alt="" />
    </div>
    <div class="col-md-12">
    <input class="public-button floatnone" type="submit" name="submit" value="Submit Post" />
    </div>
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'postInput' );
    </script>
</form>
<!--img preview-->
<script type="text/javascript">
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgPreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgUp").change(function(){
    readURL(this);
});
</script>
<?php 

include 'footer.php'?>
