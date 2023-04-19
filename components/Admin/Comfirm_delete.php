<div class="modal fade" id="delete<?= $heading ?>" tabindex="-1" aria-labelledby="delete<?= $heading ?>Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete<?= $heading ?>Label">This action cannot be undone!!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to Delete This
                <?= $heading ?>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <div id="del-button"></div>
            </div>
        </div>
    </div>
</div>
<script>
    function loadDataForDelete(id) {
        var a = document.createElement('a');
        var linkText = document.createTextNode("Yes");
        a.appendChild(linkText);
        a.href = "./DB/<?= strtolower($heading) ?>.process.php?send=del&id=" + id + "&pg=" + <?= $pg ?>;
        a.id = "del-link";
        _("del-button").appendChild(a);
        _("del-link").setAttribute("class", "btn btn-primary");
    }
</script>