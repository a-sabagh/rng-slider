<?php
/*
  Plugin Name: rng-slider
  Plugin URI: http://gnutec.ir
  Description: wordpress plugin for your slider backend
  Version: 0.1
  Author: abolfazl sabagh
  Author URI: http://gnutec.ir
 */
require_once 'admin-head.php';

function rng_add_menu_page() {
    add_menu_page('Slider_option', 'تنظیمات اسلایدر', 'administrator', 'slider-options', 'rng_slider_option', 'dashicons-format-gallery', 9);
}

function rng_slider_option() {
    wp_enqueue_media();
    if(isset($_POST['slider_submit']) && isset($_POST['slider_submit_hidden']) && $_POST['slider_submit_hidden'] == 'TRUE' ){
        update_option('slider_img_src' , $_POST['slider_src']);
        update_option('slider_title' , $_POST['slider_title']);
        update_option('slider_content' , $_POST['slider_content']);
        update_option('slider_link' , $_POST['slider_link']);
    }
    $array_img_sr = get_option('slider_img_src');
    $array_title = get_option('slider_title');
    $array_content = get_option('slider_content');
    $array_link = get_option('slider_link');
    $count = count($array_img_sr); ?>

    <h2>تنظیمات اسلایدر</h2>
    <p>برای هر اسلاید یک تصویر ، تیتر ، متن و لینک دکمه انتخاب کنید</p>
    <form method="post" action="">
        <ul class="accordian" id="sortable">
            <?php for ($i=0;$i<$count;$i++){ ?>
            <li>
                <h3 class="element">&dArr; اسلاید</h3>
                <div class="accordian-panel">
                    <p>تصویر اسلایدر را انتخاب کنید</p>
                    <input type="button" class="rng-button-banner wp-core-ui button rng-poster-btn" value="انتخاب عکس"/>
                    <input type="text" class="rng-link-banner rng-poster-holder" name="slider_src[]" value="<?php echo $array_img_sr[$i]; ?>" />
                    <p>تیتر عکس را وارد کنید</p>
                    <input class="full-input" type="text" name="slider_title[]" value="<?php echo $array_title[$i] ?>" />
                    <p>متن عکس  را وارد کنید</p>
                    <textarea class="full-textarea" name="slider_content[]"><?php echo $array_content[$i]; ?></textarea>
                    <p>لینک دکمه را وارد کنید</p>
                    <input class="full-input" type="text" name="slider_link[]" value="<?php echo $array_link[$i] ?>" />
                </div><!--.accordian-panel-->
                <input type="button" class="slider-remove-el" value="حذف اسلاید" />
            </li>
            <?php } ?>
            <li class="last-element static">
                <h3 class="add-slide">افزودن اسلاید+</h3>
            </li>
        </ul><!--.accordian-->
        <input class="button button-primary button-large" type="submit" name="slider_submit" value="ذخیره تنظیمات" />
        <input type="hidden" name="slider_submit_hidden" value="TRUE" />
    </form><!--form-->
    <?php
}

add_action('admin_menu', 'rng_add_menu_page', 11);
