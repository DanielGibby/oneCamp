/**
 * color_picker Javascript
 */

(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.color_element = {
    attach: function (context, settings) {

      var $context = $(context);

      // build each of the colour swatches
      $context.find('.color-picker input').once('colorPicker').each(function (index, element) {
        // hide the input element that hold the selected colour value
        $(element).hide();
        var default_color = $(element).val();
        var $parent = $(element).next();
        // add the swatches to the colour values container
        var color_values = $(element).data('color-values');
        $.each(color_values.split(","), function (index, value) {
          if (value === default_color) {
            var el = '<div class="color-value selected"><div data-swatch-color="' + value + '" style="background-color: ' + value + ';" class="inner"></div></div>';
          } else {
            var el = '<div class="color-value"><div data-swatch-color="' + value + '" style="background-color: ' + value + ';" class="inner"></div></div>';
          }
          $parent.append(el);
        });
        // add the click event to each swatch to update the input value
        // and set the selected class etc
        $('.color-value .inner').once('colorPicker').click(function () {
          $(this).parent().addClass('selected').siblings().removeClass('selected');
          var selected_color = $(this).data('swatch-color');
          $(this).parent().parent().parent().find('input').val(selected_color);
        });
      });

    },
  };

})(jQuery, Drupal);
