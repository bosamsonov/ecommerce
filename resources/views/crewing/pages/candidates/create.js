var $ = require("jquery");
var App = require("../../modules/page/page.js");
var Handlebars = require("handlebars");


class Page  {
  constructor() {
    let _this = this,
        templates = {},
        seaServiceId = 0,
        certificateId = 0,
        educationId = 0;

    function getTemplates () {
      templates = {
        seaService: $('#seaServiceTemplate').html(),
        certificate: $('#certificateTemplate').html(),
        education: $('#educationTemplate').html()
      }
    };
    
    function renderTemplate(template, data) {
      return Handlebars.compile(template)(data);
    }

    getTemplates();
    
    this.renderSeaService = function(){
        let localAttributeId = seaServiceId++,
            template = renderTemplate(templates.seaService, {'seaServiceId': localAttributeId});
        $(template).appendTo('#seaServices');
    }
    
    this.renderCertificate = function(){
        let localAttributeId = certificateId++,
            template = renderTemplate(templates.certificate, {'certificateId': localAttributeId});
        $(template).appendTo('#certificate');
    }
    
    this.renderEducation = function(){
        let localAttributeId = educationId++,
            template = renderTemplate(templates.education, {'educationId': localAttributeId});
        $(template).appendTo('#education');
    }
  };
}

App.actions.CandidateController = {
  create: function(){
    window.page = new Page();
  },
   edit: function(){
    window.page = new Page();
  }
};



module.exports.Page = Page;