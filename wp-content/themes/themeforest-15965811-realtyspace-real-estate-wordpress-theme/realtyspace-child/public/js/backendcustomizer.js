/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

	var jQuery = __webpack_require__(1);
	var app = window.cf47rsVars;
	var iconsLoaded = false;

	wp.customize.controlConstructor['icon_select2'] = wp.customize.Control.extend({

	  ready: function () {
	    var control = this,
	      element = this.container.find('input');

	    if (!iconsLoaded) {
	      jQuery(document.body).prepend(jQuery('<div>')
	        .load(app.var.themeUrl + '/public/img/sprite-inline.svg'));
	      iconsLoaded = true;
	    }

	    var formatter = function (item) {
	      if (item.type === 'svg') {
	        return '<svg><use xlink:href="#' + item.id + '"></use></svg>' + item.text;
	      }
	      return '<i class="fa ' + item.id + '"></i> ' + item.text;
	    };


	    element.select2({
	      width: "100%",
	      placeholder: "Search for a repository",
	      ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
	        url: app.route.themeIcons,
	        quietMillis: 250,
	        dataType: 'json',
	        results: function (data) {
	          return {results: data.result}
	        },
	        cache: true,
	        data: function (term, page) {
	          return {
	            q: term // search term
	          };
	        }
	      },
	      initSelection: function(element, callback) {
	        // the input tag has a value attribute preloaded that points to a preselected repository's id
	        // this function resolves that id attribute to an object that select2 can render
	        // using its formatResult renderer - that way the repository name is shown preselected
	        var id = jQuery(element).val();
	        if (id !== "") {
	          jQuery.ajax(app.route.themeIcons, {
	            dataType: "json",
	            data: {
	              q: id,
	              selection: true
	            }
	          }).done(function (data) {
	            callback(data.result);
	          });
	        }
	      },
	      formatSelection: formatter,
	      formatResult: formatter
	    }).on('change', function (val, added, removed) {
	      control.setting.set(val.val);
	    })
	    ;


	  }

	});

	jQuery(function () {
	  jQuery('#customize-theme-controls').on('click', 'a[data-focus]', function () {
	    wp.customize.control( jQuery(this).data('focus') ).focus();
	  });
	});



/***/ }),
/* 1 */
/***/ (function(module, exports) {

	module.exports = jQuery;

/***/ })
/******/ ]);