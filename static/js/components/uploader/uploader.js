var $ = require('jquery');

var imageTpl = require('../../../templates/uploader/file.jade');

/**
 *
 * @param files
 * @private
 */
function _addFiles(files){
  var $container = $('.js-uploader-files-list')
    , template, html;

  $.each(files, function(i, file){

    if(file.type.match(/image.*/)){
      template = imageTpl;


      html = template({fileId: i, imageTitle: file.name});
      var $html = $(html);

      var fileReader = new FileReader();

      fileReader.onload = (function($img){
        return function(e){
          $img.attr('src', e.target.result);
        }
      })($html.find('.js-uploaded-image'));

      $html.get(0).file = file;

      $container.append($html);

      fileReader.readAsDataURL(file);
    }



  });

  _uploadFiles();

}

function _uploadFiles(){
  var filesContainers = $('.js-uploader-file');

  $.map(filesContainers, function(container){
    _fileUpload(container.file);
  });
}

function _fileUpload(file){
  console.log(file);
}

function _init(){
  console.log('Uploader Inited');
  $(document)
    .on('click', '.js-add-files', function(e){
      e.preventDefault();
      $('.js-file-add').trigger('click');
    })
    .on('change', '.js-file-add', function(){
      _addFiles(this.files);
    })
    .on('click', '.js-file-delete', function(e){
      e.preventDefault();
      $(this).closest('.js-uploader-file').remove();
    })
  ;
}

module.exports = {
  init: _init
};