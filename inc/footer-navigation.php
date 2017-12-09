<?php
// Dynamic creation of the footer menu
$menu_name = 'footer-menu';
$menu_list = '';

if (!empty($menu_array = get_menu($menu_name))) {
    /* Création du code html selon l'array */
    // We have to define column size
    $singleLinks = array(); // links without children
    $categories = 0;

    // Determine the amount of independent categories and links
    foreach((array) $menu_array as $element) {
        if(count($element) == 2) { // c'est un parent sans enfant
            $singleLinks[] = '<a href="' . $element['url'] . '">' . mb_strtoupper($element['name']) . '</a>';
        } else { // c'est un parent avec enfant
            $categories ++;
        }
    }

    if (!empty($singleLinks)) {
        $categories ++;
    }

    // Determine the size of each column
    $colSize = "col-md-" . floor(12 / $categories); // max 12 columns

    // Display categories
    foreach((array) $menu_array as $element) {
        if(count($element) > 2) { // c'est un parent avec enfant
          // dropdown headerv
          $menu_list .= '<div class="' . $colSize . '">';
          $menu_list .= '<h3>' . mb_strtoupper($element['name']) . '</h3>';
          // dropdown item
          foreach(array_slice($element, 2) as $item) {
            $menu_list .= '<h4>'. $item.'</h4>';
          }
          $menu_list .= '</div>';
        }
    }

    // Display independent links
    if (!empty($singleLinks)) {
        $menu_list .= '<div class="' . $colSize . '">';
        foreach($singleLinks as $item) {
            $menu_list .= '<h3>'. $item.'</h3>';
        }
        $menu_list .= '</div>';
    }

}
echo $menu_list;

// $menu_list now ready to output
?>
