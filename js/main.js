/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Modernizr */

function l(data) {
  'use strict';
  console.log(data);
}

jQuery(document).ready(function () {
  'use strict';

  $('.js-scroll-to-trigger').on('click', function(e) {
    e.preventDefault();
    var target = $(this).data('target');
    $('#' + target).ScrollTo();
  })

});