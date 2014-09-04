<!doctype html>
<html lang="en">
  <head>
    @include('layouts.meta')

    <link rel="icon" type="image/ico" href="http://l4.dev/assets/images/favicon.ico" />
    <!-- JQuery library. Need for confirmation to delete user, checkbox for paid in full, and other -->
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script> 
    <!-- Bootstrap -->
    {{ HTML::style('assets/css/vendor/bootstrap/bootstrap.min.css')}}
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    {{ HTML::style('assets/css/vendor/animate/animate.css') }}
    {{ HTML::style('assets/js/vendor/mmenu/css/jquery.mmenu.all.css') }}
    {{ HTML::style('assets/js/vendor/videobackground/css/jquery.videobackground.css') }}
    {{ HTML::style('assets/css/vendor/bootstrap-checkbox.css') }}

    {{ HTML::style('assets/js/vendor/chosen/css/chosen.min.css') }}
    {{ HTML::style('assets/js/vendor/chosen/css/chosen-bootstrap.css') }}
    {{ HTML::style('assets/js/vendor/datatables/css/dataTables.bootstrap.css') }}
    {{ HTML::style('assets/js/vendor/datatables/css/ColVis.css') }}
    {{ HTML::style('assets/js/vendor/datatables/css/TableTools.css') }}
    {{ HTML::style('assets/js/vendor/tabdrop/css/tabdrop.css') }}
    {{ HTML::style('assets/css/minimal.css') }}
    {{ HTML::style('css/style.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Place inside the <head> of your HTML -->
    {{HTML::script('js/tinymce/tinymce.min.js') }}

   
    <script type="text/javascript">
    function initTinyMce() {
  tinymce.remove();
  tinymce.init({
    selector: "textarea.em_content",
    plugins: ["image", "link", "responsivefilemanager"],
    image_advtab: true,
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager | shortCodes ",
    external_filemanager_path: file_uploader_path,
    filemanager_title: "Responsive Filemanager",
//    external_plugins: {"filemanager": "filemanager/plugin.min.js"},
    setup: function(editor) {
      editor.addButton('shortCodes', {
        type: 'listbox',
        text: 'Merge Codes',
        icon: false,
        onselect: function(e) {
          editor.insertContent(this.value());
          var con=editor.getContent({format : 'raw'});
          con.replace("studio", "W3Schools");
          editor.setContent(con);
        },
        values: [
          {text: 'Studio Business Name', value: '{{studio-business-name}}'},
          {text: 'Studio DBA Name', value: '{{studio-dba-name}}'},
          {text: 'Studio Address 1', value: '{{studio-address-1}}'},
          {text: 'Studio Address 2', value: '{{studio-address-2}}'},
          {text: 'Studio City', value: '{{studio-city}}'},
          {text: 'Studio State', value: '{{studio-state}}'},
          {text: 'Studio Province', value: '{{studio-province}}'},
          {text: 'Studio Zip/Postal Code', value: '{{studio-zip-postal-code}}'},
          {text: 'Studio Country', value: '{{studio-country}}'},
          {text: 'Studio Phone Number', value: '{{studio-phone-number}}'},
          {text: 'Studio Subscription Credit Card Type', value: '{{studio-subscription-cc-type}}'},
          {text: 'Studio Subscription Credit Card Last 4 Digits', value: '{{studio-subscription-cc-last-4}}'},
          {text: 'Student First Name', value: '{{student-first-name}}'},
          {text: 'Student Last Name', value: '{{student-last-name}}'},
          {text: 'Student Address 1', value: '{{student-address-1}}'},
          {text: 'Student Address 2', value: '{{student-address-2}}'},
          {text: 'Student City', value: '{{student-city}}'},
          {text: 'Student State', value: '{{student-state}}'},
          {text: 'Student Province', value: '{{student-province}}'},
          {text: 'Student Zip/Postal Code', value: '{{student-zip-postal-code}}'},
          {text: 'Student Country', value: '{{student-student-country}}'},
          {text: 'Student Phone Number', value: '{{student-phone-number}}'}
        ]
      });
    }
  });

}

    </script>

  </head>
  <body class="bg-3">
    @include('layouts.nav')
    <!-- Success-Messages -->
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block non-printable">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h4>Success</h4>
      {{{ $message }}}
    </div>
    @endif
    @yield('content')
    @include('layouts.footerScripts')

  </body>
</html>
