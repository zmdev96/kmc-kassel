/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.uiColor = '#AADC6E';
  config.language = appLanguage;

  config.toolbarGroups = [
  		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
  		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
  		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
      { name: 'insert', groups: [ 'insert' ] },
  		{ name: 'forms', groups: [ 'forms' ] },
  		'/',
  		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
  		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
  		{ name: 'links', groups: [ 'links' ] },
  		'/',
  		{ name: 'styles', groups: [ 'styles' ] },
  		{ name: 'colors', groups: [ 'colors' ] },
  		{ name: 'tools', groups: [ 'tools' ] },
  		{ name: 'others', groups: [ 'others' ] },
  		{ name: 'about', groups: [ 'about' ] }
  	];

  	config.removeButtons = 'About,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField';
    config.filebrowserImageBrowseUrl = '/app-admin/filemanager/server';

};
