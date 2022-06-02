tinymce.init({
    selector: 'textarea#publicarRespuesta, textarea#crearTema, textarea#contenidoHistoria',
    height: 200,
    menubar: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | fontselect fontsizeselect | ' +
    'bold italic underline forecolor backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat ',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px; color:black; }'
  });
  
  