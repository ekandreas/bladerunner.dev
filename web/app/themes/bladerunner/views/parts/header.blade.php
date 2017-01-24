<?php
  $navId = get_nav_menu_locations()['main'];
  $currentId = get_the_ID();
?>
<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      @foreach(wp_get_nav_menu_items($navId) as $navPost)
        <a class="nav-link{{ (($navPost->url=='/' && is_home($currentId)) || $navPost->object_id == $currentId) ? ' active' : '' }}" href="{{ $navPost->url }}">{{ $navPost->title }}</a>
      @endforeach
    </nav>
  </div>
</div>

