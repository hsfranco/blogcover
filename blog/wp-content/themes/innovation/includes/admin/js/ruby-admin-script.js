jQuery(document).ready(function ($) {
    "use strict";

    //post filter
    var ruby_gallery_post = $('#innovation_ruby_metabox_gallery_options');
    var ruby_video_post = $('#innovation_ruby_metabox_video_options');
    var ruby_audio_post = $('#innovation_ruby_metabox_audio_options');

    var select = $('#post-formats-select').find('[type="radio"]');
    select.live('change', function () {
        var val = $(this).val();
        ruby_gallery_post.hide();
        ruby_video_post.hide();
        ruby_audio_post.hide();

        if ('gallery' == val) {
            ruby_gallery_post.show();
        } else if ('video' == val) {
            ruby_video_post.show();
        } else if ('audio' == val) {
            ruby_audio_post.show();
        }
    }).filter(':checked').trigger('change');


    setTimeout(function () {
        if ($('#editor').length > 0) {

            var innovation_ruby_gallery_post = $('#innovation_ruby_metabox_gallery_options');
            var innovation_ruby_video_post = $('#innovation_ruby_metabox_video_options');
            var innovation_ruby_audio_post = $('#innovation_ruby_metabox_audio_options');

            innovation_ruby_gallery_post.hide();
            innovation_ruby_video_post.hide();
            innovation_ruby_audio_post.hide();

            var postFormat = wp.data.select('core/editor').getEditedPostAttribute('format');
            if (postFormat) {
                if ('gallery' == postFormat) {
                    innovation_ruby_gallery_post.show();
                } else if ('video' == postFormat) {
                    innovation_ruby_video_post.show();
                } else if ('audio' == postFormat) {
                    innovation_ruby_audio_post.show();
                }
            }

            $(document).on('change', '.editor-post-format select', function () {
                var val = $(this).val();
                innovation_ruby_gallery_post.hide();
                innovation_ruby_video_post.hide();
                innovation_ruby_audio_post.hide();

                if ('gallery' == val) {
                    innovation_ruby_gallery_post.show();
                    $('.edit-post-layout__content').animate({
                        scrollTop: innovation_ruby_gallery_post.offset().top
                    }, 300);
                } else if ('video' == val) {
                    innovation_ruby_video_post.show();
                    $('.edit-post-layout__content').animate({
                        scrollTop: innovation_ruby_video_post.offset().top
                    }, 300);
                } else if ('audio' == val) {
                    innovation_ruby_audio_post.show();
                    $('.edit-post-layout__content').animate({
                        scrollTop: innovation_ruby_audio_post.offset().top
                    }, 300);
                }
            });

        }
    }, 50);

    //review post
    var score_wrap = $('#innovation_ruby_metabox_review_options .inside .rwmb-meta-box > div:gt(0)');
    var ruby_review_checkbox = $('#innovation_ruby_enable_review');

    //hide reviews
    score_wrap.wrapAll('<div class="ruby-enabled-review">').hide();

    if (ruby_review_checkbox.is(":checked")) {
        score_wrap.show();
    }

    ruby_review_checkbox.click(function () {
        score_wrap.toggle();
    });

    function innovation_ruby_agv_score() {
        var i = 0;
        var ruby_cs1 = 0, ruby_cs2 = 0, ruby_cs3 = 0, ruby_cs4 = 0, ruby_cs5 = 0, ruby_cs6 = 0;

        var ruby_cd1 = $('input[name=innovation_ruby_cd1]').val();
        var ruby_cd2 = $('input[name=innovation_ruby_cd2]').val();
        var ruby_cd3 = $('input[name=innovation_ruby_cd3]').val();
        var ruby_cd4 = $('input[name=innovation_ruby_cd4]').val();
        var ruby_cd5 = $('input[name=innovation_ruby_cd5]').val();
        var ruby_cd6 = $('input[name=innovation_ruby_cd6]').val();
        if (ruby_cd1) {
            i += 1;
            ruby_cs1 = parseFloat($('input[name=innovation_ruby_cs1]').val());
        } else {
            ruby_cd1 = null;
        }
        if (ruby_cd2) {
            i += 1;
            ruby_cs2 = parseFloat($('input[name=innovation_ruby_cs2]').val());
        } else {
            ruby_cd2 = null;
        }
        if (ruby_cd3) {
            i += 1;
            ruby_cs3 = parseFloat($('input[name=innovation_ruby_cs3]').val());
        } else {
            ruby_cd3 = null;
        }
        if (ruby_cd4) {
            i += 1;
            ruby_cs4 = parseFloat($('input[name=innovation_ruby_cs4]').val());
        } else {
            ruby_cd4 = null;
        }
        if (ruby_cd5) {
            i += 1;
            ruby_cs5 = parseFloat($('input[name=innovation_ruby_cs5]').val());
        } else {
            ruby_cd5 = null;
        }
        if (ruby_cd6) {
            i += 1;
            ruby_cs6 = parseFloat($('input[name=innovation_ruby_cs6]').val());
        } else {
            ruby_cd6 = null;
        }
        var ruby_as = $('#innovation_ruby_as');

        var ruby_temp_total = (ruby_cs1 + ruby_cs2 + ruby_cs3 + ruby_cs4 + ruby_cs5 + ruby_cs6);
        var ruby_total = Math.round((ruby_temp_total / i) * 10) / 10;

        ruby_as.val(ruby_total);

        if (isNaN(ruby_total)) {
            ruby_as.val('');
        }
    }

    $('.rwmb-input').on('change', innovation_ruby_agv_score);

    $('#innovation_ruby_cs1, #innovation_ruby_cs2, #innovation_ruby_cs3, #innovation_ruby_cs4, #innovation_ruby_cs5, #innovation_ruby_cs6').on('slidechange', innovation_ruby_agv_score);

});


