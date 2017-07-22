/******/(function (modules) {
  // webpackBootstrap
  /******/ // The module cache
  /******/var installedModules = {};
  /******/
  /******/ // The require function
  /******/function __webpack_require__(moduleId) {
    /******/
    /******/ // Check if module is in cache
    /******/if (installedModules[moduleId]) {
      /******/return installedModules[moduleId].exports;
      /******/
    }
    /******/ // Create a new module (and put it into the cache)
    /******/var module = installedModules[moduleId] = {
      /******/i: moduleId,
      /******/l: false,
      /******/exports: {}
      /******/ };
    /******/
    /******/ // Execute the module function
    /******/modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
    /******/
    /******/ // Flag the module as loaded
    /******/module.l = true;
    /******/
    /******/ // Return the exports of the module
    /******/return module.exports;
    /******/
  }
  /******/
  /******/
  /******/ // expose the modules object (__webpack_modules__)
  /******/__webpack_require__.m = modules;
  /******/
  /******/ // expose the module cache
  /******/__webpack_require__.c = installedModules;
  /******/
  /******/ // define getter function for harmony exports
  /******/__webpack_require__.d = function (exports, name, getter) {
    /******/if (!__webpack_require__.o(exports, name)) {
      /******/Object.defineProperty(exports, name, {
        /******/configurable: false,
        /******/enumerable: true,
        /******/get: getter
        /******/ });
      /******/
    }
    /******/
  };
  /******/
  /******/ // getDefaultExport function for compatibility with non-harmony modules
  /******/__webpack_require__.n = function (module) {
    /******/var getter = module && module.__esModule ?
    /******/function getDefault() {
      return module['default'];
    } :
    /******/function getModuleExports() {
      return module;
    };
    /******/__webpack_require__.d(getter, 'a', getter);
    /******/return getter;
    /******/
  };
  /******/
  /******/ // Object.prototype.hasOwnProperty.call
  /******/__webpack_require__.o = function (object, property) {
    return Object.prototype.hasOwnProperty.call(object, property);
  };
  /******/
  /******/ // __webpack_public_path__
  /******/__webpack_require__.p = "";
  /******/
  /******/ // Load entry module and return exports
  /******/return __webpack_require__(__webpack_require__.s = 2);
  /******/
})(
/************************************************************************/
/******/{

  /***/"./resources/views/admin/modules/page/page.js":
  /***/function resourcesViewsAdminModulesPagePageJs(module, exports) {

    var App = {
      init: function init(controller, action) {
        if (typeof this.actions[controller] !== 'undefined' && typeof this.actions[controller][action] !== 'undefined') {
          return App.actions[controller][action]();
        }
      },
      // Controller-action methods
      actions: {
        controllerName: {
          actionName: function actionName() {
            // Do something here
          }
        }
      }
    };

    window.App = App;

    module.exports = App;

    /***/
  },

  /***/"./resources/views/admin/pages/attributes/create.js":
  /***/function resourcesViewsAdminPagesAttributesCreateJs(module, exports, __webpack_require__) {

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError("Cannot call a class as a function");
      }
    }

    var $ = __webpack_require__(0);
    var App = __webpack_require__("./resources/views/admin/modules/page/page.js");
    var Handlebars = __webpack_require__(1);

    var Page = function Page() {
      _classCallCheck(this, Page);

      var _this = this;
      var templates = {},
          attributeId = 0,
          optionId = 0;
      // function getSiteAttributes () {
      //     return $.get('/api/admin/attributes/sets/site/'+$('#site_id').val());
      //   };

      function getTemplates() {
        templates = {
          attribute: $('#attributeTemplate').html(),
          attributeOptions: $('#attributeOptionsTemplate').html()
        };
      };

      function renderTemplate(template, data) {
        return Handlebars.compile(template)(data);
      }

      getTemplates();

      this.renderAttribute = function () {
        var localAttributeId = attributeId++,
            template = renderTemplate(templates.attribute, { 'attributeId': localAttributeId });
        $(template).appendTo('#form-site');
        _this.renderAttributeOption(localAttributeId);
      };

      this.renderAttributeOption = function (attributeId) {
        console.log('s', attributeId);
      };

      this.renderAttribute();

      //     _this.renderAttributeSetAttributes = function(){
      //         let siteTranslationId = $('#site_translation_id').val(),
      //             attributeSetId = $('#attribute_set_id').val(),
      //             template = renderTemplate(templates.attributeSetAttributes, data[siteTranslationId].attributeSets[attributeSetId]);
      //         $('#attributeSetAttributes').html(template);
      //     }

      //     _this.renderAttributeSets();
      //   }
      // );
    };

    App.actions.AttributeController = {
      create: function create() {
        window.page = new Page();
      }
    };

    /***/
  },

  /***/"./resources/views/admin/pages/products/create.js":
  /***/function resourcesViewsAdminPagesProductsCreateJs(module, exports, __webpack_require__) {

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError("Cannot call a class as a function");
      }
    }

    var $ = __webpack_require__(0);
    var App = __webpack_require__("./resources/views/admin/modules/page/page.js");
    var Handlebars = __webpack_require__(1);

    var Page = function Page() {
      _classCallCheck(this, Page);

      var _this = this;
      var templates = {};
      function getSiteAttributes() {
        return $.get('/api/admin/attributes/sets/site/' + $('#site_id').val());
      };

      function getTemplates() {
        templates = {
          attributeSet: $('#attributeSetTemplate').html(),
          attributeSetAttributes: $('#attributeSetAttributesTemplate').html()
        };
      };

      function renderTemplate(template, data) {
        return Handlebars.compile(template)(data);
      }

      getSiteAttributes().done(function (data) {
        getTemplates();
        _this.renderAttributeSets = function () {
          var siteTranslationId = $('#site_translation_id').val(),
              template = renderTemplate(templates.attributeSet, data[siteTranslationId]);
          $('#attributeSet').html(template);
          _this.renderAttributeSetAttributes();
        };

        _this.renderAttributeSetAttributes = function () {
          var siteTranslationId = $('#site_translation_id').val(),
              attributeSetId = $('#attribute_set_id').val(),
              template = renderTemplate(templates.attributeSetAttributes, data[siteTranslationId].attributeSets[attributeSetId]);
          $('#attributeSetAttributes').html(template);
        };

        _this.renderAttributeSets();
      });
    };

    App.actions.ProductController = {
      create: function create() {
        window.page = new Page();
      }
    };

    /***/
  },

  /***/"./resources/views/admin/pages/sites/translation/create.js":
  /***/function resourcesViewsAdminPagesSitesTranslationCreateJs(module, exports) {

    function siteTranslationCreateUserInputHelper() {}
    // if ($('#is_default').prop('checked',1)) {

    // }


    /***/
  },

  /***/"./resources/views/crewing/modules/page/page.js":
  /***/function resourcesViewsCrewingModulesPagePageJs(module, exports) {

    var App = {
      init: function init(controller, action) {
        if (typeof this.actions[controller] !== 'undefined' && typeof this.actions[controller][action] !== 'undefined') {
          return App.actions[controller][action]();
        }
      },
      // Controller-action methods
      actions: {
        controllerName: {
          actionName: function actionName() {
            // Do something here
          }
        }
      }
    };

    window.App = App;

    module.exports = App;

    /***/
  },

  /***/"./resources/views/crewing/pages/candidates/create.js":
  /***/function resourcesViewsCrewingPagesCandidatesCreateJs(module, exports, __webpack_require__) {

    function _classCallCheck(instance, Constructor) {
      if (!(instance instanceof Constructor)) {
        throw new TypeError("Cannot call a class as a function");
      }
    }

    var $ = __webpack_require__(0);
    var App = __webpack_require__("./resources/views/crewing/modules/page/page.js");
    var Handlebars = __webpack_require__(1);

    var Page = function Page() {
      _classCallCheck(this, Page);

      var _this = this,
          templates = {},
          seaServiceId = 0,
          certificateId = 0,
          educationId = 0;

      function getTemplates() {
        templates = {
          seaService: $('#seaServiceTemplate').html(),
          certificate: $('#certificateTemplate').html(),
          education: $('#educationTemplate').html()
        };
      };

      function renderTemplate(template, data) {
        return Handlebars.compile(template)(data);
      }

      getTemplates();

      this.renderSeaService = function () {
        var localAttributeId = seaServiceId++,
            template = renderTemplate(templates.seaService, { 'seaServiceId': localAttributeId });
        $(template).appendTo('#seaServices');
      };

      this.renderCertificate = function () {
        var localAttributeId = certificateId++,
            template = renderTemplate(templates.certificate, { 'certificateId': localAttributeId });
        $(template).appendTo('#certificate');
      };

      this.renderEducation = function () {
        var localAttributeId = educationId++,
            template = renderTemplate(templates.education, { 'educationId': localAttributeId });
        $(template).appendTo('#education');
      };
    };

    App.actions.CandidateController = {
      create: function create() {
        window.page = new Page();
      },
      edit: function edit() {
        window.page = new Page();
      }
    };

    module.exports.Page = Page;

    /***/
  },

  /***/0:
  /***/function _(module, exports) {

    module.exports = jQuery;

    /***/
  },

  /***/1:
  /***/function _(module, exports) {

    module.exports = Handlebars;

    /***/
  },

  /***/2:
  /***/function _(module, exports, __webpack_require__) {

    __webpack_require__("./resources/views/admin/modules/page/page.js");
    __webpack_require__("./resources/views/admin/pages/attributes/create.js");
    __webpack_require__("./resources/views/admin/pages/products/create.js");
    __webpack_require__("./resources/views/admin/pages/sites/translation/create.js");
    __webpack_require__("./resources/views/crewing/modules/page/page.js");
    module.exports = __webpack_require__("./resources/views/crewing/pages/candidates/create.js");

    /***/
  }

  /******/ });