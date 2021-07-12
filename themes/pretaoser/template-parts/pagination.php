<?php
/**
 * A template partial to output pagination .
*/

$links = paginate_links([
    'type' => 'array',
    'prev_text' => '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                         </svg>',
    'next_text' => '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>',
]);

?>

<?php if ($links !== null) : ?>
    <div class="row justify-content-center my-5">
        <nav aria-label="Pagination ">
            <ul class="pagination ">
                <?php
                foreach ($links as $link) :
                    $active = strpos($link, 'current') !== false;
                    $active ? ($link = str_replace('current', 'active-link ', $link)) : null;
                    ?>
                    <li class="page-item p-2 "> <?= str_replace('page-numbers', 'page-link', $link) ?></li>
                    
                <?php endforeach ?>
            </ul>
        </nav>
    </div>

<?php endif ?>