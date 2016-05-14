# Changelog #

## HEAD ##

* Remove HTML title tag.
* Fix edit link condition in page content template.
* Add theme support for custom logo, remove old function.


## Version 1.1.1 ##

* Move more link modification.
* Remove FOUC file.
* Add "editor-style.css" for parent theme.
* Update frontend.
* Update "header.php".
* Bring back link rel favicon.
* Refactor "style.css".
* Update meta tags.
* Add post type audio.


## Version 1.1.0 ##

* Decision to not modify WordPress HTML markup (pagination, navigation, comments, etc.).
* Add "archive.php".
* Add "singular.php".
* Add "search.php" and "searchform.php".
* Add "image.php", do not add "attachment.php" because images are attachments.
* Add class for screen reader text.
* Add empty "rtl.css" with link to WordPress codex.
* Update language files ("de_DE").


## Version 1.0.2 ##

* Change names of child theme functions.
* Add check for secondary menu in "sidebar.php".
* Make parent theme main functions rewritable (`! function_exists()`)
  and rename it.
* Add `<nav>` tag for breadcrumbs.
* Code styling (intentions).
* Move content sidebar into `<main>`.
* Code for header text color.
* Child: Function to remove more-link anchor.


## Version 1.0.1 ##

* Remove navigation tags (forked from "twenty*") and use native navigation.
* Add "comments.php". Should already be present in Version 1.0.0, because
  templates without the file are deprecated since Wordpress 3.0
  Just use the default implementation, no modifications.


## Version 1.0.0 ##

* Add basic templates and post types.
* Add basic style rules.
* Add some basic functions.
