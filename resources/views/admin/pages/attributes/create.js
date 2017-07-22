var $ = require("jquery");
var App = require("../../modules/page/page.js");
var Handlebars = require("handlebars");


class Page  {
  constructor() {
    let _this = this;
    let templates = {},
        attributeId = 0,
        optionId = 0;
    // function getSiteAttributes () {
    //     return $.get('/api/admin/attributes/sets/site/'+$('#site_id').val());
    //   };
      
    function getTemplates () {
      templates = {
        attribute: $('#attributeTemplate').html(),
        attributeOptions: $('#attributeOptionsTemplate').html()
      }
    };
    
    function renderTemplate(template, data) {
      return Handlebars.compile(template)(data);
    }

    getTemplates();
    

    this.renderAttribute = function(){
        let localAttributeId = attributeId++,
            template = renderTemplate(templates.attribute, {'attributeId': localAttributeId});
        $(template).appendTo('#form-site');
        _this.renderAttributeOption(localAttributeId);
    }
    
    this.renderAttributeOption = function(attributeId){
      console.log('s', attributeId);
    }    

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
}

App.actions.AttributeController = {
  create: function(){
    window.page = new Page();
  }
};