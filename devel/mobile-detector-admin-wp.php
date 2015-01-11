<?php

// ADMIN METHODS

if (!class_exists('MobileDTSAdmin')):

class MobileDTSAdmin extends MobileDTS {

	const CLASSNAME = 'MobileDTSAdmin';

    public static function admin_init() {
        self::set_wp_version();
        // Register settings
        register_setting(self::OPTION_GROUP, self::OPTION_NAME, array(self::CLASSNAME, 'admin_options_validation'));
    }

    public static function admin_menu() {
        // Add a submenu under Settings menu
        add_options_page(
            'Mobile Detector - Theme switching settings',
            'Mobile Detector',
            'switch_themes',
            'tubal-mobiledts',
            array(self::CLASSNAME, 'admin_options_page')
        );
    }

    public static function admin_options_page() {
        // Must check that the user has the required capability
        if (!current_user_can('switch_themes')) {
            wp_die( __('You do not have sufficient permissions to access this page.') );
        }
?>
        <div class="wrap">
            <h2>Mobile Detector - Theme switching settings</h2>
            <p>Assuming you have a mobile-optimized theme for your website, you can enable theme switching to provide the following behavior to your site:</p>
            <ol>
                <li>On each page load, this plugin checks for the existence of a cookie that stores which theme (mobile-optimized or desktop-optimized) the user prefers to browse.</li>
                <li>If the cookie exists, the theme the user expects will be displayed.</li>
                <li>If the cookie does not exist (first-time visitor), this plugin checks whether the user is visiting your site with a mobile device or not and, if he is, your mobile-optimized theme will be used. Afterwards, a cookie will be set to store the user's "initial preference".</li>
                <li>Anytime the user switches* between themes, the cookie is updated with his preference so the site version (theme) the user expects will be displayed on future visits.</li>
            </ol>
            <p>*: <span class="description">Give the user the option to switch between themes (create links in the header and/or footer using these <a href="http://wordpress.org/extend/plugins/mobile-detector/" target="_blank">template functions</a>).</span></p>
            <form method="post" action="options.php">
                <?php
                    settings_fields(self::OPTION_GROUP);
                    $options = get_option(self::OPTION_NAME);
                    // Get the list of themes.
                    $themes = self::$wp_version < 30400 ? get_themes() /* WP < 3.4.0 */ : wp_get_themes() /* WP >= 3.4.0 */;
                ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><strong>Mobile</strong> theme <span class="description"><?php _e('(required)'); ?></span></th>
                        <td>
                            <select name="<?php echo self::OPTION_NAME ?>[mobile_theme]">
                                <option value="disabled"><?php _e('- Disabled -') ?></option>
                                <?php if (self::$wp_version < 30400): ?>
                                    <?php foreach($themes as $theme): ?>
                                        <option value="<?php echo $theme['Stylesheet'].'|'.$theme['Template'] ?>" <?php selected( $options['mobile_theme'], $theme['Stylesheet'].'|'.$theme['Template'] ) ?>><?php echo $theme['Name'] ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <?php foreach($themes as $theme): ?>
                                        <option value="<?php echo $theme->get_stylesheet().'|'.$theme->get_template() ?>" <?php selected( $options['mobile_theme'], $theme->get_stylesheet().'|'.$theme->get_template() ) ?>><?php echo $theme->display('Name') ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>                 
                            </select>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
                </p>
            </form>
        </div>
<?php
    }

    public static function admin_options_validation($input) {
        if (empty($input['mobile_theme'])) {
            add_settings_error(self::ERROR_SLUG, 'mobile-theme', __('You must select a mobile theme!'));
        } else if ($input['mobile_theme'] === 'disabled') {
             $input = '';
             add_settings_error(self::ERROR_SLUG, 'mobile-theme', __('Theme switching disabled.'), 'updated');
        } else {
            add_settings_error(self::ERROR_SLUG, 'mobile-theme', __('Settings saved.'), 'updated');
        }

        return $input;
    }
}

endif;