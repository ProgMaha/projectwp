<?php
/**
 * Titan Notice Handler
 */

defined( 'ABSPATH' ) || exit;

define('DIGITAL_ONLINE_COURSES_SUPPORT',__('https://wordpress.org/support/theme/digital-online-courses/','digital-online-courses'));
define('DIGITAL_ONLINE_COURSES_REVIEW',__('https://wordpress.org/support/theme/digital-online-courses/reviews/#new-post','digital-online-courses'));
define('DIGITAL_ONLINE_COURSES_BUY_NOW',__('https://www.titanthemes.net/themes/digital-courses-wordpress-theme/','digital-online-courses'));
define('DIGITAL_ONLINE_COURSES_DOC_URL',__('https://titanthemes.net/documentation/digital-online-courses/','digital-online-courses'));
define('DIGITAL_ONLINE_COURSES_LIVE_DEMO',__('https://titanthemes.net/preview/digital-online-courses/','digital-online-courses'));
/**
 * Admin Hook
 */
function digital_online_courses_admin_menu_page() {
    $digital_online_courses_theme = wp_get_theme( get_template() );

    add_theme_page(
        $digital_online_courses_theme->display( 'Name' ),
        $digital_online_courses_theme->display( 'Name' ),
        'manage_options',
        'digital-online-courses',
        'digital_online_courses_do_admin_page'
    );
}
add_action( 'admin_menu', 'digital_online_courses_admin_menu_page' );

/**
 * Enqueue getting started styles and scripts
 */
function titan_widgets_backend_enqueue() {
    wp_enqueue_style( 'titan-getting-started', get_template_directory_uri() . '/about-theme/about-theme.css' );
}
add_action( 'admin_enqueue_scripts', 'titan_widgets_backend_enqueue' );

/**
 * Class Titan_Notice_Handler
 */
class Titan_Notice_Handler {

    public static $nonce;

    /**
     * Empty Constructor
     */
    public function __construct() {
        // Activation notice
        add_action( 'switch_theme', array( $this, 'flush_dismiss_status' ) );
        add_action( 'admin_init', array( $this, 'getting_started_notice_dismissed' ) );
        add_action( 'admin_notices', array( $this, 'titan_theme_info_welcome_admin_notice' ), 3 );
        add_action( 'wp_ajax_titan_getting_started', array( $this, 'titan_getting_started' ) );
    }

    /**
     * Display an admin notice linking to the about page
     */
    public function titan_theme_info_welcome_admin_notice() {

    $current_screen = get_current_screen();

    $digital_online_courses_theme = wp_get_theme();
    if ( is_admin() && ! get_user_meta( get_current_user_id(), 'gs_notice_dismissed' ) && $current_screen->base != 'appearance_page_digital-online-courses' ) {
        echo '<div class="updated notice notice-success is-dismissible getting-started">';
        echo '<p><strong>' . sprintf( esc_html__( 'Welcome! Thank you for choosing %1$s.', 'digital-online-courses' ), esc_html( $digital_online_courses_theme->get( 'Name' ) ) ) . '</strong></p>';
        echo '<p class="plugin-notice">' . esc_html__( 'By clicking "Get Started," you can access our theme features.', 'digital-online-courses' ) . '</p>';
        echo '<div class="titan-buttons">';
        echo '<p><a href="' . esc_url(admin_url('themes.php?page=digital-online-courses')) . '" class="titan-install-plugins button button-primary">' . sprintf( esc_html__( 'Get started with %s', 'digital-online-courses' ), esc_html( $digital_online_courses_theme->get( 'Name' ) ) ) . '</a></p>';
        echo '<p><a href="' . esc_url( DIGITAL_ONLINE_COURSES_BUY_NOW ) . '" class="button button-secondary" target="_blank">' . esc_html__( 'GO FOR PREMIUM', 'digital-online-courses' ) . '</a></p>';
        echo '</div>';
        echo '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'gs-notice-dismissed', 'dismiss_admin_notices' ) ) ) . '" class="getting-started-notice-dismiss">Dismiss</a>';
        echo '</div>';
    }
}

    /**
     * Register dismissal of the getting started notification.
     * Acts on the dismiss link.
     * If clicked, the admin notice disappears and will no longer be visible to this user.
     */
    public function getting_started_notice_dismissed() {
        if ( isset( $_GET['gs-notice-dismissed'] ) ) {
            add_user_meta( get_current_user_id(), 'gs_notice_dismissed', 'true' );
        }
    }

    /**
     * Deletes the getting started notice's dismiss status upon theme switch.
     */
    public function flush_dismiss_status() {
        delete_user_meta( get_current_user_id(), 'gs_notice_dismissed' );
    }
}
new Titan_Notice_Handler();

/**
 * Render admin page.
 *
 * @since 1.0.0
 */
function digital_online_courses_do_admin_page() { 
    $digital_online_courses_theme = wp_get_theme(); ?>
    <div class="digital-online-courses-themeinfo-page--wrapper">
        <div class="free&pro">
            <div id="digital-online-courses-admin-about-page-1">
                <div class="theme-detail">
                   <div class="digital-online-courses-admin-card-header-1">
                    <div class="digital-online-courses-header-left">
                        <h2>
                            <?php echo esc_html( $digital_online_courses_theme->Name ); ?> <span><?php echo esc_html($digital_online_courses_theme['Version']);?></span>
                        </h2>
                        <p>
                            <?php
                            echo wp_kses_post( apply_filters( 'titan_theme_description', esc_html( $digital_online_courses_theme->get( 'Description' ) ) ) );
                        ?>
                        </p>
                    </div>
                    <div class="digital-online-courses-header-right">
                        <div class="digital-online-courses-pro-button">
                            <a href="<?php echo esc_url( DIGITAL_ONLINE_COURSES_BUY_NOW ); ?>" class="digital-online-courses-button button-primary" target="_blank" rel="noreferrer">
                                <?php esc_html_e( 'UPGRADE TO PREMIUM', 'digital-online-courses' ); ?>
                            </a>
                        </div>
                    </div>
                </div>   
                </div>   
                <div class="digital-online-courses-features">
                    <div class="digital-online-courses-features-box">
                        <h3><?php esc_html_e( 'PREMIUM DEMONSTRATION', 'digital-online-courses' ); ?></h3>
                        <p><?php esc_html_e( 'Effortlessly create and customize your website by arranging text, images, and other elements using the Gutenberg editor, making web design easy and accessible for all skill levels.', 'digital-online-courses' ); ?></p>
                        <a href="<?php echo esc_url( DIGITAL_ONLINE_COURSES_LIVE_DEMO ); ?>" class="digital-online-courses-button button-secondary-1" target="_blank" rel="noreferrer">
                                <?php esc_html_e( 'DEMONSTRATION', 'digital-online-courses' ); ?>
                            </a>
                    </div>
                    <div class="digital-online-courses-features-box">
                        <h3><?php esc_html_e( 'REVIEWS', 'digital-online-courses' ); ?></h3>
                        <p><?php esc_html_e( 'We would be happy to hear your thoughts and value your evaluation.', 'digital-online-courses' ); ?></p>
                        <a href="<?php echo esc_url( DIGITAL_ONLINE_COURSES_REVIEW ); ?>" class="digital-online-courses-button button-secondary-1" target="_blank" rel="noreferrer">
                                <?php esc_html_e( 'REVIEWS', 'digital-online-courses' ); ?>
                            </a>
                    </div>
                    <div class="digital-online-courses-features-box">
                        <h3><?php esc_html_e( '24/7 SUPPORT', 'digital-online-courses' ); ?></h3>
                        <p><?php esc_html_e( 'Please do not hesitate to contact us at support if you need help installing our lite theme. We are prepared to assist you!', 'digital-online-courses' ); ?></p>
                        <a href="<?php echo esc_url( DIGITAL_ONLINE_COURSES_SUPPORT ); ?>" class="digital-online-courses-button button-secondary-1" target="_blank" rel="noreferrer">
                            <?php esc_html_e( 'SUPPORT', 'digital-online-courses' ); ?>
                        </a>
                    </div>
                    <div class="digital-online-courses-features-box">
                        <h3><?php esc_html_e( 'THEME INSTRUCTION', 'digital-online-courses' ); ?></h3>
                        <p><?php esc_html_e( 'If you need assistance configuring and setting up the theme, our tutorial is available. A fast and simple method for setting up the theme.', 'digital-online-courses' ); ?></p>
                        <a href="<?php echo esc_url( DIGITAL_ONLINE_COURSES_DOC_URL ); ?>" class="digital-online-courses-button button-secondary-1" target="_blank" rel="noreferrer">
                                <?php esc_html_e( 'DOCUMENTATION', 'digital-online-courses' ); ?>
                            </a>
                    </div> 
                </div>   
            </div>
            <div id="digital-online-courses-admin-about-page-2">
                <div class="theme-detail">
                   <div class="digital-online-courses-admin-card-header-1">
                        <div class="digital-online-courses-header-left-pro"> 
                            <h2><?php esc_html_e( 'The premium version of this theme will be available for you to enhance or unlock our premium features.', 'digital-online-courses' ); ?></h2>
                        </div>
                        <div class="digital-online-courses-header-right-2">
                            <div class="digital-online-courses-pro-button">
                                <a href="<?php echo esc_url( DIGITAL_ONLINE_COURSES_BUY_NOW ); ?>" class="digital-online-courses-button button-primary-1 buy-now" target="_blank" rel="noreferrer">
                                    <?php esc_html_e( 'GO TO PREMIUM', 'digital-online-courses' ); ?>
                                </a>
                            </div>
                            <div class="digital-online-courses-pro-button">
                                <a href="<?php echo esc_url( DIGITAL_ONLINE_COURSES_LIVE_DEMO ); ?>" class="digital-online-courses-button button-primary-1 pro-demo" target="_blank" rel="noreferrer">
                                    <?php esc_html_e( 'PREMIUM DEMO', 'digital-online-courses' ); ?>
                                </a>
                            </div> 
                        </div>
                    </div>
                    <div class="digital-online-courses-admin-card-header-2">
                        <img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $digital_online_courses_theme->get_screenshot() ); ?>" />
                    </div> 
                </div>    
            </div>
        </div>
    </div>
<?php } ?>