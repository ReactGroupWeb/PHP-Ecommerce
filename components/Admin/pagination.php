<nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link bg-dark" href="/admin_<?= strtolower($heading) ?>?pg=<?= ($pg > 1 ? $pg - 1 : 1) ?>"
                aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php for ($i = 1; $i <= $numpage; $i++) { ?>
            <li class="page-item <?= $pg == $i ? "active" : "" ?>"><a
                    class="page-link <?= $pg == $i ? "bg-primary" : "bg-dark" ?>"
                    href="/admin_<?= strtolower($heading) ?>?pg=<?= $i ?>"><?= $i ?></a>
            <?php } ?>
        </li>
        <li class="page-item">
            <a class="page-link bg-dark"
                href="/admin_<?= strtolower($heading) ?>?pg=<?= ($pg < $numpage ? $pg + 1 : $numpage) ?>"
                aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>