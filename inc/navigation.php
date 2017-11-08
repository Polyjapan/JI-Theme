<?php
/* Creation du menu dynamiquement */
$menu_name = 'header-menu';
if (!empty($menu_array = get_menu($menu_name))) {
  $menu_list = '';

  /* Création du code html selon l'array */
  foreach((array) $menu_array as $element )
  {
    if(count($element) == 2) // c'est un parent sans enfant
    {
      $menu_list .= '<li id="menuLink"><a href="'.$element['url'].'">'. $element['name'].'</a></li>';
    }
    else // c'est un parent avec enfant
    {
      // dropdown header
      $menu_list .= '<li class="dropdown" id="menuLink">';
      // add the page link
      $menu_list .= '<a href="#" class="dropdown-toggle navbar-dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$element['name'].'<span class="caret"></span></a>';
      // dropdown item
      $menu_list .= '<ul class="dropdown-menu">';
      foreach(array_slice($element, 2) as $item)
      {
        $menu_list .= '<li>'. $item.'</li>';
      }
      $menu_list .= '</ul></li>';
    }
  }
} else {
  $menu_list = '<li  id="menuLink">Menu "' . $menu_name . '" not defined.</li>';
}
echo $menu_list;
// $menu_list now ready to output
?>
