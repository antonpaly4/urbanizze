var Backbone = require('backbone');

var carouselModel = require('../../models/photoCarousel/model');

var photoCarouselCollection = Backbone.Collection.extend({
  model: carouselModel
});

var carouselCollection = new photoCarouselCollection([
  {
    'url': 'public/img/photos/photo.jpg',
    'title': 'Alt text'
  },
  {
    'url': 'public/img/photos/photo.jpg',
    'title': 'Alt text'
  },
  {
    'url': 'public/img/photos/photo.jpg',
    'title': 'Alt text'
  }
]);

module.exports = carouselCollection;

