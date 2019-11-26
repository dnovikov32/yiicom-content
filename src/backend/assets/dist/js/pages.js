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
/******/ 	__webpack_require__.p = "/dist/";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports = __webpack_require__(1);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

	'use strict';

	var _vue = __webpack_require__(2);

	var _vue2 = _interopRequireDefault(_vue);

	var _pages = __webpack_require__(3);

	var _pages2 = _interopRequireDefault(_pages);

	var _category = __webpack_require__(24);

	var _category2 = _interopRequireDefault(_category);

	var _PagesIndex = __webpack_require__(25);

	var _PagesIndex2 = _interopRequireDefault(_PagesIndex);

	var _PagesEdit = __webpack_require__(28);

	var _PagesEdit2 = _interopRequireDefault(_PagesEdit);

	var _PagesDelete = __webpack_require__(40);

	var _PagesDelete2 = _interopRequireDefault(_PagesDelete);

	var _CategoriesIndex = __webpack_require__(43);

	var _CategoriesIndex2 = _interopRequireDefault(_CategoriesIndex);

	var _CategoriesEdit = __webpack_require__(46);

	var _CategoriesEdit2 = _interopRequireDefault(_CategoriesEdit);

	var _CategoriesDelete = __webpack_require__(49);

	var _CategoriesDelete2 = _interopRequireDefault(_CategoriesDelete);

	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

	window.App.$store.registerModule('pages', _pages2.default);
	window.App.$store.registerModule('pages-categories', _category2.default);

	var routes = [{
	    path: '/pages/page/index',
	    name: 'pages.index',
	    component: _PagesIndex2.default,
	    meta: {
	        auth: true,
	        breadcrumbs: [{ text: 'Страницы' }]
	    }
	}, {
	    path: '/pages/page/create',
	    name: 'pages.create',
	    component: _PagesEdit2.default,
	    meta: {
	        auth: true,
	        breadcrumbs: [{ text: 'Страницы', href: '/#/pages/page/index' }, { text: 'Создать' }]
	    }
	}, {
	    path: '/pages/page/update',
	    name: 'pages.update',
	    component: _PagesEdit2.default,
	    meta: {
	        auth: true,
	        breadcrumbs: [{ text: 'Страницы', href: '/#/pages/page/index' }, { text: 'Изменить' }]
	    }
	}, {
	    path: '/pages/page/delete',
	    name: 'pages.delete',
	    component: _PagesDelete2.default,
	    meta: {
	        auth: true
	    }
	}, {
	    path: '/pages/category/index',
	    name: 'pages.category.index',
	    component: _CategoriesIndex2.default,
	    meta: {
	        auth: true,
	        breadcrumbs: [{ text: 'Категории страниц' }]
	    }
	}, {
	    path: '/pages/category/create',
	    name: 'pages.category.create',
	    component: _CategoriesEdit2.default,
	    meta: {
	        auth: true,
	        breadcrumbs: [{ text: 'Категории страниц', href: '/#/pages/category/index' }, { text: 'Создать' }]
	    }
	}, {
	    path: '/pages/category/update',
	    name: 'pages.category.update',
	    component: _CategoriesEdit2.default,
	    meta: {
	        auth: true,
	        breadcrumbs: [{ text: 'Категории страниц', href: '/#/pages/category/index' }, { text: 'Изменить' }]
	    }
	}, {
	    path: '/pages/category/delete',
	    name: 'pages.category.delete',
	    component: _CategoriesDelete2.default,
	    meta: {
	        auth: true
	    }
	}];

	window.App.$router.addRoutes(routes);

/***/ }),
/* 2 */
/***/ (function(module, exports) {

	module.exports = Vue;

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});

	var _defineProperty2 = __webpack_require__(4);

	var _defineProperty3 = _interopRequireDefault(_defineProperty2);

	var _mutations;

	var _vue = __webpack_require__(2);

	var _vue2 = _interopRequireDefault(_vue);

	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

	exports.default = {
	    namespaced: true,

	    state: {
	        grid: null,
	        model: {}
	    },

	    getters: {
	        grid: function grid(state) {
	            return state.grid;
	        },
	        model: function model(state) {
	            return state.model;
	        }
	    },

	    mutations: (_mutations = {}, (0, _defineProperty3.default)(_mutations, 'FETCH_ALL_SUCCESS', function FETCH_ALL_SUCCESS(state, data) {
	        state.grid = data;
	    }), (0, _defineProperty3.default)(_mutations, 'FETCH_MODEL_SUCCESS', function FETCH_MODEL_SUCCESS(state, data) {
	        state.model = data;
	    }), (0, _defineProperty3.default)(_mutations, 'DELETE_MODEL_SUCCESS', function DELETE_MODEL_SUCCESS(state, data) {
	        state.model = {};
	    }), _mutations),

	    actions: {
	        all: function all(_ref, params) {
	            var state = _ref.state,
	                commit = _ref.commit,
	                rootState = _ref.rootState;

	            return _vue2.default.axios.get('/pages/api/v1/page/index', { params: params }).then(function (response) {
	                return commit('FETCH_ALL_SUCCESS', response.data);
	            }, function (error) {});
	        },
	        find: function find(_ref2, id) {
	            var state = _ref2.state,
	                commit = _ref2.commit,
	                rootState = _ref2.rootState;

	            return _vue2.default.axios.get('/pages/api/v1/page/find', { params: { id: id } }).then(function (response) {
	                return commit('FETCH_MODEL_SUCCESS', response.data);
	            }, function (error) {});
	        },
	        save: function save(_ref3, model) {
	            var state = _ref3.state,
	                commit = _ref3.commit,
	                rootState = _ref3.rootState;

	            return _vue2.default.axios.post('/pages/api/v1/page/save', model).then(function (response) {
	                return commit('FETCH_MODEL_SUCCESS', response.data);
	            }, function (error) {});
	        },
	        delete: function _delete(_ref4, id) {
	            var state = _ref4.state,
	                commit = _ref4.commit,
	                rootState = _ref4.rootState;

	            return _vue2.default.axios.post('/pages/api/v1/page/delete', { id: id }).then(function (response) {
	                return commit('DELETE_MODEL_SUCCESS', response.data);
	            }, function (error) {});
	        }
	    }
	};

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

	"use strict";

	exports.__esModule = true;

	var _defineProperty = __webpack_require__(5);

	var _defineProperty2 = _interopRequireDefault(_defineProperty);

	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

	exports.default = function (obj, key, value) {
	  if (key in obj) {
	    (0, _defineProperty2.default)(obj, key, {
	      value: value,
	      enumerable: true,
	      configurable: true,
	      writable: true
	    });
	  } else {
	    obj[key] = value;
	  }

	  return obj;
	};

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports = { "default": __webpack_require__(6), __esModule: true };

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

	__webpack_require__(7);
	var $Object = __webpack_require__(10).Object;
	module.exports = function defineProperty(it, key, desc) {
	  return $Object.defineProperty(it, key, desc);
	};


/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

	var $export = __webpack_require__(8);
	// 19.1.2.4 / 15.2.3.6 Object.defineProperty(O, P, Attributes)
	$export($export.S + $export.F * !__webpack_require__(18), 'Object', { defineProperty: __webpack_require__(14).f });


/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

	var global = __webpack_require__(9);
	var core = __webpack_require__(10);
	var ctx = __webpack_require__(11);
	var hide = __webpack_require__(13);
	var has = __webpack_require__(23);
	var PROTOTYPE = 'prototype';

	var $export = function (type, name, source) {
	  var IS_FORCED = type & $export.F;
	  var IS_GLOBAL = type & $export.G;
	  var IS_STATIC = type & $export.S;
	  var IS_PROTO = type & $export.P;
	  var IS_BIND = type & $export.B;
	  var IS_WRAP = type & $export.W;
	  var exports = IS_GLOBAL ? core : core[name] || (core[name] = {});
	  var expProto = exports[PROTOTYPE];
	  var target = IS_GLOBAL ? global : IS_STATIC ? global[name] : (global[name] || {})[PROTOTYPE];
	  var key, own, out;
	  if (IS_GLOBAL) source = name;
	  for (key in source) {
	    // contains in native
	    own = !IS_FORCED && target && target[key] !== undefined;
	    if (own && has(exports, key)) continue;
	    // export native or passed
	    out = own ? target[key] : source[key];
	    // prevent global pollution for namespaces
	    exports[key] = IS_GLOBAL && typeof target[key] != 'function' ? source[key]
	    // bind timers to global for call from export context
	    : IS_BIND && own ? ctx(out, global)
	    // wrap global constructors for prevent change them in library
	    : IS_WRAP && target[key] == out ? (function (C) {
	      var F = function (a, b, c) {
	        if (this instanceof C) {
	          switch (arguments.length) {
	            case 0: return new C();
	            case 1: return new C(a);
	            case 2: return new C(a, b);
	          } return new C(a, b, c);
	        } return C.apply(this, arguments);
	      };
	      F[PROTOTYPE] = C[PROTOTYPE];
	      return F;
	    // make static versions for prototype methods
	    })(out) : IS_PROTO && typeof out == 'function' ? ctx(Function.call, out) : out;
	    // export proto methods to core.%CONSTRUCTOR%.methods.%NAME%
	    if (IS_PROTO) {
	      (exports.virtual || (exports.virtual = {}))[key] = out;
	      // export proto methods to core.%CONSTRUCTOR%.prototype.%NAME%
	      if (type & $export.R && expProto && !expProto[key]) hide(expProto, key, out);
	    }
	  }
	};
	// type bitmap
	$export.F = 1;   // forced
	$export.G = 2;   // global
	$export.S = 4;   // static
	$export.P = 8;   // proto
	$export.B = 16;  // bind
	$export.W = 32;  // wrap
	$export.U = 64;  // safe
	$export.R = 128; // real proto method for `library`
	module.exports = $export;


/***/ }),
/* 9 */
/***/ (function(module, exports) {

	// https://github.com/zloirock/core-js/issues/86#issuecomment-115759028
	var global = module.exports = typeof window != 'undefined' && window.Math == Math
	  ? window : typeof self != 'undefined' && self.Math == Math ? self
	  // eslint-disable-next-line no-new-func
	  : Function('return this')();
	if (typeof __g == 'number') __g = global; // eslint-disable-line no-undef


/***/ }),
/* 10 */
/***/ (function(module, exports) {

	var core = module.exports = { version: '2.6.5' };
	if (typeof __e == 'number') __e = core; // eslint-disable-line no-undef


/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

	// optional / simple context binding
	var aFunction = __webpack_require__(12);
	module.exports = function (fn, that, length) {
	  aFunction(fn);
	  if (that === undefined) return fn;
	  switch (length) {
	    case 1: return function (a) {
	      return fn.call(that, a);
	    };
	    case 2: return function (a, b) {
	      return fn.call(that, a, b);
	    };
	    case 3: return function (a, b, c) {
	      return fn.call(that, a, b, c);
	    };
	  }
	  return function (/* ...args */) {
	    return fn.apply(that, arguments);
	  };
	};


/***/ }),
/* 12 */
/***/ (function(module, exports) {

	module.exports = function (it) {
	  if (typeof it != 'function') throw TypeError(it + ' is not a function!');
	  return it;
	};


/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

	var dP = __webpack_require__(14);
	var createDesc = __webpack_require__(22);
	module.exports = __webpack_require__(18) ? function (object, key, value) {
	  return dP.f(object, key, createDesc(1, value));
	} : function (object, key, value) {
	  object[key] = value;
	  return object;
	};


/***/ }),
/* 14 */
/***/ (function(module, exports, __webpack_require__) {

	var anObject = __webpack_require__(15);
	var IE8_DOM_DEFINE = __webpack_require__(17);
	var toPrimitive = __webpack_require__(21);
	var dP = Object.defineProperty;

	exports.f = __webpack_require__(18) ? Object.defineProperty : function defineProperty(O, P, Attributes) {
	  anObject(O);
	  P = toPrimitive(P, true);
	  anObject(Attributes);
	  if (IE8_DOM_DEFINE) try {
	    return dP(O, P, Attributes);
	  } catch (e) { /* empty */ }
	  if ('get' in Attributes || 'set' in Attributes) throw TypeError('Accessors not supported!');
	  if ('value' in Attributes) O[P] = Attributes.value;
	  return O;
	};


/***/ }),
/* 15 */
/***/ (function(module, exports, __webpack_require__) {

	var isObject = __webpack_require__(16);
	module.exports = function (it) {
	  if (!isObject(it)) throw TypeError(it + ' is not an object!');
	  return it;
	};


/***/ }),
/* 16 */
/***/ (function(module, exports) {

	module.exports = function (it) {
	  return typeof it === 'object' ? it !== null : typeof it === 'function';
	};


/***/ }),
/* 17 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports = !__webpack_require__(18) && !__webpack_require__(19)(function () {
	  return Object.defineProperty(__webpack_require__(20)('div'), 'a', { get: function () { return 7; } }).a != 7;
	});


/***/ }),
/* 18 */
/***/ (function(module, exports, __webpack_require__) {

	// Thank's IE8 for his funny defineProperty
	module.exports = !__webpack_require__(19)(function () {
	  return Object.defineProperty({}, 'a', { get: function () { return 7; } }).a != 7;
	});


/***/ }),
/* 19 */
/***/ (function(module, exports) {

	module.exports = function (exec) {
	  try {
	    return !!exec();
	  } catch (e) {
	    return true;
	  }
	};


/***/ }),
/* 20 */
/***/ (function(module, exports, __webpack_require__) {

	var isObject = __webpack_require__(16);
	var document = __webpack_require__(9).document;
	// typeof document.createElement is 'object' in old IE
	var is = isObject(document) && isObject(document.createElement);
	module.exports = function (it) {
	  return is ? document.createElement(it) : {};
	};


/***/ }),
/* 21 */
/***/ (function(module, exports, __webpack_require__) {

	// 7.1.1 ToPrimitive(input [, PreferredType])
	var isObject = __webpack_require__(16);
	// instead of the ES6 spec version, we didn't implement @@toPrimitive case
	// and the second argument - flag - preferred type is a string
	module.exports = function (it, S) {
	  if (!isObject(it)) return it;
	  var fn, val;
	  if (S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
	  if (typeof (fn = it.valueOf) == 'function' && !isObject(val = fn.call(it))) return val;
	  if (!S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
	  throw TypeError("Can't convert object to primitive value");
	};


/***/ }),
/* 22 */
/***/ (function(module, exports) {

	module.exports = function (bitmap, value) {
	  return {
	    enumerable: !(bitmap & 1),
	    configurable: !(bitmap & 2),
	    writable: !(bitmap & 4),
	    value: value
	  };
	};


/***/ }),
/* 23 */
/***/ (function(module, exports) {

	var hasOwnProperty = {}.hasOwnProperty;
	module.exports = function (it, key) {
	  return hasOwnProperty.call(it, key);
	};


/***/ }),
/* 24 */
/***/ (function(module, exports, __webpack_require__) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});

	var _defineProperty2 = __webpack_require__(4);

	var _defineProperty3 = _interopRequireDefault(_defineProperty2);

	var _mutations;

	var _vue = __webpack_require__(2);

	var _vue2 = _interopRequireDefault(_vue);

	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

	exports.default = {
	    namespaced: true,

	    state: {
	        grid: null,
	        model: {}
	    },

	    getters: {
	        grid: function grid(state) {
	            return state.grid;
	        },
	        model: function model(state) {
	            return state.model;
	        }
	    },

	    mutations: (_mutations = {}, (0, _defineProperty3.default)(_mutations, 'FETCH_ALL_SUCCESS', function FETCH_ALL_SUCCESS(state, data) {
	        state.grid = data;
	    }), (0, _defineProperty3.default)(_mutations, 'FETCH_MODEL_SUCCESS', function FETCH_MODEL_SUCCESS(state, data) {
	        state.model = data;
	    }), (0, _defineProperty3.default)(_mutations, 'DELETE_MODEL_SUCCESS', function DELETE_MODEL_SUCCESS(state, data) {
	        state.model = {};
	    }), _mutations),

	    actions: {
	        all: function all(_ref, params) {
	            var state = _ref.state,
	                commit = _ref.commit,
	                rootState = _ref.rootState;

	            return _vue2.default.axios.get('/pages/api/v1/category/index', { params: params }).then(function (response) {
	                return commit('FETCH_ALL_SUCCESS', response.data);
	            }, function (error) {});
	        },
	        find: function find(_ref2, id) {
	            var state = _ref2.state,
	                commit = _ref2.commit,
	                rootState = _ref2.rootState;

	            return _vue2.default.axios.get('/pages/api/v1/category/find', { params: { id: id } }).then(function (response) {
	                return commit('FETCH_MODEL_SUCCESS', response.data);
	            }, function (error) {});
	        },
	        save: function save(_ref3, model) {
	            var state = _ref3.state,
	                commit = _ref3.commit,
	                rootState = _ref3.rootState;

	            return _vue2.default.axios.post('/pages/api/v1/category/save', model).then(function (response) {
	                return commit('FETCH_MODEL_SUCCESS', response.data);
	            }, function (error) {});
	        },
	        delete: function _delete(_ref4, id) {
	            var state = _ref4.state,
	                commit = _ref4.commit,
	                rootState = _ref4.rootState;

	            return _vue2.default.axios.post('/pages/api/v1/category/delete', { id: id }).then(function (response) {
	                return commit('DELETE_MODEL_SUCCESS', response.data);
	            }, function (error) {});
	        }
	    }
	};

/***/ }),
/* 25 */
/***/ (function(module, exports, __webpack_require__) {

	var __vue_exports__, __vue_options__
	var __vue_styles__ = {}

	/* script */
	__vue_exports__ = __webpack_require__(26)

	/* template */
	var __vue_template__ = __webpack_require__(27)
	__vue_options__ = __vue_exports__ = __vue_exports__ || {}
	if (
	  typeof __vue_exports__.default === "object" ||
	  typeof __vue_exports__.default === "function"
	) {
	if (Object.keys(__vue_exports__).some(function (key) { return key !== "default" && key !== "__esModule" })) {console.error("named exports are not supported in *.vue files.")}
	__vue_options__ = __vue_exports__ = __vue_exports__.default
	}
	if (typeof __vue_options__ === "function") {
	  __vue_options__ = __vue_options__.options
	}
	__vue_options__.__file = "/home/dn/www/reform-city.docker/app/modules/pages/backend/assets/src/components/pages/PagesIndex.vue"
	__vue_options__.render = __vue_template__.render
	__vue_options__.staticRenderFns = __vue_template__.staticRenderFns

	/* hot reload */
	if (false) {(function () {
	  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  module.hot.accept()
	  if (!module.hot.data) {
	    hotAPI.createRecord("data-v-53a748eb", __vue_options__)
	  } else {
	    hotAPI.reload("data-v-53a748eb", __vue_options__)
	  }
	})()}
	if (__vue_options__.functional) {console.error("[vue-loader] PagesIndex.vue: functional components are not supported and should be defined in plain js files using render functions.")}

	module.exports = __vue_exports__


/***/ }),
/* 26 */
/***/ (function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//

	exports.default = {

	    computed: {
	        grid: function grid() {
	            return this.$store.getters['pages/grid'];
	        }
	    },

	    watch: {
	        '$route': function $route(refreshPage) {
	            this.$store.dispatch('pages/all', this.$route.query);
	        }
	    },

	    created: function created() {
	        this.$store.dispatch('pages/all');
	    }
	};

/***/ }),
/* 27 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
	  return _c('div', [_c('yc-admin-buttons', {
	    attrs: {
	      "model": _vm.model
	    }
	  }), _vm._v(" "), _c('div', {
	    domProps: {
	      "innerHTML": _vm._s(_vm.grid)
	    }
	  })], 1)
	},staticRenderFns: []}
	if (false) {
	  module.hot.accept()
	  if (module.hot.data) {
	     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-53a748eb", module.exports)
	  }
	}

/***/ }),
/* 28 */
/***/ (function(module, exports, __webpack_require__) {

	var __vue_exports__, __vue_options__
	var __vue_styles__ = {}

	/* script */
	__vue_exports__ = __webpack_require__(29)

	/* template */
	var __vue_template__ = __webpack_require__(39)
	__vue_options__ = __vue_exports__ = __vue_exports__ || {}
	if (
	  typeof __vue_exports__.default === "object" ||
	  typeof __vue_exports__.default === "function"
	) {
	if (Object.keys(__vue_exports__).some(function (key) { return key !== "default" && key !== "__esModule" })) {console.error("named exports are not supported in *.vue files.")}
	__vue_options__ = __vue_exports__ = __vue_exports__.default
	}
	if (typeof __vue_options__ === "function") {
	  __vue_options__ = __vue_options__.options
	}
	__vue_options__.__file = "/home/dn/www/reform-city.docker/app/modules/pages/backend/assets/src/components/pages/PagesEdit.vue"
	__vue_options__.render = __vue_template__.render
	__vue_options__.staticRenderFns = __vue_template__.staticRenderFns

	/* hot reload */
	if (false) {(function () {
	  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  module.hot.accept()
	  if (!module.hot.data) {
	    hotAPI.createRecord("data-v-3a629101", __vue_options__)
	  } else {
	    hotAPI.reload("data-v-3a629101", __vue_options__)
	  }
	})()}
	if (__vue_options__.functional) {console.error("[vue-loader] PagesEdit.vue: functional components are not supported and should be defined in plain js files using render functions.")}

	module.exports = __vue_exports__


/***/ }),
/* 29 */
/***/ (function(module, exports, __webpack_require__) {

	"use strict";

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});

	var _PageForm = __webpack_require__(30);

	var _PageForm2 = _interopRequireDefault(_PageForm);

	var _UrlForm = __webpack_require__(33);

	var _UrlForm2 = _interopRequireDefault(_UrlForm);

	var _FilesForm = __webpack_require__(36);

	var _FilesForm2 = _interopRequireDefault(_FilesForm);

	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

	exports.default = {

	    components: {
	        PageForm: _PageForm2.default,
	        UrlForm: _UrlForm2.default,
	        FilesForm: _FilesForm2.default
	    },

	    computed: {
	        isDev: function isDev() {
	            return this.$store.getters['isDev'];
	        },
	        isLoading: function isLoading() {
	            return this.$store.getters['isLoading'];
	        },
	        hasError: function hasError() {
	            return this.$store.getters['hasError'];
	        },
	        model: function model() {
	            return this.$store.getters['pages/model'];
	        }
	    },

	    created: function created() {
	        this.$store.dispatch('pages/find', this.$route.query.id);
	    },


	    watch: {
	        '$route': function $route() {
	            this.$store.dispatch('pages/find', this.$route.query.id);
	        }
	    },

	    methods: {
	        save: function save(event) {
	            var _this = this;

	            event.preventDefault();

	            var isNewRecord = this.model.id === null;

	            this.$store.dispatch('pages/save', this.model).then(function () {
	                if (_this.hasError) {
	                    return false;
	                }

	                _this.$notify({ type: 'success', text: 'Материал сохранен' });

	                if (isNewRecord) {
	                    _this.$router.push({ path: "/pages/page/update?id=" + _this.model.id });
	                }
	            });
	        },
	        destroy: function destroy() {
	            var _this2 = this;

	            this.$store.dispatch('pages/delete', this.model.id).then(function () {
	                _this2.$notify({ type: 'success', text: 'Материал удален' });
	                _this2.$router.push({ path: '/pages/page/index' });
	            });
	        }
	    }

	}; //
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//

/***/ }),
/* 30 */
/***/ (function(module, exports, __webpack_require__) {

	var __vue_exports__, __vue_options__
	var __vue_styles__ = {}

	/* script */
	__vue_exports__ = __webpack_require__(31)

	/* template */
	var __vue_template__ = __webpack_require__(32)
	__vue_options__ = __vue_exports__ = __vue_exports__ || {}
	if (
	  typeof __vue_exports__.default === "object" ||
	  typeof __vue_exports__.default === "function"
	) {
	if (Object.keys(__vue_exports__).some(function (key) { return key !== "default" && key !== "__esModule" })) {console.error("named exports are not supported in *.vue files.")}
	__vue_options__ = __vue_exports__ = __vue_exports__.default
	}
	if (typeof __vue_options__ === "function") {
	  __vue_options__ = __vue_options__.options
	}
	__vue_options__.__file = "/home/dn/www/reform-city.docker/app/modules/pages/backend/assets/src/components/PageForm.vue"
	__vue_options__.render = __vue_template__.render
	__vue_options__.staticRenderFns = __vue_template__.staticRenderFns

	/* hot reload */
	if (false) {(function () {
	  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  module.hot.accept()
	  if (!module.hot.data) {
	    hotAPI.createRecord("data-v-ac42a176", __vue_options__)
	  } else {
	    hotAPI.reload("data-v-ac42a176", __vue_options__)
	  }
	})()}
	if (__vue_options__.functional) {console.error("[vue-loader] PageForm.vue: functional components are not supported and should be defined in plain js files using render functions.")}

	module.exports = __vue_exports__


/***/ }),
/* 31 */
/***/ (function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//


	exports.default = {

	    props: ['model'],

	    computed: {
	        settings: function settings() {
	            return this.$store.getters['settings'];
	        },
	        statuses: function statuses() {
	            return _.isEmpty(this.settings) ? [] : this.settings.statusesList;
	        },
	        categories: function categories() {
	            return _.isEmpty(this.settings) ? [] : this.settings.pages.categories;
	        }
	    }

	};

/***/ }),
/* 32 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
	  return _c('b-card', {
	    staticClass: "mb-4",
	    attrs: {
	      "header": "Общая информация",
	      "header-class": "text-white bg-secondary",
	      "no-body": ""
	    }
	  }, [_c('b-card-body', [_c('b-form-group', {
	    attrs: {
	      "label": "Заголовок",
	      "label-for": "title",
	      "label-cols-sm": "2"
	    }
	  }, [_c('b-form-input', {
	    attrs: {
	      "id": "title",
	      "type": "text",
	      "required": "",
	      "trim": ""
	    },
	    model: {
	      value: (_vm.model.title),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "title", $$v)
	      },
	      expression: "model.title"
	    }
	  })], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Категория",
	      "label-for": "categoryId",
	      "label-cols-sm": "2"
	    }
	  }, [_c('b-form-select', {
	    staticClass: "col-3",
	    attrs: {
	      "id": "categoryId",
	      "options": _vm.categories
	    },
	    model: {
	      value: (_vm.model.categoryId),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "categoryId", $$v)
	      },
	      expression: "model.categoryId"
	    }
	  }, [_c('option', {
	    domProps: {
	      "value": null
	    }
	  }, [_vm._v("Нет")])])], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Статус",
	      "label-for": "status",
	      "label-cols-sm": "2"
	    }
	  }, [_c('b-form-select', {
	    staticClass: "col-3",
	    attrs: {
	      "id": "status",
	      "options": _vm.statuses
	    },
	    model: {
	      value: (_vm.model.status),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "status", $$v)
	      },
	      expression: "model.status"
	    }
	  })], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Шаблон",
	      "label-for": "template",
	      "label-cols-sm": "2",
	      "description": "Укажите имя файла шаблона, если требуется переопределить стандартный"
	    }
	  }, [_c('b-form-input', {
	    staticClass: "col-3",
	    attrs: {
	      "id": "template",
	      "type": "text",
	      "placeholder": "Имя файла",
	      "trim": ""
	    },
	    model: {
	      value: (_vm.model.template),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "template", $$v)
	      },
	      expression: "model.template"
	    }
	  })], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Короткое содержимое",
	      "label-for": "teaser"
	    }
	  }, [_c('vue-ckeditor', {
	    attrs: {
	      "config": {
	        height: 150
	      }
	    },
	    model: {
	      value: (_vm.model.teaser),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "teaser", $$v)
	      },
	      expression: "model.teaser"
	    }
	  })], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Полное содержимое",
	      "label-for": "body"
	    }
	  }, [_c('vue-ckeditor', {
	    model: {
	      value: (_vm.model.body),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "body", $$v)
	      },
	      expression: "model.body"
	    }
	  })], 1)], 1)], 1)
	},staticRenderFns: []}
	if (false) {
	  module.hot.accept()
	  if (module.hot.data) {
	     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-ac42a176", module.exports)
	  }
	}

/***/ }),
/* 33 */
/***/ (function(module, exports, __webpack_require__) {

	var __vue_exports__, __vue_options__
	var __vue_styles__ = {}

	/* script */
	__vue_exports__ = __webpack_require__(34)

	/* template */
	var __vue_template__ = __webpack_require__(35)
	__vue_options__ = __vue_exports__ = __vue_exports__ || {}
	if (
	  typeof __vue_exports__.default === "object" ||
	  typeof __vue_exports__.default === "function"
	) {
	if (Object.keys(__vue_exports__).some(function (key) { return key !== "default" && key !== "__esModule" })) {console.error("named exports are not supported in *.vue files.")}
	__vue_options__ = __vue_exports__ = __vue_exports__.default
	}
	if (typeof __vue_options__ === "function") {
	  __vue_options__ = __vue_options__.options
	}
	__vue_options__.__file = "/home/dn/www/reform-city.docker/app/modules/pages/backend/assets/src/components/UrlForm.vue"
	__vue_options__.render = __vue_template__.render
	__vue_options__.staticRenderFns = __vue_template__.staticRenderFns

	/* hot reload */
	if (false) {(function () {
	  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  module.hot.accept()
	  if (!module.hot.data) {
	    hotAPI.createRecord("data-v-ebb4a31e", __vue_options__)
	  } else {
	    hotAPI.reload("data-v-ebb4a31e", __vue_options__)
	  }
	})()}
	if (__vue_options__.functional) {console.error("[vue-loader] UrlForm.vue: functional components are not supported and should be defined in plain js files using render functions.")}

	module.exports = __vue_exports__


/***/ }),
/* 34 */
/***/ (function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//

	exports.default = {

	    props: ['model']

	};

/***/ }),
/* 35 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
	  return (_vm.model) ? _c('b-card', {
	    staticClass: "mb-4",
	    attrs: {
	      "header": "Seo настройки страницы",
	      "header-class": "text-white bg-secondary",
	      "no-body": ""
	    }
	  }, [_c('b-card-body', [_c('b-form-group', {
	    attrs: {
	      "label": "Адрес страницы",
	      "label-for": "url.alias",
	      "label-cols-sm": "2",
	      "description": "ЧПУ адрес страницы (например: articles/example-article-url-alias)"
	    }
	  }, [_c('b-form-input', {
	    attrs: {
	      "id": "url.alias",
	      "type": "text",
	      "trim": ""
	    },
	    model: {
	      value: (_vm.model.alias),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "alias", $$v)
	      },
	      expression: "model.alias"
	    }
	  })], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Заголовок страницы",
	      "label-for": "url.seoTitle",
	      "label-cols-sm": "2",
	      "description": "SEO заголовок страницы (значение meta title)"
	    }
	  }, [_c('b-form-input', {
	    attrs: {
	      "id": "url.seoTitle",
	      "type": "text",
	      "trim": ""
	    },
	    model: {
	      value: (_vm.model.seoTitle),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "seoTitle", $$v)
	      },
	      expression: "model.seoTitle"
	    }
	  })], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Ключевые слова",
	      "label-for": "url.seoKeywords",
	      "label-cols-sm": "2",
	      "description": "Ключевые слова через ',' (значение meta keywords)"
	    }
	  }, [_c('b-form-input', {
	    attrs: {
	      "id": "url.seoKeywords",
	      "type": "text",
	      "trim": ""
	    },
	    model: {
	      value: (_vm.model.seoKeywords),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "seoKeywords", $$v)
	      },
	      expression: "model.seoKeywords"
	    }
	  })], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Описание страницы",
	      "label-for": "url.seoDescription",
	      "label-cols-sm": "2",
	      "description": "Описание страницы в результатах поиска (значение meta description)"
	    }
	  }, [_c('b-form-textarea', {
	    attrs: {
	      "id": "textarea",
	      "placeholder": "Введите текст...",
	      "rows": "3",
	      "max-rows": "6"
	    },
	    model: {
	      value: (_vm.model.seoDescription),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "seoDescription", $$v)
	      },
	      expression: "model.seoDescription"
	    }
	  })], 1)], 1)], 1) : _vm._e()
	},staticRenderFns: []}
	if (false) {
	  module.hot.accept()
	  if (module.hot.data) {
	     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-ebb4a31e", module.exports)
	  }
	}

/***/ }),
/* 36 */
/***/ (function(module, exports, __webpack_require__) {

	var __vue_exports__, __vue_options__
	var __vue_styles__ = {}

	/* script */
	__vue_exports__ = __webpack_require__(37)

	/* template */
	var __vue_template__ = __webpack_require__(38)
	__vue_options__ = __vue_exports__ = __vue_exports__ || {}
	if (
	  typeof __vue_exports__.default === "object" ||
	  typeof __vue_exports__.default === "function"
	) {
	if (Object.keys(__vue_exports__).some(function (key) { return key !== "default" && key !== "__esModule" })) {console.error("named exports are not supported in *.vue files.")}
	__vue_options__ = __vue_exports__ = __vue_exports__.default
	}
	if (typeof __vue_options__ === "function") {
	  __vue_options__ = __vue_options__.options
	}
	__vue_options__.__file = "/home/dn/www/reform-city.docker/app/modules/files/backend/assets/src/components/FilesForm.vue"
	__vue_options__.render = __vue_template__.render
	__vue_options__.staticRenderFns = __vue_template__.staticRenderFns

	/* hot reload */
	if (false) {(function () {
	  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  module.hot.accept()
	  if (!module.hot.data) {
	    hotAPI.createRecord("data-v-5f595c2c", __vue_options__)
	  } else {
	    hotAPI.reload("data-v-5f595c2c", __vue_options__)
	  }
	})()}
	if (__vue_options__.functional) {console.error("[vue-loader] FilesForm.vue: functional components are not supported and should be defined in plain js files using render functions.")}

	module.exports = __vue_exports__


/***/ }),
/* 37 */
/***/ (function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//

	exports.default = {

	    props: {
	        title: {
	            type: String,
	            default: 'Изображения'
	        },
	        models: {
	            type: Array
	        },
	        multiple: Boolean
	    },

	    data: function data() {
	        return {
	            isLoading: false,
	            uploads: [],
	            headers: {
	                Authorization: 'Bearer ' + this.$auth.token()
	            }
	        };
	    },


	    computed: {
	        files: {
	            get: function get() {
	                return this.models;
	            },
	            set: function set(value) {
	                this.$emit('update:models', value);
	            }
	        },
	        settings: function settings() {
	            return this.$store.getters['settings'];
	        }
	    },

	    watch: {
	        models: function models(_models) {
	            this.models = _models;
	        }
	    },

	    methods: {
	        src: function src(file) {
	            if (file.modelId) {
	                return '/storage/' + file.storageDirName + '/' + this.settings.presets.default.name + '/' + file.name;
	            }

	            return '/temp/' + file.name;
	        },
	        inputFile: function inputFile(newFile, oldFile) {

	            if (newFile && !oldFile) {
	                // Add file
	            }

	            if (newFile && oldFile) {
	                // Update file

	                // Start upload
	                if (newFile.active !== oldFile.active) {}

	                // Upload error
	                if (newFile.error !== oldFile.error) {
	                    this.isLoading = false;
	                    this.$store.dispatch('failing', newFile.response);
	                }

	                // Uploaded successfully
	                if (newFile.success !== oldFile.success) {
	                    this.isLoading = false;

	                    if (!this.multiple) {
	                        this.files.map(function (file) {
	                            return file.status = false;
	                        });
	                    }

	                    this.files.push(newFile.response);
	                }
	            }

	            // Automatic upload
	            if (Boolean(newFile) !== Boolean(oldFile) || oldFile.error !== newFile.error) {
	                if (!this.$refs.upload.active) {
	                    this.isLoading = true;
	                    this.$refs.upload.active = true;
	                }
	            }
	        }
	    }

	};

/***/ }),
/* 38 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
	  return (_vm.files) ? _c('b-card', {
	    staticClass: "mb-4",
	    attrs: {
	      "header": _vm.title,
	      "header-class": "text-white bg-secondary",
	      "no-body": ""
	    }
	  }, [_c('b-card-body', [_c('file-upload', {
	    ref: "upload",
	    staticClass: "btn btn-primary mb-2",
	    attrs: {
	      "post-action": "/files/api/v1/upload/image",
	      "extensions": "gif,jpg,jpeg,png",
	      "accept": "image/png,image/gif,image/jpeg",
	      "multiple": _vm.multiple,
	      "size": 1024 * 1024 * 10,
	      "headers": _vm.headers,
	      "disabled": _vm.isLoading
	    },
	    on: {
	      "input-file": _vm.inputFile
	    },
	    model: {
	      value: (_vm.uploads),
	      callback: function($$v) {
	        _vm.uploads = $$v
	      },
	      expression: "uploads"
	    }
	  }, [(_vm.isLoading) ? _c('span', [_c('i', {
	    staticClass: "fa fa-spinner fa-spin"
	  }), _vm._v("\n                Загрузка ...\n            ")]) : _c('span', [_c('i', {
	    staticClass: "fa fa-plus"
	  }), _vm._v("\n                Загрузить файлы\n            ")])]), _vm._v(" "), (_vm.files.length) ? _c('div', {
	    staticClass: "yc-files"
	  }, [_c('table', {
	    staticClass: "table table-striped"
	  }, [_c('thead', [_c('tr', [_c('th', [_vm._v("#")]), _vm._v(" "), _c('th', [_vm._v("Изображение")]), _vm._v(" "), _c('th', [_vm._v("Информация")]), _vm._v(" "), _c('th', [_vm._v("Действия")])])]), _vm._v(" "), _c('draggable', {
	    attrs: {
	      "element": 'tbody',
	      "handle": ".yc-file__handle"
	    },
	    model: {
	      value: (_vm.files),
	      callback: function($$v) {
	        _vm.files = $$v
	      },
	      expression: "files"
	    }
	  }, _vm._l((_vm.files), function(file, index) {
	    return (file.status) ? _c('tr', {
	      key: file.id,
	      staticClass: "yc-file"
	    }, [_c('td', {
	      staticClass: "align-middle"
	    }, [_c('i', {
	      staticClass: "fa fa-arrows-alt yc-file__handle"
	    })]), _vm._v(" "), _c('td', {
	      staticClass: "align-middle"
	    }, [_c('img', {
	      staticClass: "yc-file__img",
	      attrs: {
	        "src": _vm.src(file)
	      }
	    })]), _vm._v(" "), _c('td', [_c('b-form-group', {
	      attrs: {
	        "label": "Имя",
	        "label-cols-sm": "2"
	      }
	    }, [_c('div', [_vm._v(_vm._s(file.name))])]), _vm._v(" "), _c('b-form-group', {
	      attrs: {
	        "label": "Alt",
	        "label-cols-sm": "2"
	      }
	    }, [_c('b-form-input', {
	      attrs: {
	        "type": "text",
	        "placeholder": "Альтернативный тест",
	        "trim": ""
	      },
	      model: {
	        value: (file.alt),
	        callback: function($$v) {
	          _vm.$set(file, "alt", $$v)
	        },
	        expression: "file.alt"
	      }
	    })], 1), _vm._v(" "), _c('b-form-group', {
	      attrs: {
	        "label": "Title",
	        "label-cols-sm": "2"
	      }
	    }, [_c('b-form-input', {
	      attrs: {
	        "type": "text",
	        "placeholder": "Заголовок",
	        "trim": ""
	      },
	      model: {
	        value: (file.title),
	        callback: function($$v) {
	          _vm.$set(file, "title", $$v)
	        },
	        expression: "file.title"
	      }
	    })], 1)], 1), _vm._v(" "), _c('td', [_c('b-button', {
	      attrs: {
	        "variant": "danger",
	        "title": "Удалить"
	      },
	      on: {
	        "click": function($event) {
	          file.status = false
	        }
	      }
	    }, [_c('i', {
	      staticClass: "fa fa-trash"
	    })])], 1)]) : _vm._e()
	  }), 0)], 1)]) : _vm._e()], 1)], 1) : _vm._e()
	},staticRenderFns: []}
	if (false) {
	  module.hot.accept()
	  if (module.hot.data) {
	     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-5f595c2c", module.exports)
	  }
	}

/***/ }),
/* 39 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
	  return _c('div', [(_vm.model) ? _c('b-form', {
	    on: {
	      "submit": _vm.save
	    }
	  }, [_c('yc-admin-buttons', {
	    attrs: {
	      "model": _vm.model
	    },
	    on: {
	      "save": _vm.save,
	      "destroy": _vm.destroy
	    }
	  }), _vm._v(" "), _c('page-form', {
	    attrs: {
	      "model": _vm.model
	    }
	  }), _vm._v(" "), _c('url-form', {
	    attrs: {
	      "model": _vm.model.url
	    }
	  }), _vm._v(" "), _c('files-form', {
	    attrs: {
	      "models": _vm.model.files,
	      "title": "Изображение превью",
	      "multiple": false
	    },
	    on: {
	      "update:models": function($event) {
	        return _vm.$set(_vm.model, "files", $event)
	      }
	    }
	  }), _vm._v(" "), _c('b-button', {
	    attrs: {
	      "type": "submit",
	      "variant": "primary",
	      "disabled": _vm.isLoading
	    }
	  }, [_vm._v("Сохранить")]), _vm._v(" "), (_vm.isDev) ? _c('pre', [_vm._v("model: " + _vm._s(_vm.model))]) : _vm._e()], 1) : _vm._e()], 1)
	},staticRenderFns: []}
	if (false) {
	  module.hot.accept()
	  if (module.hot.data) {
	     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-3a629101", module.exports)
	  }
	}

/***/ }),
/* 40 */
/***/ (function(module, exports, __webpack_require__) {

	var __vue_exports__, __vue_options__
	var __vue_styles__ = {}

	/* script */
	__vue_exports__ = __webpack_require__(41)

	/* template */
	var __vue_template__ = __webpack_require__(42)
	__vue_options__ = __vue_exports__ = __vue_exports__ || {}
	if (
	  typeof __vue_exports__.default === "object" ||
	  typeof __vue_exports__.default === "function"
	) {
	if (Object.keys(__vue_exports__).some(function (key) { return key !== "default" && key !== "__esModule" })) {console.error("named exports are not supported in *.vue files.")}
	__vue_options__ = __vue_exports__ = __vue_exports__.default
	}
	if (typeof __vue_options__ === "function") {
	  __vue_options__ = __vue_options__.options
	}
	__vue_options__.__file = "/home/dn/www/reform-city.docker/app/modules/pages/backend/assets/src/components/pages/PagesDelete.vue"
	__vue_options__.render = __vue_template__.render
	__vue_options__.staticRenderFns = __vue_template__.staticRenderFns

	/* hot reload */
	if (false) {(function () {
	  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  module.hot.accept()
	  if (!module.hot.data) {
	    hotAPI.createRecord("data-v-60871462", __vue_options__)
	  } else {
	    hotAPI.reload("data-v-60871462", __vue_options__)
	  }
	})()}
	if (__vue_options__.functional) {console.error("[vue-loader] PagesDelete.vue: functional components are not supported and should be defined in plain js files using render functions.")}

	module.exports = __vue_exports__


/***/ }),
/* 41 */
/***/ (function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	//
	//
	//
	//


	exports.default = {
	    // TODO: must be removed
	    created: function created() {
	        var _this = this;

	        this.$store.dispatch('pages/delete', this.$route.query.id).then(function () {
	            _this.$notify({ type: 'success', text: 'Материал удален' });
	            _this.$router.push({ path: '/pages/page/index' });
	        });
	    }
	};

/***/ }),
/* 42 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
	  return _c("div")
	},staticRenderFns: []}
	if (false) {
	  module.hot.accept()
	  if (module.hot.data) {
	     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-60871462", module.exports)
	  }
	}

/***/ }),
/* 43 */
/***/ (function(module, exports, __webpack_require__) {

	var __vue_exports__, __vue_options__
	var __vue_styles__ = {}

	/* script */
	__vue_exports__ = __webpack_require__(44)

	/* template */
	var __vue_template__ = __webpack_require__(45)
	__vue_options__ = __vue_exports__ = __vue_exports__ || {}
	if (
	  typeof __vue_exports__.default === "object" ||
	  typeof __vue_exports__.default === "function"
	) {
	if (Object.keys(__vue_exports__).some(function (key) { return key !== "default" && key !== "__esModule" })) {console.error("named exports are not supported in *.vue files.")}
	__vue_options__ = __vue_exports__ = __vue_exports__.default
	}
	if (typeof __vue_options__ === "function") {
	  __vue_options__ = __vue_options__.options
	}
	__vue_options__.__file = "/home/dn/www/reform-city.docker/app/modules/pages/backend/assets/src/components/categories/CategoriesIndex.vue"
	__vue_options__.render = __vue_template__.render
	__vue_options__.staticRenderFns = __vue_template__.staticRenderFns

	/* hot reload */
	if (false) {(function () {
	  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  module.hot.accept()
	  if (!module.hot.data) {
	    hotAPI.createRecord("data-v-6c7aba96", __vue_options__)
	  } else {
	    hotAPI.reload("data-v-6c7aba96", __vue_options__)
	  }
	})()}
	if (__vue_options__.functional) {console.error("[vue-loader] CategoriesIndex.vue: functional components are not supported and should be defined in plain js files using render functions.")}

	module.exports = __vue_exports__


/***/ }),
/* 44 */
/***/ (function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//

	exports.default = {

	    computed: {
	        grid: function grid() {
	            return this.$store.getters['pages-categories/grid'];
	        }
	    },

	    watch: {
	        '$route': function $route() {
	            this.$store.dispatch('pages-categories/all', this.$route.query);
	        }
	    },

	    created: function created() {
	        this.$store.dispatch('pages-categories/all');
	    }
	};

/***/ }),
/* 45 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
	  return _c('div', [_c('yc-admin-buttons', {
	    attrs: {
	      "model": _vm.model
	    }
	  }), _vm._v(" "), _c('div', {
	    domProps: {
	      "innerHTML": _vm._s(_vm.grid)
	    }
	  })], 1)
	},staticRenderFns: []}
	if (false) {
	  module.hot.accept()
	  if (module.hot.data) {
	     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-6c7aba96", module.exports)
	  }
	}

/***/ }),
/* 46 */
/***/ (function(module, exports, __webpack_require__) {

	var __vue_exports__, __vue_options__
	var __vue_styles__ = {}

	/* script */
	__vue_exports__ = __webpack_require__(47)

	/* template */
	var __vue_template__ = __webpack_require__(48)
	__vue_options__ = __vue_exports__ = __vue_exports__ || {}
	if (
	  typeof __vue_exports__.default === "object" ||
	  typeof __vue_exports__.default === "function"
	) {
	if (Object.keys(__vue_exports__).some(function (key) { return key !== "default" && key !== "__esModule" })) {console.error("named exports are not supported in *.vue files.")}
	__vue_options__ = __vue_exports__ = __vue_exports__.default
	}
	if (typeof __vue_options__ === "function") {
	  __vue_options__ = __vue_options__.options
	}
	__vue_options__.__file = "/home/dn/www/reform-city.docker/app/modules/pages/backend/assets/src/components/categories/CategoriesEdit.vue"
	__vue_options__.render = __vue_template__.render
	__vue_options__.staticRenderFns = __vue_template__.staticRenderFns

	/* hot reload */
	if (false) {(function () {
	  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  module.hot.accept()
	  if (!module.hot.data) {
	    hotAPI.createRecord("data-v-35efd5f7", __vue_options__)
	  } else {
	    hotAPI.reload("data-v-35efd5f7", __vue_options__)
	  }
	})()}
	if (__vue_options__.functional) {console.error("[vue-loader] CategoriesEdit.vue: functional components are not supported and should be defined in plain js files using render functions.")}

	module.exports = __vue_exports__


/***/ }),
/* 47 */
/***/ (function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//
	//


	exports.default = {

	    computed: {
	        isDev: function isDev() {
	            return this.$store.getters['isDev'];
	        },
	        isLoading: function isLoading() {
	            return this.$store.getters['isLoading'];
	        },
	        hasError: function hasError() {
	            return this.$store.getters['hasError'];
	        },
	        model: function model() {
	            return this.$store.getters['pages-categories/model'];
	        },
	        settings: function settings() {
	            return this.$store.getters['settings'];
	        },
	        statuses: function statuses() {
	            return _.isEmpty(this.settings) ? [] : this.settings.statusesList;
	        },
	        categories: function categories() {
	            return _.isEmpty(this.settings) ? [] : this.settings.pages.categories;
	        }
	    },

	    created: function created() {
	        this.$store.dispatch('pages-categories/find', this.$route.query.id);
	    },


	    watch: {
	        '$route': function $route() {
	            this.$store.dispatch('pages-categories/find', this.$route.query.id);
	        }
	    },

	    methods: {
	        save: function save(event) {
	            var _this = this;

	            event.preventDefault();

	            var isNewRecord = this.model.id === null;

	            this.$store.dispatch('pages-categories/save', this.model).then(function () {
	                if (_this.hasError) {
	                    return false;
	                }

	                _this.$notify({ type: 'success', text: 'Категория сохранена' });

	                _this.$store.dispatch('settings');

	                if (isNewRecord) {
	                    _this.$router.push({ path: '/pages/category/update?id=' + _this.model.id });
	                }
	            });
	        },
	        destroy: function destroy() {
	            var _this2 = this;

	            this.$store.dispatch('pages-categories/delete', this.model.id).then(function () {
	                _this2.$notify({ type: 'success', text: 'Категория удалена' });
	                _this2.$store.dispatch('settings');
	                _this2.$router.push({ path: '/pages/category/index' });
	            });
	        }
	    }

	};

/***/ }),
/* 48 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
	  return _c('div', [(_vm.model) ? _c('b-form', {
	    on: {
	      "submit": _vm.save
	    }
	  }, [_c('yc-admin-buttons', {
	    attrs: {
	      "model": _vm.model
	    },
	    on: {
	      "save": _vm.save,
	      "destroy": _vm.destroy
	    }
	  }), _vm._v(" "), _c('b-card', {
	    staticClass: "mb-4",
	    attrs: {
	      "header": "Общая информация",
	      "header-class": "text-white bg-secondary",
	      "no-body": ""
	    }
	  }, [_c('b-card-body', [_c('b-form-group', {
	    attrs: {
	      "label": "Заголовок",
	      "label-for": "title",
	      "label-cols-sm": "2"
	    }
	  }, [_c('b-form-input', {
	    attrs: {
	      "id": "title",
	      "type": "text",
	      "required": "",
	      "trim": ""
	    },
	    model: {
	      value: (_vm.model.title),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "title", $$v)
	      },
	      expression: "model.title"
	    }
	  })], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Родительская категория",
	      "label-for": "parentId",
	      "label-cols-sm": "2"
	    }
	  }, [_c('b-form-select', {
	    staticClass: "col-3",
	    attrs: {
	      "id": "parentId",
	      "options": _vm.categories
	    },
	    model: {
	      value: (_vm.model.parentId),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "parentId", $$v)
	      },
	      expression: "model.parentId"
	    }
	  }, [_c('option', {
	    domProps: {
	      "value": null
	    }
	  }, [_vm._v("Нет")])])], 1), _vm._v(" "), _c('b-form-group', {
	    attrs: {
	      "label": "Статус",
	      "label-for": "status",
	      "label-cols-sm": "2"
	    }
	  }, [_c('b-form-select', {
	    staticClass: "col-3",
	    attrs: {
	      "id": "status",
	      "options": _vm.statuses
	    },
	    model: {
	      value: (_vm.model.status),
	      callback: function($$v) {
	        _vm.$set(_vm.model, "status", $$v)
	      },
	      expression: "model.status"
	    }
	  })], 1)], 1)], 1), _vm._v(" "), _c('b-button', {
	    attrs: {
	      "type": "submit",
	      "variant": "primary",
	      "disabled": _vm.isLoading
	    }
	  }, [_vm._v("Сохранить")]), _vm._v(" "), (_vm.isDev) ? _c('pre', [_vm._v("model: " + _vm._s(_vm.model))]) : _vm._e()], 1) : _vm._e()], 1)
	},staticRenderFns: []}
	if (false) {
	  module.hot.accept()
	  if (module.hot.data) {
	     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-35efd5f7", module.exports)
	  }
	}

/***/ }),
/* 49 */
/***/ (function(module, exports, __webpack_require__) {

	var __vue_exports__, __vue_options__
	var __vue_styles__ = {}

	/* script */
	__vue_exports__ = __webpack_require__(50)

	/* template */
	var __vue_template__ = __webpack_require__(51)
	__vue_options__ = __vue_exports__ = __vue_exports__ || {}
	if (
	  typeof __vue_exports__.default === "object" ||
	  typeof __vue_exports__.default === "function"
	) {
	if (Object.keys(__vue_exports__).some(function (key) { return key !== "default" && key !== "__esModule" })) {console.error("named exports are not supported in *.vue files.")}
	__vue_options__ = __vue_exports__ = __vue_exports__.default
	}
	if (typeof __vue_options__ === "function") {
	  __vue_options__ = __vue_options__.options
	}
	__vue_options__.__file = "/home/dn/www/reform-city.docker/app/modules/pages/backend/assets/src/components/categories/CategoriesDelete.vue"
	__vue_options__.render = __vue_template__.render
	__vue_options__.staticRenderFns = __vue_template__.staticRenderFns

	/* hot reload */
	if (false) {(function () {
	  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  module.hot.accept()
	  if (!module.hot.data) {
	    hotAPI.createRecord("data-v-a4521850", __vue_options__)
	  } else {
	    hotAPI.reload("data-v-a4521850", __vue_options__)
	  }
	})()}
	if (__vue_options__.functional) {console.error("[vue-loader] CategoriesDelete.vue: functional components are not supported and should be defined in plain js files using render functions.")}

	module.exports = __vue_exports__


/***/ }),
/* 50 */
/***/ (function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	//
	//
	//
	//


	exports.default = {
	    // TODO: must be removed
	    created: function created() {
	        var _this = this;

	        this.$store.dispatch('pages-categories/delete', this.$route.query.id).then(function () {
	            _this.$notify({ type: 'success', text: 'Категория удалена' });
	            _this.$store.dispatch('settings');
	            _this.$router.push({ path: '/pages/category/index' });
	        });
	    }
	};

/***/ }),
/* 51 */
/***/ (function(module, exports, __webpack_require__) {

	module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
	  return _c("div")
	},staticRenderFns: []}
	if (false) {
	  module.hot.accept()
	  if (module.hot.data) {
	     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-a4521850", module.exports)
	  }
	}

/***/ })
/******/ ]);