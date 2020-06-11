<?php
/*
Template Name: Contact

Template per la pagina con il modulo email
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package _digital_library
*/
?>
<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>
<?php get_header(); ?>
       <main id="primary" class="site-main col-12 col-md-8"> 
       <?php 
       if (function_exists('the_breadcrumb')) {
           the_breadcrumb();
       }
        ?> 
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <?php _digital_library_post_thumbnail(); ?>

                <div class="entry-content">        

                    <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                        <ul>
                            <li>
                                <label for="contactName">Name:</label>
                                <input type="text" name="contactName" id="contactName" value="" />
                            </li>
                            <li>
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="" />
                            </li>
                            <li>
                                <label for="commentsText">Message:</label>
                                <textarea name="comments" id="commentsText" rows="20" cols="30"></textarea>
                            </li>
                            <li>
                                <button type="submit">Send email</button>
                            </li>
                        </ul>
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                    </form>               
                </div><!-- .entry-content -->

                <?php if ( get_edit_post_link() ) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Edit <span class="screen-reader-text">%s</span>', '_digital_library' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post( get_the_title() )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
       </main><!-- #main -->

<?php
get_sidebar();
get_footer();