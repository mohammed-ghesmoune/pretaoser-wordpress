<?php

//load post-post-types
require_once 'post-types/post-type-interface.php';//this has to be loaded first
require_once 'post-types/prestation-register.php';
require_once 'post-types/testimonial-register.php';
require_once 'post-types/carousel-register.php';


//load metaboxes 
require_once 'metaboxes/metabox-interface.php';//this has to be loaded first
require_once 'metaboxes/testimonial-metaboxe.php';
require_once 'metaboxes/prestation-metaboxe.php';
require_once 'metaboxes/carousel-metaboxe.php';
require_once 'metaboxes/metaboxes-register.php';



// load custom widgets
include_once 'widgets/class-widget-social-media.php';