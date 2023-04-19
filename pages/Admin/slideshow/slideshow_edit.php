<div class="modal fade" id="editSlideshow" tabindex="-1" aria-labelledby="editSlideshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editSlideshowLabel">Update
                    <?= $heading ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form id="edform" class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="edtitle">
                    </div>
                    <div class="form-group">
                        <label for="event">Event</label>
                        <input type="text" class="form-control" name="event" id="edevent">
                    </div>
                    <div class="form-group">
                        <label for="url">Slide URL</label>
                        <input type="text" class="form-control" name="url" id="edurl">
                    </div>

                    <div class="form-group">
                        <label for="descriptoin">Slide Description</label>
                        <textarea class="form-control" value="description" id="eddescriptoin" name="description"
                            rows="4">
                    </textarea>
                    </div>
                    <div class="form-group text-center">
                        <label class="w-100">File upload</label>
                        <label for="ss_edimage" class="btn btn-primary btn-sm text-center py-2">
                            <i class="fa fa-image" aria-hidden="true"></i>Browse Image
                        </label>
                        <input type="file" name="ss_edimage" id="ss_edimage" class="d-none">
                        <div id="curr_img" class="mt-3">
                            <img id="edimage" width="200">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning mr-2 float-end py-2 text-dark"><i
                            class="fas fa-tools me-2"></i>Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function loadDataForEdit(id, title, event, url, description, img, pg) {
        _("edform").setAttribute("action", "../../../DB/slideshow.process.php?send=update&ss_id=" + id + "&pg=" + pg);
        _("edtitle").value = title;
        _("edevent").value = event;
        _("edurl").value = url;
        _("eddescriptoin").innerHTML = description;
        _("edimage").setAttribute("src", "./assets/images/slideshow/" + img);
    }
    _("ss_edimage").addEventListener("change", function () {
        const files = _("ss_edimage").files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
                _("edimage").setAttribute("src", this.result);
            });
        }
    });
</script>