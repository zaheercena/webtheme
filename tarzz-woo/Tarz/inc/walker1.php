<?php
/* This is Walker Class*/
class Walker_Nav_Primary extends Walker_Nav_menu{
  function start_lvl(&$output, $depth){ //ul Generation
    $indent=str_repeat("\t", $depth);
    $submenu=($depth > 0) ? 'sub-menu':'';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
  }
  function start_el(){ //li Generation

  }
  /*function end_el(){ //li Closing

  }
  function end_lvl(){ //ul Closing

  }*/
}
