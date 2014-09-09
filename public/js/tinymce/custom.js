tinymce.init({
    selector: "textarea",
    plugins: "code",
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager | shortCodes ",

   setup: function(editor) {
      editor.addButton('shortCodes', {
         title: 'My title',
         text: 'shortCodes',
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
            {text: 'Player First Name', value: '{{first_name}}'},
            {text: 'Player Last Name', value: '{{last_name}}'},
            {text: 'Payment Due Date', value: '{{payment_due_date}}'},
            {text: 'Graduation Year', value: '{{graduation_year}}'},
            {text: 'Camp Year', value: '{{camp_year}}'},
            {text: 'Camp Season', value: '{{season}}'}, 
            {text: 'Unique link', value: '{{token}}'}, 
            {text: 'Logo', value: '{{logo}}'}
          ]
      });
   }
 });


