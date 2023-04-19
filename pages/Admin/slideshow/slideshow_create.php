<div class="modal fade" id="createSlideshow" tabindex="-1" aria-labelledby="createSlideshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createSlideshowLabel">Create
                    <?= $heading ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form class="forms-sample" action="./DB/slideshow.process.php" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="ss_title">Title</label>
                        <input type="text" class="form-control" name="ss_title" id="ss_title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="ss_event">Event</label>
                        <input type="text" class="form-control" name="ss_event" id="ss_event" placeholder="Event">
                    </div>
                    <div class="form-group">
                        <label for="ss_url">Slide Link</label>
                        <input type="text" class="form-control" name="ss_url" id="ss_url" placeholder="#">
                    </div>

                    <div class="form-group">
                        <label for="ss_description">Slide Description</label>
                        <textarea class="form-control" id="ss_description" name="ss_description" rows="4"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <label class="w-100" for="ss_image">File upload</label>
                        <label for="ss_image" class="btn btn-primary btn-sm text-center py-2">
                            <i class="fa fa-image" aria-hidden="true"></i>Browse Image
                        </label>
                        <input type="file" name="ss_image" id="ss_image" class="d-none">
                        <div id="img-preview" class="m=0"></div>
                    </div>

                    <button type="submit" name="submit" class="float-end btn btn-success btn-sm text-center py-2">
                        <i class="fas fa-plus-circle"></i>Create
                        <?= $heading; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const chooseFile = _("ss_image");
    const imgPreview = _("img-preview");
    chooseFile.addEventListener("change", function () {
        getImgData();
    });
    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
                imgPreview.style.display = "block";
                imgPreview.innerHTML = '<img src="' + this.result + '" width="200"/>';
            });
        }
    }
</script>