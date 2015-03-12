var uploader = require('../uploader/uploader');

if(state.upldInit == true){
  uploader.init();
  $('.js-uploader-files-list').sortable();
};