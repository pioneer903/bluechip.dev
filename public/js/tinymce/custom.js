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
            {text: 'Unique link', value: '{{token}}'}
          ]
      });
   }
 });

//   tinymce.init({
//     selector: "textarea",
//     plugins: ["image", "link", "responsivefilemanager"],
//     image_advtab: true,
//     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager | shortCodes ",
//     external_filemanager_path: file_uploader_path,
//     filemanager_title: "Responsive Filemanager",
// //    external_plugins: {"filemanager": "filemanager/plugin.min.js"},
//     setup: function(editor) {
//       editor.addButton('shortCodes', {
//         type: 'listbox',
//         text: 'Merge Codes',
//         icon: false,
//         onselect: function(e) {
//           editor.insertContent(this.value());
//           var con=editor.getContent({format : 'raw'});
//           con.replace("studio", "W3Schools");
//           editor.setContent(con);
//         },
//         values: [
//           {text: 'Studio Business Name', value: '{{studio-business-name}}'},
//           {text: 'Studio DBA Name', value: '{{studio-dba-name}}'},
//           {text: 'Studio Address 1', value: '{{studio-address-1}}'},
//           {text: 'Studio Address 2', value: '{{studio-address-2}}'},
//           {text: 'Studio City', value: '{{studio-city}}'},
//           {text: 'Studio State', value: '{{studio-state}}'},
//           {text: 'Studio Province', value: '{{studio-province}}'},
//           {text: 'Studio Zip/Postal Code', value: '{{studio-zip-postal-code}}'},
//           {text: 'Studio Country', value: '{{studio-country}}'},
//           {text: 'Studio Phone Number', value: '{{studio-phone-number}}'},
//           {text: 'Studio Subscription Credit Card Type', value: '{{studio-subscription-cc-type}}'},
//           {text: 'Studio Subscription Credit Card Last 4 Digits', value: '{{studio-subscription-cc-last-4}}'},
//           {text: 'Student First Name', value: '{{student-first-name}}'},
//           {text: 'Student Last Name', value: '{{student-last-name}}'},
//           {text: 'Student Address 1', value: '{{student-address-1}}'},
//           {text: 'Student Address 2', value: '{{student-address-2}}'},
//           {text: 'Student City', value: '{{student-city}}'},
//           {text: 'Student State', value: '{{student-state}}'},
//           {text: 'Student Province', value: '{{student-province}}'},
//           {text: 'Student Zip/Postal Code', value: '{{student-zip-postal-code}}'},
//           {text: 'Student Country', value: '{{student-student-country}}'},
//           {text: 'Student Phone Number', value: '{{student-phone-number}}'}
//         ]
//       });
//     }
//   });


