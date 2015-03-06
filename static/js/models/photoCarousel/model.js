var Backbone = require('backbone');

var photoCarouselModel = Backbone.Model.extend({
  defaults: {
    'url': '',
    'title': ''
  }
});

module.exports = photoCarouselModel;