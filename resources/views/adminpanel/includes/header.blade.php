<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shopify </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{URL::to('assets')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{URL::to('assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{URL::to('assets')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::to('assets')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{URL::to('assets')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{URL::to('assets')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{URL::to('assets')}}/plugins/summernote/summernote-bs4.css">

  <link rel="stylesheet" href="{{URL::to('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  Rich Text Editor script
    <link rel="stylesheet" href="{{asset('richtexteditor/richtexteditor/rte_theme_default.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dist/jquery.tagsinput.min.css')}}" />
    End Rich text editor script
    <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{asset('tagger-master/tagger.css')}}" rel="stylesheet">
    <script src="{{asset('tagger-master/tagger.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     input tags script
    <script src="{{asset('assets/dist/jquery.tagsinput.min.js')}}"></script>

    end input tags
    <script type="text/javascript">
        var editor2 = new RichTextEditor(".inp_editor1");
        $('.tags').tagsInput();
        // $('.tags').addTag('foo');
        // $('.tags').removeTag('bar');

        $('.tags').tagsInput({
            'autocomplete_url': url_to_autocomplete_api,
            'autocomplete': { option: value, option: value},
            'height':'100px',
            'width':'300px',
            'interactive':true,
            'defaultText':'add a tag',
            'onAddTag':callback_function,
            'onRemoveTag':callback_function,
            'onChange' : callback_function,
            'delimiter': [',',';'],   // Or a string with a single delimiter. Ex: ';'
            'removeWithBackspace' : true,
            'minChars' : 0,
            'maxChars' : 0, // if not provided there is no limit
            'placeholderColor' : '#666666'
        });
    </script>

</head>


