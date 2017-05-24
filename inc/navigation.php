<?php
/* Creation du menu dynamiquement */
$menu_name = 'header-menu';
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) 
{
  $menu_array = array();
  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

  $menu_items = wp_get_nav_menu_items($menu->term_id);
  $menu_list = '';
              /**
                Organise le menu dans un array comme cela :
                Array ( [145] => Array ( [name] => Éditions Précédentes
                             [url] => http://127.0.0.1/wordpress/?page_id=42 )
                    [141] => Array ( [name] => horaire 
                             [url] => http://127.0.0.1/wordpress/?page_id=131 ) 
                    [143] => Array ( [name] => Comité 
                             [url] => http://127.0.0.1/wordpress/?page_id=44 
                             [0] => Comité 2010 
                             [1] => Comité 2009 ) 
                    )
               */
  foreach ( (array) $menu_items as $key => $menu_item ) 
  {
    $title = $menu_item->title;
    $url = $menu_item->url;
    $id = $menu_item->ID;
    $id_parent = $menu_item->menu_item_parent;
    $post_par = $menu_item->post_parent;
    if($id_parent == 0 ) // si c'est un parent
    {
      $menu_array[$id] = array();
      $menu_array[$id]['name'] = $title;
      $menu_array[$id]['url'] = $url;
    }
    else // c'est un enfant
    {
      $item = '<a href="'.$url.'">'.$title.'</a>';
      array_push($menu_array[$id_parent],$item);
    }
  }

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
      //$menu_list .= '<a href="'.$element['url'].'" style="float:left;padding-right:0px;display:inline-block;">'.$element['name'].'</a>';
      $menu_list .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="float:left;padding-left:0px;display:inline-block;">'.$element['name'].'<span class="caret"></span></a>';
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
