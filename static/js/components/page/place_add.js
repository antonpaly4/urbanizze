var uploader = require('../uploader/uploader');

if(state.page == 'place_add'){
  uploader.init();
  $('.js-uploader-files-list').sortable();
};