var uploader = require('../uploader/uploader');

if(state.page == 'event_add'){
  uploader.init();
  $('.js-uploader-files-list').sortable();
};