  <!-- Notification Config-->
  <script type='text/javascript'>
    $(document).ready(function() {
      <?php $messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message):
         if ($message[2] == 'notify') {?>
          $.notify({
            icon: 'pe-7s-gift',
            message: '<?= $message[0] ?>'

            },{
            type: '<?= $message[1] ?>',
            timer: 1500
          });
      <?php } endforeach;endif; ?>
    });
  </script>
  <!-- Text Editor Config-->
  <script type='text/javascript'>
    var appLanguage =  '<?= $this->session->lang?>'
    CKEDITOR.replace( 'blogEditor',{
      width: '100%',
      height: 500,
      filebrowserUploadUrl: '/app-admin/filemanager/blogupload',
      filebrowserUploadMethod: 'form',
    });
    CKEDITOR.replace( 'userEditor',{
      width: '100%',
      height: 500,
    });
    CKEDITOR.replace( 'newsEditor',{
      width: '100%',
      height: 400,
      filebrowserUploadUrl: '/app-admin/filemanager/pagesupload',
      filebrowserUploadMethod: 'form',
    });
    CKEDITOR.replace( 'pagesEditor',{
      width: '100%',
      height: 500,
      filebrowserUploadUrl: '/app-admin/filemanager/pagesupload',
      filebrowserUploadMethod: 'form',
    });

    CKEDITOR.on( 'dialogDefinition', function (e) {
      dialogName        = e.data.name;
      dialogDefinition  = e.data.definition;
      if (dialogName == 'image') {
        dialogDefinition.removeContents('Link');
        dialogDefinition.removeContents('advanced');
      }
    });
  </script>
  <script type='text/javascript'>
    var CKEditorFuncNum = "<?php echo $_REQUEST['CKEditorFuncNum'];?>";
    var url = "http://<?=$_SERVER['SERVER_NAME'];?>/uploads/images";
    console.log(CKEditorFuncNum);
    function selectImage(imaName){
      url += imaName;
      window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, url);+
      window.close();
    }

  </script>

  </body>
</html>
