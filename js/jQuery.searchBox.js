// searchBox, a simple OS inspired search input
// version 1.0
// (c) Alex Brown [alex@souliss.com], open sourced from huddle.com
// released under the MIT license

(function ($) {

    $.fn.extend({

        searchBox: function (options) {

            var defaults = {
                activeClass:            'active',       // Search box active class
                inFocusClass:           'infocus',      // Search box in focus class
                disabledButtonClass:    'disabled',     // Disabled button class
                explicitDefaultValue:   'Concept Search...',    // Only value to treat as default   [ string eg; 'Search...' | false ]
                disableBlankSearch:     true,           // Disable blank searches           [ true | false ]
                searchInputSelector:    false,          // Override search input selector   [ Any jQuery selector eg; '#foobar' | false ]
                searchResetSelector:    false,          // Override search reset selector   [ Any jQuery selector | false ]
                searchSubmitSelector:   false,          // Override search submit selector  [ Any jQuery selector | false ]
                destroy:                options === 'die'
            };
            options = $.extend(defaults, options);

            return this.each(function () {

                var $search = $(this),
                    $searchInput = options.searchInputSelector ? $(options.searchInputSelector) : $search.children('[type=text]'),
                    $searchReset = options.searchResetSelector ? $(options.searchResetSelector) : $search.children('[type=reset]'),
                    $searchSubmit = options.searchSubmitSelector ? $(options.searchSubmitSelector) : $search.children('[type=submit]'),
                    searchInputText = options.explicitDefaultValue || $searchInput.val(),
                    hasClearButton = $searchReset.length,
                    hasSearchButton = $searchSubmit.length && options.disableBlankSearch,
                    isActive = false,
                    ifInfocus = false,

                $searchBox = {

                    init : function () {
                        if ($searchInput.attr('value') === searchInputText) {
                            $searchBox.disableSearchButtons();
                        } else if (!$searchInput.attr('value').length) {
                            $searchBox.disableSearchButtons();
                            $searchBox.populateSearchInput();
                        } else {
                            $searchBox.enableSearchButtons();
                            $searchBox.activate();
                        }
                        $searchBox.setUp();
                    },

                    setUp : function () {

                        $searchInput.bind
                            ('focus.searchBox blur.searchBox keyup.searchBox paste.searchBox', function (e) {
                                if (e.type === "paste") {
                                    setTimeout(function () {
                                        $searchBox.checkStatus(e.type);
                                    }, 0);
                                } else {
                                    $searchBox.checkStatus(e.type);
                                }
                            });

                        $searchReset.bind
                            ('click.searchBox', function (e) {
                                $searchBox.clearSearchInput(true);
                                e.preventDefault();

                            });

                    },
                    
                    checkStatus : function (e) {
                        if ($searchInput.attr('value') === searchInputText && !isActive) {
                            $searchBox.clearSearchInput();
                        } else if (!$searchInput.attr('value').length) {
                            $searchBox.disableSearchButtons();
                            if (e !== 'keyup') {
                                $searchBox.populateSearchInput();
                            }
                        } else {
                            $searchBox.enableSearchButtons();
                            $searchBox.activate();
                        }
                        if (e === "focus") {
                            $searchBox.pullFocus();
                        }
                        if (e === "blur") {
                            $searchBox.blurFocus();
                        }
                    },

                    activate : function () {
                        $search.addClass(options.activeClass);
                        isActive = true;
                    },

                    deactivate : function () {
                        $search.removeClass(options.activeClass);
                        isActive = false;
                    },

                    pullFocus : function () {
                        $search.addClass(options.inFocusClass);
                    },

                    blurFocus : function () {
                        $search.removeClass(options.inFocusClass);
                    },

                    clearSearchInput : function (focus) {
                        if (focus) {
                            $searchInput.focus();
                        }
                        setTimeout(function () {
                            $searchInput.attr('value', '');
                        }, 0);
                        $searchBox.disableSearchButtons();
                    },

                    populateSearchInput : function () {
                        $searchInput.attr('value', searchInputText);
                        $searchBox.deactivate();
                    },

                    enableSearchButtons : function () {
                        if (hasSearchButton) {
                            $searchSubmit.removeAttr('disabled').removeClass(options.disabledButtonClass);
                        }
                        if (hasClearButton) {
                            $searchReset.show();
                        }
                    },

                    disableSearchButtons : function () {
                        if (hasSearchButton) {
                            $searchSubmit.attr('disabled', 'true').addClass(options.disabledButtonClass);
                        }
                        if (hasClearButton) {
                            $searchReset.hide();
                        }
                    },

                    tearDown : function () {
                        $searchInput.unbind('.searchBox');
                        $searchReset.unbind('.searchBox');
                        $searchBox.enableSearchButtons();
                        $searchBox.deactivate();
                    }

                };

                options.destroy
                    ? $searchBox.tearDown()
                    : $searchBox.init();

            });

        }

    });
    
})(jQuery);