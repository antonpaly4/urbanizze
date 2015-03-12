var $ = require('jquery');

function _init(){
  $(document)
    .on('dragstart', '.js-draggable', function(e){
      this.style.opacity = '0.5';
    });
}

module.exports = {
  init: _init
};