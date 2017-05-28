jQuery(document).ready(function ($) {
    $(".accordian li").removeClass("active");
    $(".accordian li .accordian-panel").hide();
    $(".accordian").on('click', ".element", function () {
        console.log('it work');
        var content = $(this).siblings("div.accordian-panel");
        if (content.length) {

            if (content.is(":hidden")) {
                $(this).parent('li').addClass("active").children("div.accordian-panel").slideDown(400);
            } else {
                $(this).parent('li').removeClass("active").children("div.accordian-panel").slideUp(400);
            }
        }
    });
    $(".accordian li.last-element h3.add-slide").on('click', function () {
        var element = '<li><h3 class="element" >&dArr; اسلاید</h3>';
        element += '<div class="accordian-panel"><p>تصویر اسلایدر را انتخاب کنید</p>';
        element += '<input type="button" class="rng-button-banner wp-core-ui button rng-poster-btn" value="انتخاب عکس"/>';
        element += '<input type="text" class="rng-link-banner rng-poster-holder" name="slider_src[]" value="" />';
        element += '<p>تیتر عکس را وارد کنید</p>';
        element += '<input class="full-input" type="text" name="slider_title[]"  />';
        element += '<p>متن عکس  را وارد کنید</p>';
        element += '<textarea class="full-textarea" name="slider_content[]"></textarea>';
        element += '<p>لینک دکمه را وارد کنید</p>';
        element += '<input class="full-input" type="text" name="slider_link[]" />';
        element += '</div><input type="button" class="slider-remove-el" value="حذف اسلاید" /></li>';
        $(".accordian li.last-element").parent().prepend(element).show('slow');
    });
    $(".accordian").on('click', '.slider-remove-el', function (e) {
        e.preventDefault();
        $(this).parents('li').remove();
    });

    /**
     * FILE FRAME
     */
    var file_frame;
    $('.rng-button-banner').live('click', function (event) {
        event.preventDefault();
        window.next_element = $(this).next('.rng-link-banner');
        if (file_frame) {
            file_frame.open();
            return;
        }
        file_frame = wp.media.frames.file_frame = wp.media();

        file_frame.on('select', function () {
            attachment = file_frame.state().get('selection').first().toJSON();
            next_element.val(attachment.url);
        });
        file_frame.open();
    });
    $("#sortable").sortable({
        items: "li:not(.static)"
    });
});//jQuery