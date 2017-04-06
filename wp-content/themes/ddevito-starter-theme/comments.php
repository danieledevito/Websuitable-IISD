<?php

/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC_Core\Support\Views;

include( Views::load_view( TBSC_CORE_VIEWS_DIR . 'comments/comments.php' ) );
