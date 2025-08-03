<?php
/*
Plugin Name: Floating WhatsApp Icon
Description: Add number to Settings > WhatsApp Icon. 
Version: 1.1.2
Author: Georgian.o.
*/

// Enqueue CSS and Font Awesome
function enqueue_whatsapp_icon_assets() {
    wp_enqueue_style('whatsapp-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    wp_add_inline_style('whatsapp-font-awesome', '
        #whatsapp .wtsapp{
            position: fixed;
            transform: all .5s ease;
            background-color: #25d366;
            display: block;
            text-align: center;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
            border-radius:50%;
            font-weight: 700;
            font-size: 30px;
            bottom: 70px;
            left: 20px;
            border: 0;
            z-index: 9999;
            width: 40px;
            height: 40px;
            line-height: 40px;
            color: #ffffff;
        }
        #whatsapp .fa-whatsapp {
            font-size: 24px;
            line-height: 40px;
        }
        #whatsapp .wtsapp:before {
            content: "";
            position: absolute;
            z-index: -1;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            display: block;
            width:95%;
            height:95%;
            background-color: #25d366;
            border-radius: 50px;
            animation: pulse-border 1500ms ease-out infinite;
        }
        @keyframes pulse-border{
            0%{transform: translateX(-50%) translateY(-50%) scale(1); opacity: 1;}
            100%{transform: translateX(-50%) translateY(-50%) scale(1.5); opacity: 0;}
        }
    ');

    // Add WhatsApp icon HTML to the footer
    add_action('wp_footer', 'add_whatsapp_icon_html');
}

// Display the WhatsApp icon with dynamic phone number
function add_whatsapp_icon_html() {
    $whatsapp_number = get_option('whatsapp_phone_number', '');
    if ($whatsapp_number) {
        $clean_number = preg_replace('/\D/', '', $whatsapp_number); // Remove +, spaces, dashes etc.
        echo '
        <div id="whatsapp">
            <a href="https://api.whatsapp.com/send/?phone=' . esc_attr($clean_number) . '" target="_blank" class="wtsapp">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>';
    }
}
add_action('wp_enqueue_scripts', 'enqueue_whatsapp_icon_assets');

// Create a settings page in the WordPress dashboard
function whatsapp_icon_settings_page() {
    add_options_page(
        'WhatsApp Icon Settings',   // Page title
        'WhatsApp Icon',            // Menu title
        'manage_options',           // Capability
        'whatsapp-icon-settings',   // Menu slug
        'whatsapp_icon_settings_page_html' // Callback function
    );
}
add_action('admin_menu', 'whatsapp_icon_settings_page');

// Render the settings page HTML
function whatsapp_icon_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['whatsapp_phone_number'])) {
        $raw = $_POST['whatsapp_phone_number'];
        update_option('whatsapp_phone_number', sanitize_text_field($raw));
        echo '<div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>';
    }

    $whatsapp_number = get_option('whatsapp_phone_number', '');
    ?>
    <div class="wrap">
        <h1>WhatsApp Icon Settings</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">WhatsApp Phone Number</th>
                    <td>
                        <input type="text" name="whatsapp_phone_number" value="<?php echo esc_attr($whatsapp_number); ?>" placeholder="+1234567890" />
                        <p class="description">Enter your WhatsApp phone number in international format (e.g., +1234567890). The <strong>+</strong> and spaces will be cleaned automatically.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
