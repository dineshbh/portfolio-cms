        <!-- upload form -->
                <div class="bbody">
            <!-- upload form -->
            {{ Form::model($galleryitem, array('id' => 'upload_form', 'action' => array('GalleryController@uploadImageFile', $galleryitem->id), 'files' => true, 'onsubmit' => 'return checkForm()')) }}
                <p>Please select image file:</p>
                <div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" /></div>

                <div class="error"></div>

                <div class="step2">
                    <p>Preview</p>
                    <img class="thumb" id="preview" />

                    <div class="info">
                        <p><span id="filesize"></span>, 
                        <span id="filetype"></span>, 
                        <span id="filedim"></span>px<p>
                        <input type="submit" value="Upload" />
                    </div>
                    
                </div>
            </form>
        </div>