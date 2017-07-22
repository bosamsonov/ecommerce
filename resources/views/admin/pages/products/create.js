var $ = require("jquery");
var App = require("../../modules/page/page.js");
var Handlebars = require("handlebars");


class Page  {
  constructor() {
    let _this = this;
    let templates = {};
    function getSiteAttributes () {
        return $.get('/api/admin/attributes/sets/site/'+$('#site_id').val());
      };
      
    function getTemplates () {
      templates = {
        attributeSet: $('#attributeSetTemplate').html(),
        attributeSetAttributes: $('#attributeSetAttributesTemplate').html()
      }
    };
    
    function renderTemplate(template, data) {
      return Handlebars.compile(template)(data);
    }
    
    getSiteAttributes().done(function(data){
       getTemplates();
        _this.renderAttributeSets = function(){
            let siteTranslationId = $('#site_translation_id').val(),
                template = renderTemplate(templates.attributeSet, data[siteTranslationId]);
            $('#attributeSet').html(template);
            _this.renderAttributeSetAttributes();

        }
        
        _this.renderAttributeSetAttributes = function(){
            let siteTranslationId = $('#site_translation_id').val(),
                attributeSetId = $('#attribute_set_id').val(),
                template = renderTemplate(templates.attributeSetAttributes, data[siteTranslationId].attributeSets[attributeSetId]);
            $('#attributeSetAttributes').html(template);
        }
        
        _this.renderAttributeSets();
      }
    );
  };
}

App.actions.ProductController = {
  create: function(){
    window.page = new Page();
  }
};