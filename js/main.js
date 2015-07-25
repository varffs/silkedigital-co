/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Modernizr */

function l(data) {
  'use strict';
  console.log(data);
}

var mainContent = $('#main-content');
var scrollTop;

var Menu = {
  $menuHolder: $('#menu-holder'),
  menuTop: 0,
  setup: function() {
    Menu.menuTop = Menu.$menuHolder.offset().top;
  },
  getHeight: function() {
    var _this = this;
    var height = _this.$menuHolder.height();

    return height;
  },
  fix: function() {
    var _this = this;

    _this.$menuHolder.addClass('u-fixed');
    mainContent.css('padding-top', _this.getHeight() + 'px');
  },
  unFix: function() {
    var _this = this;

    _this.$menuHolder.removeClass('u-fixed');
    mainContent.css('padding-top', '0px');
  },
  fixLogic: function(scrollTop) {
    var _this = this;

    if (_this.$menuHolder.hasClass('u-fixed') && scrollTop <= _this.menuTop) {
      _this.unFix();
    } else if (scrollTop >= _this.menuTop) {
      _this.fix();
    }
  },
}

jQuery(document).ready(function () {
  'use strict';
  Menu.setup();

  $(window).on('scroll', function(e) {
    scrollTop = $(window).scrollTop();
    Menu.fixLogic(scrollTop);
  });

  $('.js-scroll-to-trigger').on('click', function(e) {
    e.preventDefault();
    var target = $(this).data('target');
    $('#' + target).ScrollTo();
  })

});