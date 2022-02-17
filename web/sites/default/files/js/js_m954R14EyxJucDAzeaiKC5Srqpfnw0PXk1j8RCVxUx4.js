/**
 * @file
 * Attaches behaviors for the Chosen module.
 */

(function($, Drupal, drupalSettings) {
  'use strict';

  // Temporal workaround while  https://github.com/harvesthq/chosen/issues/515
  // is fixed. This fix was taken from:
  // https://github.com/harvesthq/chosen/issues/515#issuecomment-104602031
  $.fn.oldChosen = $.fn.chosen;
  $.fn.chosen = function(options) {
    var select = $(this)
      , is_creating_chosen = !!options;

    if (is_creating_chosen && select.css('position') === 'absolute') {
      // if we are creating a chosen and the select already has the appropriate styles added
      // we remove those (so that the select hasn't got a crazy width), then create the chosen
      // then we re-add them later
      select.removeAttr('style');
    }

    var ret = select.oldChosen(options);

    // only act if the select has display: none, otherwise chosen is unsupported (iPhone, etc)
    if (is_creating_chosen && select.css('display') === 'none') {
      // https://github.com/harvesthq/chosen/issues/515#issuecomment-33214050
      // only do this if we are initializing chosen (no params, or object params) not calling a method
      select.attr('style','display:visible; position:absolute; width:0px; height: 0px; clip:rect(0,0,0,0)');
      select.attr('tabindex', -1);
    }
    return ret;
  };

  // Update Chosen elements when state has changed.
  $(document).on('state:disabled', 'select', function (e) {
    $(e.target).trigger('chosen:updated');
  });

  Drupal.behaviors.chosen = {

    settings: {

      /**
       * Completely ignores elements that match one of these selectors.
       *
       * Disabled on:
       * - Field UI
       * - WYSIWYG elements
       * - Tabledrag weights
       * - Elements that have opted-out of Chosen
       * - Elements already processed by Chosen.
       *
       * @type {string}
       */
      ignoreSelector: '#field-ui-field-storage-add-form select, #entity-form-display-edit-form select, #entity-view-display-edit-form select, .wysiwyg, .draggable select[name$="[weight]"], .draggable select[name$="[position]"], .locale-translate-filter-form select, .chosen-disable, .chosen-processed',

      /**
       * Explicit "opt-in" selector.
       *
       * @type {string}
       */
      optedInSelector: 'select.chosen-enable',

      /**
       * The default selector, overridden by drupalSettings.
       *
       * @type {string}
       */
      selector: 'select:visible'
    },

    /**
     * Drupal attach behavior.
     */
    attach: function(context, settings) {
      this.settings = this.getSettings(settings);
      this.getElements(context).once('chosen').each(function (i, element) {
        this.createChosen(element);
      }.bind(this));
    },

    /**
     * Creates a Chosen instance for a specific element.
     *
     * @param {jQuery|HTMLElement} element
     *   The element.
     */
    createChosen: function(element) {
      var $element = $(element);
      $element.chosen(this.getElementOptions($element));
    },

    /**
     * Filter out elements that should not be converted into Chosen.
     *
     * @param {jQuery|HTMLElement} element
     *   The element.
     *
     * @return {boolean}
     *   TRUE if the element should stay, FALSE otherwise.
     */
    filterElements: function (element) {
      var $element = $(element);

      // Remove elements that should be ignored completely.
      if ($element.is(this.settings.ignoreSelector)) {
        return false;
      }

      // Zero value means no minimum.
      var minOptions = $element.attr('multiple') ? this.settings.minimum_multiple : this.settings.minimum_single;
      return !minOptions || $element.find('option').length >= minOptions;
    },

    /**
     * Retrieves the elements that should be converted into Chosen instances.
     *
     * @param {jQuery|Element} context
     *   A DOM Element, Document, or jQuery object to use as context.
     * @param {string} [selector]
     *   A selector to use, defaults to the default selector in the settings.
     */
    getElements: function (context, selector) {
      var $context = $(context || document);
      var $elements = $context.find(selector || this.settings.selector);

      // Remove elements that should not be converted into Chosen.
      $elements = $elements.filter(function(i, element) {
        return this.filterElements(element);
      }.bind(this));

      // Add elements that have explicitly opted in to Chosen.
      $elements = $elements.add($context.find(this.settings.optedInSelector));

      return $elements;
    },

    /**
     * Retrieves options used to create a Chosen instance based on an element.
     *
     * @param {jQuery|HTMLElement} element
     *   The element to process.
     *
     * @return {Object}
     *   The options object used to instantiate a Chosen instance with.
     */
    getElementOptions: function (element) {
      var $element = $(element);
      var options = $.extend({}, this.settings.options);
      var dimension;
      var width;

      // The width default option is considered the minimum width, so this
      // must be evaluated for every option.
      if (this.settings.minimum_width > 0) {
        // Given we need to manage settings as both percentage and pixel widths,
        // we need to handle width calculations separately.
        if (this.settings.use_relative_width) {
          dimension = '%';
          width = ($element.width() / $element.parent().width() * 100).toPrecision(5);
        }
        else {
          dimension = 'px';
          width = $element.width();
        }

        if (width < this.settings.minimum_width) {
          options.width = this.settings.minimum_width + dimension;
        }
        else {
          options.width = width + dimension;
        }
      }

      // Some field widgets have cardinality, so we must respect that.
      // @see \Drupal\chosen\ChosenFormRender::preRenderSelect()
      var cardinality;
      if ($element.attr('multiple') && (cardinality = $element.data('cardinality'))) {
        options.max_selected_options = cardinality;
      }

      return options;
    },

    /**
     * Retrieves the settings passed from Drupal.
     *
     * @param {Object} [settings]
     *   Passed Drupal settings object, if any.
     */
    getSettings: function (settings) {
      return $.extend(true, {}, this.settings, settings && settings.chosen || drupalSettings.chosen);
    }

};

})(jQuery, Drupal, drupalSettings);
;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal) {
  Drupal.behaviors.filterGuidelines = {
    attach: function attach(context) {
      function updateFilterGuidelines(event) {
        var $this = $(event.target);
        var value = $this.val();
        $this.closest('.js-filter-wrapper').find('[data-drupal-format-id]').hide().filter("[data-drupal-format-id=\"".concat(value, "\"]")).show();
      }

      $(once('filter-guidelines', '.js-filter-guidelines', context)).find(':header').hide().closest('.js-filter-wrapper').find('select.js-filter-list').on('change.filterGuidelines', updateFilterGuidelines).trigger('change.filterGuidelines');
    }
  };
})(jQuery, Drupal);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, drupalSettings) {
  drupalSettings.dialog = {
    autoOpen: true,
    dialogClass: '',
    buttonClass: 'button',
    buttonPrimaryClass: 'button--primary',
    close: function close(event) {
      Drupal.dialog(event.target).close();
      Drupal.detachBehaviors(event.target, null, 'unload');
    }
  };

  Drupal.dialog = function (element, options) {
    var undef;
    var $element = $(element);
    var dialog = {
      open: false,
      returnValue: undef
    };

    function openDialog(settings) {
      settings = $.extend({}, drupalSettings.dialog, options, settings);
      $(window).trigger('dialog:beforecreate', [dialog, $element, settings]);
      $element.dialog(settings);
      dialog.open = true;
      $(window).trigger('dialog:aftercreate', [dialog, $element, settings]);
    }

    function closeDialog(value) {
      $(window).trigger('dialog:beforeclose', [dialog, $element]);
      $element.dialog('close');
      dialog.returnValue = value;
      dialog.open = false;
      $(window).trigger('dialog:afterclose', [dialog, $element]);
    }

    dialog.show = function () {
      openDialog({
        modal: false
      });
    };

    dialog.showModal = function () {
      openDialog({
        modal: true
      });
    };

    dialog.close = closeDialog;
    return dialog;
  };
})(jQuery, Drupal, drupalSettings);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, drupalSettings, debounce, displace) {
  drupalSettings.dialog = $.extend({
    autoResize: true,
    maxHeight: '95%'
  }, drupalSettings.dialog);

  function resetPosition(options) {
    var offsets = displace.offsets;
    var left = offsets.left - offsets.right;
    var top = offsets.top - offsets.bottom;
    var leftString = "".concat((left > 0 ? '+' : '-') + Math.abs(Math.round(left / 2)), "px");
    var topString = "".concat((top > 0 ? '+' : '-') + Math.abs(Math.round(top / 2)), "px");
    options.position = {
      my: "center".concat(left !== 0 ? leftString : '', " center").concat(top !== 0 ? topString : ''),
      of: window
    };
    return options;
  }

  function resetSize(event) {
    var positionOptions = ['width', 'height', 'minWidth', 'minHeight', 'maxHeight', 'maxWidth', 'position'];
    var adjustedOptions = {};
    var windowHeight = $(window).height();
    var option;
    var optionValue;
    var adjustedValue;

    for (var n = 0; n < positionOptions.length; n++) {
      option = positionOptions[n];
      optionValue = event.data.settings[option];

      if (optionValue) {
        if (typeof optionValue === 'string' && /%$/.test(optionValue) && /height/i.test(option)) {
          windowHeight -= displace.offsets.top + displace.offsets.bottom;
          adjustedValue = parseInt(0.01 * parseInt(optionValue, 10) * windowHeight, 10);

          if (option === 'height' && event.data.$element.parent().outerHeight() < adjustedValue) {
            adjustedValue = 'auto';
          }

          adjustedOptions[option] = adjustedValue;
        }
      }
    }

    if (!event.data.settings.modal) {
      adjustedOptions = resetPosition(adjustedOptions);
    }

    event.data.$element.dialog('option', adjustedOptions).trigger('dialogContentResize');
  }

  $(window).on({
    'dialog:aftercreate': function dialogAftercreate(event, dialog, $element, settings) {
      var autoResize = debounce(resetSize, 20);
      var eventData = {
        settings: settings,
        $element: $element
      };

      if (settings.autoResize === true || settings.autoResize === 'true') {
        $element.dialog('option', {
          resizable: false,
          draggable: false
        }).dialog('widget').css('position', 'fixed');
        $(window).on('resize.dialogResize scroll.dialogResize', eventData, autoResize).trigger('resize.dialogResize');
        $(document).on('drupalViewportOffsetChange.dialogResize', eventData, autoResize);
      }
    },
    'dialog:beforeclose': function dialogBeforeclose(event, dialog, $element) {
      $(window).off('.dialogResize');
      $(document).off('.dialogResize');
    }
  });
})(jQuery, Drupal, drupalSettings, Drupal.debounce, Drupal.displace);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, _ref) {
  var tabbable = _ref.tabbable,
      isTabbable = _ref.isTabbable;
  $.widget('ui.dialog', $.ui.dialog, {
    options: {
      buttonClass: 'button',
      buttonPrimaryClass: 'button--primary'
    },
    _createButtons: function _createButtons() {
      var opts = this.options;
      var primaryIndex;
      var index;
      var il = opts.buttons.length;

      for (index = 0; index < il; index++) {
        if (opts.buttons[index].primary && opts.buttons[index].primary === true) {
          primaryIndex = index;
          delete opts.buttons[index].primary;
          break;
        }
      }

      this._super();

      var $buttons = this.uiButtonSet.children().addClass(opts.buttonClass);

      if (typeof primaryIndex !== 'undefined') {
        $buttons.eq(index).addClass(opts.buttonPrimaryClass);
      }
    },
    _focusTabbable: function _focusTabbable() {
      var hasFocus = this._focusedElement ? this._focusedElement.get(0) : null;

      if (!hasFocus) {
        hasFocus = this.element.find('[autofocus]').get(0);
      }

      if (!hasFocus) {
        var $elements = [this.element, this.uiDialogButtonPane];

        for (var i = 0; i < $elements.length; i++) {
          var element = $elements[i].get(0);

          if (element) {
            var elementTabbable = tabbable(element);
            hasFocus = elementTabbable.length ? elementTabbable[0] : null;
          }

          if (hasFocus) {
            break;
          }
        }
      }

      if (!hasFocus) {
        var closeBtn = this.uiDialogTitlebarClose.get(0);
        hasFocus = closeBtn && isTabbable(closeBtn) ? closeBtn : null;
      }

      if (!hasFocus) {
        hasFocus = this.uiDialog.get(0);
      }

      $(hasFocus).eq(0).trigger('focus');
    }
  });
})(jQuery, window.tabbable);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, drupalSettings) {
  function findFieldForFormatSelector($formatSelector) {
    var fieldId = $formatSelector.attr('data-editor-for');
    return $("#".concat(fieldId)).get(0);
  }

  function filterXssWhenSwitching(field, format, originalFormatID, callback) {
    if (format.editor.isXssSafe) {
      callback(field, format);
    } else {
      $.ajax({
        url: Drupal.url("editor/filter_xss/".concat(format.format)),
        type: 'POST',
        data: {
          value: field.value,
          original_format_id: originalFormatID
        },
        dataType: 'json',
        success: function success(xssFilteredValue) {
          if (xssFilteredValue !== false) {
            field.value = xssFilteredValue;
          }

          callback(field, format);
        }
      });
    }
  }

  function changeTextEditor(field, newFormatID) {
    var previousFormatID = field.getAttribute('data-editor-active-text-format');

    if (drupalSettings.editor.formats[previousFormatID]) {
      Drupal.editorDetach(field, drupalSettings.editor.formats[previousFormatID]);
    } else {
      $(field).off('.editor');
    }

    if (drupalSettings.editor.formats[newFormatID]) {
      var format = drupalSettings.editor.formats[newFormatID];
      filterXssWhenSwitching(field, format, previousFormatID, Drupal.editorAttach);
    }

    field.setAttribute('data-editor-active-text-format', newFormatID);
  }

  function onTextFormatChange(event) {
    var $select = $(event.target);
    var field = event.data.field;
    var activeFormatID = field.getAttribute('data-editor-active-text-format');
    var newFormatID = $select.val();

    if (newFormatID === activeFormatID) {
      return;
    }

    var supportContentFiltering = drupalSettings.editor.formats[newFormatID] && drupalSettings.editor.formats[newFormatID].editorSupportsContentFiltering;
    var hasContent = field.value !== '';

    if (hasContent && supportContentFiltering) {
      var message = Drupal.t('Changing the text format to %text_format will permanently remove content that is not allowed in that text format.<br><br>Save your changes before switching the text format to avoid losing data.', {
        '%text_format': $select.find('option:selected').text()
      });
      var confirmationDialog = Drupal.dialog("<div>".concat(message, "</div>"), {
        title: Drupal.t('Change text format?'),
        dialogClass: 'editor-change-text-format-modal',
        resizable: false,
        buttons: [{
          text: Drupal.t('Continue'),
          class: 'button button--primary',
          click: function click() {
            changeTextEditor(field, newFormatID);
            confirmationDialog.close();
          }
        }, {
          text: Drupal.t('Cancel'),
          class: 'button',
          click: function click() {
            $select.val(activeFormatID);
            confirmationDialog.close();
          }
        }],
        closeOnEscape: false,
        create: function create() {
          $(this).parent().find('.ui-dialog-titlebar-close').remove();
        },
        beforeClose: false,
        close: function close(event) {
          $(event.target).remove();
        }
      });
      confirmationDialog.showModal();
    } else {
      changeTextEditor(field, newFormatID);
    }
  }

  Drupal.editors = {};
  Drupal.behaviors.editor = {
    attach: function attach(context, settings) {
      if (!settings.editor) {
        return;
      }

      once('editor', '[data-editor-for]', context).forEach(function (editor) {
        var $this = $(editor);
        var field = findFieldForFormatSelector($this);

        if (!field) {
          return;
        }

        var activeFormatID = $this.val();
        field.setAttribute('data-editor-active-text-format', activeFormatID);

        if (settings.editor.formats[activeFormatID]) {
          Drupal.editorAttach(field, settings.editor.formats[activeFormatID]);
        }

        $(field).on('change.editor keypress.editor', function () {
          field.setAttribute('data-editor-value-is-changed', 'true');
          $(field).off('.editor');
        });

        if ($this.is('select')) {
          $this.on('change.editorAttach', {
            field: field
          }, onTextFormatChange);
        }

        $this.parents('form').on('submit', function (event) {
          if (event.isDefaultPrevented()) {
            return;
          }

          if (settings.editor.formats[activeFormatID]) {
            Drupal.editorDetach(field, settings.editor.formats[activeFormatID], 'serialize');
          }
        });
      });
    },
    detach: function detach(context, settings, trigger) {
      var editors;

      if (trigger === 'serialize') {
        editors = once.filter('editor', '[data-editor-for]', context);
      } else {
        editors = once.remove('editor', '[data-editor-for]', context);
      }

      editors.forEach(function (editor) {
        var $this = $(editor);
        var activeFormatID = $this.val();
        var field = findFieldForFormatSelector($this);

        if (field && activeFormatID in settings.editor.formats) {
          Drupal.editorDetach(field, settings.editor.formats[activeFormatID], trigger);
        }
      });
    }
  };

  Drupal.editorAttach = function (field, format) {
    if (format.editor) {
      Drupal.editors[format.editor].attach(field, format);
      Drupal.editors[format.editor].onChange(field, function () {
        $(field).trigger('formUpdated');
        field.setAttribute('data-editor-value-is-changed', 'true');
      });
    }
  };

  Drupal.editorDetach = function (field, format, trigger) {
    if (format.editor) {
      Drupal.editors[format.editor].detach(field, format, trigger);

      if (field.getAttribute('data-editor-value-is-changed') === 'false') {
        field.value = field.getAttribute('data-editor-value-original');
      }
    }
  };
})(jQuery, Drupal, drupalSettings);;
