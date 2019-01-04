var app =
webpackJsonpapp([2],[
/* 0 */
/***/ (function(module, exports) {

	// var ajax = require('./wp/ajax');
	var app = cf47rsVars;

	// wp.customize('testimonials_per_page', function (value) {
	//   value.bind(function (to) {
	//     ajax.loadContent(_wpCustomizePreviewNavMenusExports.requestUri, {
	//         'posts_per_page': to
	//       }, '.js-testimonials-ajax'
	//     );
	//   });
	// });

	if (wp.customize.selectiveRefresh) {
	  // wp.customize.selectiveRefresh.bind( 'render-partials-response', function( response ) {
	  //   console.log(response);
	  // } );

	  wp.customize.selectiveRefresh.bind( 'partial-content-rendered', function( response ) {
	    // console.log(response);
	  } );
	}

/***/ })
]);