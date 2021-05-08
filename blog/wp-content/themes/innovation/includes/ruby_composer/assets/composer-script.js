// RUBY COMPOSER
var INNOVATION_RUBY_COMPOSER = (function (Composer, $) {
    "use strict";
    /*********** CORE *************/
    Composer = {

        init: function () {
            var self = this;
            self.loader();

            this.$classicEditor = $('#postdivrich');
            self.$classicTemplateBox = $('#page_template');
            this.$globalMetaPanel = $('#rbc-global-meta');

            var switchMode = wp.template('innovation-composer-switch-btn');
            if (self.$classicEditor.length > 0) {
                self.$isGutenberg = false;
                self.addComposerPanel();

                if ('page-composer.php' != self.$classicTemplateBox.val()) {
                    self.$classicEditor.before(switchMode());
                } else {
                    self.$classicEditor.addClass('is-hidden');
                    $(self.$composerID).removeClass('is-hidden');
                }

                self.classicChangeMode();

            } else {
                var rbcAddTimeCounter = setInterval(function () {
                    self.$editor = $('#editor');
                    self.$globalMetaPanel = $('#rbc-global-meta');
                    if (self.$editor.length > 0 && self.$globalMetaPanel.length > 0) {
                        clearInterval(rbcAddTimeCounter);
                        self.$isGutenberg = true;
                        self.addComposerPanel();

                        self.$currentTemplateData = wp.data.select('core/editor').getEditedPostAttribute('template');
                        if ($.isEmptyObject(self.$composerData) && 'page-composer.php' != self.$currentTemplateData) {
                            self.$editor.find('.edit-post-header-toolbar').append(switchMode());
                        } else {
                            self.gutenbergShowComposer();
                        }
                        self.gutenbergChangeMode();
                    }
                }, 10);
            }

        },

        // loader
        loader: function () {

            this.$composerID = '#innovation_ruby_composer_editor';
            this.$composerWrapper = $('#innovation_ruby_composer_editor');

            ///   this.$isGutenberg = innovation_ruby_is_gutenberg;
            this.$composerData = innovation_ruby_composer_page_data;
            this.$composerTemplate = innovation_ruby_composer_template;
            this.$setupBlocks = innovation_ruby_setup_blocks;
            this.$setupSections = innovation_ruby_setup_sections;
            this.$unload = false;
            this.$isDocument = $(document);
            this.$pageBody = $('html,body');

            // this.$hmltEditorID = {};

        },

        // add composer panel
        addComposerPanel: function () {
            var self = this;
            var panelTemplate = wp.template('innovation-composer-panel');
            if (this.$globalMetaPanel.length > 0) {
                self.$globalMetaPanel.append(panelTemplate);
                this.$composerWrapper = $('#innovation_ruby_composer_editor');

                self.setupSectionPanel();
                self.initSections();
                self.unloadChecker();
                self.gutenbergUpdateBtn();
                self.changeComposerInput();


            }

        },

        // classic switch mode
        classicChangeMode: function () {
            var self = this;
            self.$isDocument.on('click', '#innovation_ruby_switch_mode', function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.$classicTemplateBox.val('page-composer.php');
                self.$classicTemplateBox.trigger('change');
                $(this).remove();
            });

            self.$classicTemplateBox.on('change', function () {
                if ('page-composer.php' == $(this).val()) {
                    $(self.$composerID).removeClass('is-hidden');
                    self.$classicEditor.addClass('is-hidden');
                } else {
                    $(self.$composerID).addClass('is-hidden');
                    self.$classicEditor.removeClass('is-hidden');
                }
                $('#innovation_ruby_switch_mode').remove();
            });
        },


        // setup section panel for composer
        setupSectionPanel: function () {
            var self = this;
            var sectionSelectionPanel = $('#innovation_ruby_section_select');

            $.each(self.$setupSections, function (sectionType, config) {
                var section = $('<div class="section-select-el"><a href="#"></a></div>');
                if (config.img) {
                    section = $('<div class="section-select-el"><a href="#"><img alt="' + sectionType + '" src="' + config.img + '"></a></div>');
                }
                section.find('a').data('section_type', sectionType).append('<span>' + config.title + '</span>');
                sectionSelectionPanel.append(section);
            });

            // click to add
            sectionSelectionPanel.find('a').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.addNewSection(this);
            });

            var section_select = sectionSelectionPanel.prev('#page_composer_section_select');
            section_select.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                sectionSelectionPanel.slideToggle(200);
            });

            self.jsLoaded();
            //self.changeComposerInput();
        },

        // click add section
        addNewSection: function (target) {
            var self = this;
            self.$unload = true;
            var sectionType = $(target).data('section_type');
            var newSection = self.loadSection(sectionType, {});
            self.scrollToSection(newSection.attr('id'));
            self.$isDocument.trigger('RBC:addSection');
        },


        // init section
        initSections: function () {
            var self = this;
            var sections = self.$composerWrapper.find('.ruby-sections-wrap');
            self.renderSections();

            sections.sortable({
                handle: '.ruby-section-bar',
                placeholder: 'ruby-highlight',
                forcePlaceholderSize: true,
                update: function () {
                    self.$unload = true;
                    sections.sortable('refresh');

                }
            });
        },

        // render sections
        renderSections: function () {

            var self = this;
            if (typeof (self.$composerData) == 'object') {
                $.each(self.$composerData, function (sectionID, sectionData) {
                    self.loadSection(sectionData['section_type'], sectionData);
                });
            }

            self.$composerWrapper.find('.ruby-composer-loading').fadeTo(400, 0, function () {
                $(this).remove();
            })
        },

        // load each section
        loadSection: function (sectionType, sectionData) {

            if (!this.$composerTemplate[sectionType]) {
                return;
            }

            var self = this;
            var uuid;
            if (typeof sectionData['section_id'] == 'undefined') {
                uuid = self.uuid();
            } else {
                uuid = sectionData['section_id'];
            }

            var sectionID = 'innovation_ruby_section_' + uuid;
            var newSection = $(self.$composerTemplate[sectionType]);
            if (sectionType == 'section_has_sidebar') {
                var sidebarID = 'innovation_ruby_sidebar_' + uuid;
                var sidebarPosID = 'innovation_ruby_sidebar_position_' + uuid;
                var defaultSidebar = 'innovation_ruby_sidebar_default';

                if (typeof sectionData['section_sidebar'] != 'undefined') {
                    defaultSidebar = sectionData['section_sidebar'];
                }

                newSection.find('.ruby-section-sidebar').html(self.$composerTemplate['input']['sidebar']);
                newSection.find('.ruby-sidebar-position').attr('name', sidebarPosID);
                newSection.find('.ruby-sidebar-select').attr('name', sidebarID).val(defaultSidebar);

                if (typeof sectionData['section_sidebar_position'] != 'undefined') {
                    newSection.find('.ruby-sidebar-position').val(sectionData['section_sidebar_position']);
                }
            }

            newSection.find('.ruby-section-type').attr('name', sectionID).val(sectionType);
            newSection.find('.ruby-section-order').val(uuid);
            newSection.find('.ruby-section-label').html(self.$setupSections[sectionType].title);

            var sectionWrapper = self.$composerWrapper.find('.ruby-sections-wrap');
            sectionWrapper.find('.ruby-section-empty').remove();
            sectionWrapper.append(newSection);
            self.sectionUserBtn(newSection);
            newSection.section_type = sectionType;

            self.initComposerBlocks(newSection, sectionData);
            newSection.attr('id', uuid);

            return newSection;
        },

        // section buttons
        sectionUserBtn: function (newSection) {
            var self = this;
            newSection.find('.ruby-section-bar, .ruby-section-open-option').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.sectionExplainToggle(this);
            });

            newSection.find('.ruby-section-delete').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.deleteSection(this);
            });
        },

        // open section
        sectionExplainToggle: function (target) {
            var blockListing = $(target).parents('.ruby-section').find('.ruby-block-wrap');
            blockListing.slideToggle(200);
        },

        // delete section
        deleteSection: function (target) {
            var self = this;
            var confirmDelete = confirm(self.$composerTemplate.confirm_section_delete);
            if (confirmDelete) {
                this.$unload = true;
                $(target).parents('.ruby-section').fadeOut(300, function () {
                    $(this).remove()
                });
                self.$isDocument.trigger('RBC:deleteSection');
            }
        },

        // scroll to section
        scrollToSection: function (sectionID) {
            var section = $(document).find('#' + sectionID);
            if ('undefined' != typeof section) {
                section = $(section);
                if (this.$isGutenberg) {
                    $('.edit-post-layout__content').animate({
                        scrollTop: section.position().top + $(window).height() - 300
                    }, 300);
                } else {
                    this.$pageBody.animate({
                        scrollTop: section.offset().top - 100
                    }, 300);
                }
            }
        },


        // init blocks
        initComposerBlocks: function (newSection, sectionData) {

            var self = this;
            self.setupComposerBlocks(newSection);
            var blockContainer = newSection.find('.ruby-block');
            self.renderBlocks(newSection, sectionData);

            blockContainer.sortable({
                handle: '.ruby-block-bar',
                placeholder: 'ruby-highlight',
                forcePlaceholderSize: true,
                update: function () {
                    self.$unload = true;
                    blockContainer.sortable('refresh');

                }
            })
        },

        // section block panel
        setupComposerBlocks: function (newSection) {
            var self = this;
            var blockPanelWrapper = newSection.find('.block-select-wrap');
            $.each(self.$setupBlocks, function (blockName, config) {
                if (config.section === newSection.section_type) {
                    var htmlTag = $('<div class="block-select-el"><a href="#"></a></div>');
                    if (config.img) {
                        htmlTag = $('<div class="block-select-el"><a href="#"><img alt="' + blockName + '" src="' + config.img + '"></a></div>');
                    }
                    htmlTag.find('a').data('block_name', blockName).append('<span>' + config.title + '</span>');
                    blockPanelWrapper.append(htmlTag);
                }
            });

            // add new block
            blockPanelWrapper.find('a').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.addNewBlock(this);
            });

            // slide toggle block listing panel
            newSection.find('.add-block-select').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).next('.block-select-wrap').slideToggle(200);
            })
        },

        // render all current blocks
        renderBlocks: function (newSection, sectionData) {
            var self = this;
            if (typeof (sectionData) == 'object' && typeof  sectionData['blocks'] == 'object') {
                $.each(sectionData['blocks'], function (blockID, blockData) {
                    if (typeof blockData['block_name'] != 'undefined') {
                        self.loadBlock(blockData['block_name'], newSection.find('.ruby-block-wrap'), blockData);
                    }
                })
            }

            newSection.find('.ruby-composer-loading').fadeTo(400, 0, function () {
                $(this).remove();
            })
        },

        // click add block
        addNewBlock: function (target) {
            var self = this;
            self.$unload = true;
            var blockTarget = $(target);
            var blockName = blockTarget.data('block_name');
            var blockWrapper = blockTarget.parents('.ruby-block-wrap');
            var newBlock = self.loadBlock(blockName, blockWrapper, {});
            self.scrollToBlock(newBlock.attr('id'));
            self.$isDocument.trigger('RBC:addBlock');
        },


        // load block
        loadBlock: function (blockName, blockWrapper, blockData) {
            var self = this;
            var uuid;

            if (!blockData['block_id']) {
                uuid = self.uuid();
            } else {
                uuid = blockData['block_id'];
            }

            var blockID = 'innovation_ruby_block_' + uuid;
            var blockHeading = self.$setupBlocks[blockName].title;
            var blockDescription = self.$setupBlocks[blockName].description;

            var sectionID = blockWrapper.find('.ruby-section-order').val();
            var newBlock = $(self.$composerTemplate['block']);
            var blockContainer = blockWrapper.find('.ruby-block');

            newBlock.find('.ruby-block-name').attr('name', blockID).val(blockName);
            newBlock.find('.ruby-block-order').attr('name', 'innovation_ruby_block_order[' + sectionID + '][]').val(uuid);
            newBlock.find('.ruby-block-description').html(blockDescription);
            newBlock.find('.ruby-block-label').html(blockHeading);

            if (typeof blockData['block_options'] == 'undefined') {
                blockData['block_options'] = {};
            }

            if (typeof blockData['block_options']['title'] != 'undefined' && '' != blockData['block_options']['title']) {
                newBlock.find('.ruby-block-label').html(blockHeading + ' : ' + blockData['block_options']['title']);
            }

            self.loadBlockOptions(newBlock, blockName, blockData['block_options']);
            blockContainer.append(newBlock);
            blockWrapper.find('.ruby-section-empty').remove();

            self.blockUserBtn(newBlock);

            newBlock.attr('id', uuid);

            return newBlock;
        },

        // enable button block
        blockUserBtn: function (block) {
            var self = this;
            block.find('.ruby-block-bar, .ruby-block-open-option').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.toggleBlockSetting(this);
            });

            block.find('.ruby-block-delete').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.deleteBlock(this);
            });
        },

        // open block
        toggleBlockSetting: function (target) {
            var settingPanel = $(target).parents('.ruby-block-item').find('.ruby-block-options-wrap');
            if (settingPanel) {
                settingPanel.slideToggle(200);
            }
        },

        // delete block
        deleteBlock: function (target) {
            var self = this;

            self.$unload = true;
            $(target).parents('.ruby-block-item').fadeOut(400, function () {
                $(this).remove()
            });
            self.$isDocument.trigger('RBC:deleteBlock');
        },

        // scroll to block
        scrollToBlock: function (blockID) {
            var self = this;
            var block = $(document).find('#' + blockID);
            if ('undefined' != typeof block) {
                block = $(block);
                if (self.$isGutenberg) {
                    var secParent = block.parents('.ruby-section');
                    $('.edit-post-layout__content').animate({
                        scrollTop: secParent.position().top + block.position().top + $(window).height() - 300
                    }, 300);
                } else {
                    self.$pageBody.animate({
                        scrollTop: block.offset().top - 100
                    }, 300);
                }
            }

            setTimeout(function () {
                block.find('.ruby-block-open-option').trigger('click');
            }, 300);
        },

        // block settings
        loadBlockOptions: function (newBlock, blockName, blockDataOptions) {
            var self = this;
            if (!self.$setupBlocks[blockName]) {
                return;
            }

            var config = self.$setupBlocks[blockName];
            var activeFilter = true;
            if (!config['block_options']) {
                return
            }

            var blockID = newBlock.find('.ruby-block-name').attr('name');
            newBlock.find('.ruby-block-options-wrap').removeClass('hidden');

            $.each(config['block_options'], function (tab, options) {
                if ('object' != typeof (options)) {
                    return;
                }
                self.addTabFilter(newBlock, tab, activeFilter);
                activeFilter = false;

                // render each option
                $.each(options, function (option, defaultVal) {

                    var title, input, description;
                    var optionTemplate = $(self.$composerTemplate['block_option']);

                    switch (option) {
                        case 'title' :
                            title = self.$composerTemplate['title']['title'];
                            description = self.$composerTemplate['desc']['title'];
                            input = self.$composerTemplate['input']['text'];
                            break;
                        case 'title_url' :
                            title = self.$composerTemplate['title']['title_url'];
                            description = self.$composerTemplate['desc']['title_url'];
                            input = self.$composerTemplate['input']['text'];
                            break;
                        case 'sub_title' :
                            title = self.$composerTemplate['title']['sub_title'];
                            description = self.$composerTemplate['desc']['sub_title'];
                            input = self.$composerTemplate['input']['text'];
                            break;
                        case 'category_id' :
                            title = self.$composerTemplate['title']['category_id'];
                            description = self.$composerTemplate['desc']['category_id'];
                            input = self.$composerTemplate['input']['category'];
                            break;
                        case 'child_category' :
                            title = self.$composerTemplate['title']['child_category'];
                            description = self.$composerTemplate['desc']['child_category'];
                            input = self.$composerTemplate['input']['show_options'];
                            break;
                        case 'num_of_child_category' :
                            title = self.$composerTemplate['title']['num_of_child_category'];
                            description = self.$composerTemplate['desc']['num_of_child_category'];
                            input = self.$composerTemplate['input']['num'];
                            break;
                        case 'category_ids' :
                            title = self.$composerTemplate['title']['category_ids'];
                            description = self.$composerTemplate['desc']['category_ids'];
                            input = self.$composerTemplate['input']['categories'];
                            break;
                        case 'tags' :
                            title = self.$composerTemplate['title']['tags'];
                            description = self.$composerTemplate['desc']['tags'];
                            input = self.$composerTemplate['input']['text'];
                            break;
                        case 'authors' :
                            title = self.$composerTemplate['title']['authors'];
                            description = self.$composerTemplate['desc']['authors'];
                            input = self.$composerTemplate['input']['authors'];
                            break;
                        case 'posts_per_page' :
                            title = self.$composerTemplate['title']['posts_per_page'];
                            description = self.$composerTemplate['desc']['posts_per_page'];
                            input = self.$composerTemplate['input']['num'];
                            break;
                        case 'num_of_slider' :
                            title = self.$composerTemplate['title']['num_of_slider'];
                            description = self.$composerTemplate['desc']['num_of_slider'];
                            input = self.$composerTemplate['input']['num'];
                            break;
                        case 'offset' :
                            title = self.$composerTemplate['title']['offset'];
                            description = self.$composerTemplate['desc']['offset'];
                            input = self.$composerTemplate['input']['num'];
                            break;
                        case 'orderby' :
                            title = self.$composerTemplate['title']['orderby'];
                            description = self.$composerTemplate['desc']['orderby'];
                            input = self.$composerTemplate['input']['orderby'];
                            break;
                        case 'excerpt' :
                            title = self.$composerTemplate['title']['excerpt'];
                            description = self.$composerTemplate['desc']['excerpt'];
                            input = self.$composerTemplate['input']['num'];
                            break;
                        case 'readmore' :
                            title = self.$composerTemplate['title']['readmore'];
                            description = self.$composerTemplate['desc']['readmore'];
                            input = self.$composerTemplate['input']['show_options'];
                            break;
                        case 'content' :
                            title = self.$composerTemplate['title']['content'];
                            description = self.$composerTemplate['desc']['content'];
                            input = self.$composerTemplate['input']['text'];
                            break;
                        case 'image_url' :
                            title = self.$composerTemplate['title']['image_url'];
                            description = self.$composerTemplate['desc']['image_url'];
                            input = self.$composerTemplate['input']['text'];
                            break;
                        case 'image_link' :
                            title = self.$composerTemplate['title']['image_link'];
                            description = self.$composerTemplate['desc']['image_link'];
                            input = self.$composerTemplate['input']['text'];
                            break;

                        case 'button_title' :
                            title = self.$composerTemplate['title']['button_title'];
                            description = self.$composerTemplate['desc']['button_title'];
                            input = self.$composerTemplate['input']['text'];
                            break;
                        case 'pagination' :
                            title = self.$composerTemplate['title']['pagination'];
                            description = self.$composerTemplate['desc']['pagination'];
                            var inputBuffer = self.$composerTemplate['input']['pagination'];

                            // remove selection
                            inputBuffer = $.parseHTML(inputBuffer);
                            $.each(defaultVal, function (type, val) {
                                if (val == false) {
                                    $(inputBuffer).find('option[value=' + type + ']').remove();
                                }
                            });
                            input = $(inputBuffer)[0].outerHTML;
                            break;

                        case 'custom_html' :
                            title = self.$composerTemplate['title']['custom_html'];
                            description = self.$composerTemplate['desc']['custom_html'];
                            input = self.$composerTemplate['input']['textarea'];
                            break;

                        case 'short_code' :
                            title = self.$composerTemplate['title']['short_code'];
                            description = self.$composerTemplate['desc']['short_code'];
                            input = self.$composerTemplate['input']['textarea'];
                            break;

                        case 'block_style' :
                            title = self.$composerTemplate['title']['block_style'];
                            description = self.$composerTemplate['desc']['block_style'];
                            input = self.$composerTemplate['input']['block_style'];
                            break;

                        case 'wrap_mode' :
                            title = self.$composerTemplate['title']['wrap_mode'];
                            description = self.$composerTemplate['desc']['wrap_mode'];
                            input = self.$composerTemplate['input']['wrap_mode'];
                            break;

                        case 'big_first' :
                            title = self.$composerTemplate['title']['big_first'];
                            description = self.$composerTemplate['desc']['big_first'];
                            input = self.$composerTemplate['input']['show_options'];
                            break;

                        case 'ad_title' :
                            title = self.$composerTemplate['title']['ad_title'];
                            description = self.$composerTemplate['desc']['ad_title'];
                            input = self.$composerTemplate['input']['text'];
                            break;

                        case 'ad_image' :
                            title = self.$composerTemplate['title']['ad_image'];
                            description = self.$composerTemplate['desc']['ad_image'];
                            input = self.$composerTemplate['input']['text'];
                            break;

                        case 'ad_url' :
                            title = self.$composerTemplate['title']['ad_url'];
                            description = self.$composerTemplate['desc']['ad_url'];
                            input = self.$composerTemplate['input']['text'];
                            break;

                        case 'ad_script' :
                            title = self.$composerTemplate['title']['ad_script'];
                            description = self.$composerTemplate['desc']['ad_script'];
                            input = self.$composerTemplate['input']['textarea'];
                            break;
                        default:
                            title = '';
                            description = '';
                            input = '';
                    }

                    // create options
                    input = $(input);

                    // set name
                    switch (option) {
                        case 'category_ids' :
                            input.attr('name', 'innovation_ruby_block_option[' + blockID + '][' + option + '][]');
                            break;
                        case  'custom_html' :
                            input.attr('id', 'html-' + blockID);
                            input.attr('name', 'innovation_ruby_block_option[' + blockID + '][' + option + ']');
                            break;
                        default :
                            input.attr('name', 'innovation_ruby_block_option[' + blockID + '][' + option + ']');
                    }

                    // set default
                    if (typeof defaultVal != 'boolean' && typeof defaultVal != 'object' && typeof defaultVal != 'array') {
                        input.val(defaultVal);
                    }

                    if (typeof blockDataOptions != 'undefined' && typeof blockDataOptions[option] != 'undefined') {
                        input.val(blockDataOptions[option]);
                    }

                    optionTemplate.find('.ruby-block-option-label').append(title);
                    optionTemplate.find('.ruby-block-option-description').append(description);
                    optionTemplate.find('.ruby-block-option-inner').append(input);
                    newBlock.find('.ruby-tab-' + tab).append(optionTemplate);
                });
            });

            self.tabFilterToggle(newBlock);
            //if ('classic' == self.$isGutenberg) {
            //    self.loadHTMLEditor(newBlock);
            //}

            return newBlock;
        },


        // add tab filter
        addTabFilter: function (block, tab, activeFilter) {
            var loadSlippingTab = '<a href="#" class="ruby-tab-filter-el" data-filter="ruby-tab-' + tab + '">' + tab + '</a>';
            if (true == activeFilter) {
                loadSlippingTab = '<a href="#" class="ruby-tab-filter-el filter-active" data-filter="ruby-tab-' + tab + '">' + tab + '</a>';
            }
            var tabWrapperTag = '<div class="ruby-tab ruby-tab-' + tab + '"></div>';

            // add tab and filter
            block.find('.ruby-filter-link').append(loadSlippingTab);
            block.find('.ruby-block-content').append(tabWrapperTag);

        },

        // load Slipping tab
        tabFilterToggle: function (block) {
            block.find('.ruby-tab-filter-el').on('click', function (e) {

                e.preventDefault();
                e.stopPropagation();

                var filterEl = $(this);
                var filterName = filterEl.data('filter');
                var tab = filterEl.parent();
                tab.find('a').removeClass('filter-active');
                filterEl.addClass('filter-active');

                // show hide block
                block.find('.ruby-tab').hide();
                block.find('.' + filterName).show();
            })
        },

        // create unique ID
        uuid: function () {
            return 'ruby_' + 'xxxxxxxx'.replace(/[xy]/g, function (c) {
                var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        },


        // unload check
        unloadChecker: function () {
            var self = this;

            $('body').find('#publishing-action, .editor-post-save-draft, .editor-post-publish-panel__toggle').on('click', function () {
                self.$unload = false;
            });

            $(window).on('beforeunload', function () {
                if (true === self.$unload) {
                    self.$unload = false;
                    return self.$composerTemplate['unload'];
                }
            })
        },

        // change input
        changeComposerInput: function () {
            var self = this;
            self.$isDocument.on('change', '.ruby-field', function () {
                self.$isDocument.trigger('RBC:changeInput');
                self.$unload = true;
            });
        },

        // show composer
        gutenbergShowComposer: function () {
            this.$editor.find('.editor-block-list__layout, .editor-post-text-editor').addClass('is-hidden');
            this.$editor.find('.edit-post-text-editor').addClass('is-maxwidth');
            this.$editor.find('.ruby-composer-editor').removeClass('is-hidden');
        },


        /** add page attrs */
        gutenbergAddPageAttrs: function () {
            wp.data.dispatch('core/editor').editPost({template: 'page-composer.php'});
            var pageTitle = wp.data.select('core/editor').getEditedPostAttribute('title');
            if (!pageTitle) {
                wp.data.dispatch('core/editor').editPost({
                    title: 'Ruby Composer Daft #' + $('#post_ID').val()
                });
            }
        },


        gutenbergChangeMode: function () {
            var self = this;
            $(document).on('click', '#innovation-composer-switch-mode', function (e) {
                e.preventDefault();
                e.stopPropagation();
                self.gutenbergShowComposer();
                self.gutenbergAddPageAttrs();
                $(this).remove();
            });

            $('.editor-page-attributes__template select').on('change', function () {
                if ('page-composer.php' == $(this).val()) {
                    self.gutenbergShowComposer();
                    self.$editor.find('#innovation-composer-switch-mode').remove();
                } else {
                    self.gutenbergHideComposer();
                }
            });
        },



        // hide composer
        gutenbergHideComposer: function () {
            this.$editor.find('.editor-block-list__layout, .editor-post-text-editor').removeClass('is-hidden');
            this.$editor.find('.edit-post-text-editor').removeClass('is-maxwidth');
            this.$editor.find('.ruby-composer-editor').addClass('is-hidden');
        },


        // update button
        gutenbergUpdateBtn: function () {
            var self = this;
            self.$isDocument.on('RBC:addBlock RBC:addSection RBC:deleteSection RBC:deleteBlock RBC:changeInput', function () {
                wp.data.dispatch('core/editor').editPost({rbc_edit_update: 1});
            });
        },

        jsLoaded: function () {
            var jsLoadedTemp = wp.template('rbc-js-loaded');
            this.$composerWrapper.prepend(jsLoadedTemp);
        }


    };

    return Composer;

}(INNOVATION_RUBY_COMPOSER || {}, jQuery));


jQuery(document).ready(function () {
    INNOVATION_RUBY_COMPOSER.init();
});
