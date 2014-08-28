

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{HTML::script('assets/js/vendor/bootstrap/bootstrap.min.js') }}
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&amp;skin=sons-of-obsidian"></script>
    {{HTML::script('assets/js/vendor/mmenu/js/jquery.mmenu.min.js') }}
    {{HTML::script('assets/js/vendor/sparkline/jquery.sparkline.min.js') }}
    {{HTML::script('assets/js/vendor/nicescroll/jquery.nicescroll.min.js') }}
    {{HTML::script('assets/js/vendor/animate-numbers/jquery.animateNumbers.js') }}
    {{HTML::script('assets/js/vendor/videobackground/jquery.videobackground.js') }}
    {{HTML::script('assets/js/vendor/blockui/jquery.blockUI.js') }}

    {{HTML::script('assets/js/vendor/datatables/jquery.dataTables.min.js') }}
    {{HTML::script('assets/js/vendor/datatables/ColReorderWithResize.js') }}
    {{HTML::script('assets/js/vendor/datatables/colvis/dataTables.colVis.min.js') }}
    {{HTML::script('assets/js/vendor/datatables/tabletools/ZeroClipboard.js') }}
    {{HTML::script('assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js') }}
    {{HTML::script('assets/js/vendor/datatables/dataTables.bootstrap.js') }}

    {{HTML::script('assets/js/vendor/tabdrop/bootstrap-tabdrop.min.js') }}
    {{HTML::script('assets/js/vendor/chosen/chosen.jquery.min.js') }}
    <!-- Need this for JS validation -->
    {{HTML::script('assets/js/vendor/parsley/parsley.min.js') }}
    {{HTML::script('assets/js/vendor/wizard/jquery.bootstrap.wizard.min.js') }}

    {{HTML::script('assets/js/minimal.js') }}

    <script>
    $(function(){
      
      // Add custom class to pagination div
      $.fn.dataTableExt.oStdClasses.sPaging = 'dataTables_paginate paging_bootstrap paging_custom';

      /*************************************************/
      /**************** BASIC DATATABLE ****************/
      /*************************************************/

      /* Define two custom functions (asc and desc) for string sorting */
      jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
          return ((x < y) ? -1 : ((x > y) ?  1 : 0));
      };
       
      jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
          return ((x < y) ?  1 : ((x > y) ? -1 : 0));
      };

      /* Add a click handler to the rows - this could be used as a callback */
      $("#inlineEditDataTable tbody tr").click( function( e ) {

        if ( $(this).hasClass('row_selected') ) {
          $(this).removeClass('row_selected');

        }
        else {
          // oTable02.$('tr.row_selected').removeClass('row_selected');
          $(this).addClass('row_selected');
        }
        num_rows = $('#inlineEditDataTable tr.row_selected').length;
        if(num_rows > 0){
          $('#email').removeClass('disabled');
          console.log(num_rows);
        }else{
          $('#email').addClass('disabled');
          console.log(num_rows);
        }

        // FadeIn/Out delete rows button
        if ($('#basicDataTable tr.row_selected').length > 0) {
          $('#deleteRow').stop().fadeIn(300);
        } else {
          $('#deleteRow').stop().fadeOut(300);
        }
      });


      // $("#select_all").click(function(){
      //   $("#inlineEditDataTable tbody tr").addClass('row_selected'); 
      //   $('#select_all').text('Deselect all');
      // });

      $("#select_button").click(function(){
          if ($(this).text() == 'Deselect All'){
            
            $(this).text('Select All');
            $("#inlineEditDataTable tbody tr").removeClass('row_selected');

            
          }else{
            $("#inlineEditDataTable tbody tr").addClass('row_selected');
            $(this).text('Deselect All');
          }
          num_rows = $('#inlineEditDataTable tr.row_selected').length;
          if(num_rows > 0){
            $('#email').removeClass('disabled');
            
          }else{
            $('#email').addClass('disabled');
            
          }

          
      });

      
      var oTable02 = $('#inlineEditDataTable').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{URL::to('players/deferLoading')}}",
        "deferLoading": true,
        "sDom":
          "R<'row'<'col-md-6'l><'col-md-6'f>r>"+
          "t"+
          "<'row'<'col-md-4 sm-center'i><'col-md-4'><'col-md-4 text-right sm-center'p>>",
        "oLanguage": {
          "sSearch": ""
        },
        "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ "no-sort" ] }
        ],
        "fnInitComplete": function(oSettings, json) { 
          $('.dataTables_filter input').attr("placeholder", "Search");
        }
      });
       
      //  $('#inlineEditDataTable tbody').on( 'click', 'tr', function () {
      //     console.log( oTable02.row( this ).data() );
      // } );
      
      $("#email").click(function(){

        $('#inlineEditDataTable tr.row_selected').each(function() {
          var id = $(this).find(".player_id").html();
          var email = $(this).find(".email").html(); 
          if(email.length !=0){
            var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "players[]").val(id);
            $('.email_form').append(input);
          }
        });
        $('.email_form').submit();
      });

      $("#print").click(function(){

        $('#inlineEditDataTable tr.row_selected').each(function() {
          $('form.print_all_players_form').append('<input type="hidden" name="players[]" value="'+$(this).attr('data-player')+'" />');
//          var url = $(this).find('.print').attr('href');
//          console.log(url);
//          window.open(url);
         
        });
        $('form.print_all_players_form').submit();
      });





      // Append add row button to table
      // var addRowLink = '<a href="#" id="addRow" class="btn btn-green btn-xs add-row">Add row</a>'
      // $('#inlineEditDataTable_wrapper').append(addRowLink);

      var nEditing = null;

      // Add row initialize
      $('#addRow').click( function (e) {
        e.preventDefault();

        // Only allow a new row when not currently editing
        if ( nEditing !== null ) {
          return;
        }
        
        var aiNew = oTable02.fnAddData([ '', '', '', '', '', '<a class="edit" href="">Edit</a>', '<a class="delete" href="">Delete</a>' ]);
        var nRow = oTable02.fnGetNodes(aiNew[0]);
        editRow(oTable02, nRow);
        nEditing = nRow;

        $(nRow).find('td:last-child').addClass('actions text-center');
      });

      // Delete row initialize
      $(document).on( "click", "#inlineEditDataTable a.delete", function(e) {
        e.preventDefault();
        
        var nRow = $(this).parents('tr')[0];
        oTable02.fnDeleteRow( nRow );
      });

      // Edit row initialize
      $(document).on( "click", "#inlineEditDataTable a.edit", function(e) {
        e.preventDefault();
         
        /* Get the row as a parent of the link that was clicked on */
        var nRow = $(this).parents('tr')[0];
         
        if (nEditing !== null && nEditing != nRow){
          /* A different row is being edited - the edit should be cancelled and this row edited */
          restoreRow(oTable02, nEditing);
          editRow(oTable02, nRow);
          nEditing = nRow;
        }
        else if (nEditing == nRow && this.innerHTML == "Save") {
          /* This row is being edited and should be saved */
          saveRow(oTable02, nEditing);
          nEditing = null;
        }
        else {
          /* No row currently being edited */
          editRow(oTable02, nRow);
          nEditing = nRow;
        }
      });

      

      $('.ColVis_MasterButton').on('click', function(){
        var newtop = $('.ColVis_collection').position().top - 45; 

        $('.ColVis_collection').addClass('dropdown-menu');
        $('.ColVis_collection>li>label').addClass('btn btn-default')     
        $('.ColVis_collection').css('top', newtop + 'px');
      });

      $('.DTTT_button_collection').on('click', function(){
        var newtop = $('.DTTT_dropdown').position().top - 45;   
        $('.DTTT_dropdown').css('top', newtop + 'px');
      });

      //initialize chosen
      $('.dataTables_length select').chosen({disable_search_threshold: 10});
      //chosen select input
      $(".chosen-select").chosen({disable_search_threshold: 10});
      
    })




    
      

      
    </script>
      

