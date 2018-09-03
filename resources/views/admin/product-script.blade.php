    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('public/admin-laptin/assets/js/jquery.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('public/admin-laptin/assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin-laptin/assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin-laptin/assets/js/vendor/mmenu/js/jquery.mmenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin-laptin/assets/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin-laptin/assets/js/vendor/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin-laptin/assets/js/vendor/animate-numbers/jquery.animateNumbers.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin-laptin/assets/js/vendor/videobackground/jquery.videobackground.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('public/admin-laptin/assets/js/vendor/blockui/jquery.blockUI.js')}}"></script>


    <script src="{{asset('public/admin-laptin/assets/js/vendor/summernote/summernote.min.js')}}"></script>

    <script src="{{asset('public/admin-laptin/assets/js/vendor/chosen/chosen.jquery.min.js')}}"></script>

    <script src="{{asset('public/admin-laptin/assets/js/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin-laptin/assets/js/vendor/datatables/ColReorderWithResize.js')}}"></script>
    <script src="{{asset('public/admin-laptin/assets/js/vendor/datatables/colvis/dataTables.colVis.min.js')}}"></script>
    <script src="{{asset('public/admin-laptin/assets/js/vendor/datatables/tabletools/ZeroClipboard.js')}}"></script>
    <script src="{{asset('public/admin-laptin/assets/js/vendor/datatables/tabletools/dataTables.tableTools.min.js')}}"></script>
    <script src="assets/js/vendor/datatables/dataTables.bootstrap.js')}}"></script>


    <script src="{{asset('public/admin-laptin/assets/js/vendor/momentjs/moment-with-langs.min.js')}}"></script>
    <script src="{{asset('public/admin-laptin/assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('public/admin-laptin/assets/js/vendor/colorpicker/bootstrap-colorpicker.min.js')}}"></script>

    <script src="{{asset('public/admin-laptin/assets/js/vendor/colorpalette/bootstrap-colorpalette.js')}}"></script>

    <script src="{{asset('public/admin-laptin/assets/js/minimal.min.js')}}"></script>

    <script>

    //initialize file upload button function
    // $(document)
    //   .on('change', '.btn-file :file', function() {
    //     var input = $(this),
    //     numFiles = input.get(0).files ? input.get(0).files.length : 1,
    //     label = input.val().replace(/\\/g, 'http://tattek.sk/').replace(/.*\//, '');
    //     input.trigger('fileselect', [numFiles, label]);
    // });


    $(function(){

      //load wysiwyg editor
      $('#input06').summernote({
        toolbar: [
          //['style', ['style']], // no style button
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          //['insert', ['picture', 'link']], // no insert buttons
          //['table', ['table']], // no table button
          //['help', ['help']] //no help button
        ],
        height: 137   //set editable area's height
      });

      //chosen select input
      $(".chosen-select").chosen({disable_search_threshold: 10});

      //initialize datepicker
      $('#datepicker').datetimepicker({
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-arrow-up",
          down: "fa fa-arrow-down"
        }
      });

      $("#datepicker").on("dp.show",function (e) {
        var newtop = $('.bootstrap-datetimepicker-widget').position().top - 45;      
        $('.bootstrap-datetimepicker-widget').css('top', newtop + 'px');
      });

      //initialize colorpicker
      $('#colorpicker').colorpicker();

      $('#colorpicker').colorpicker().on('showPicker', function(e){
        var newtop = $('.dropdown-menu.colorpicker.colorpicker-visible').position().top - 45;      
        $('.dropdown-menu.colorpicker.colorpicker-visible').css('top', newtop + 'px');
      });

      //initialize colorpicker RGB
      $('#colorpicker-rgb').colorpicker({
        format: 'rgb'
      });

      $('#colorpicker-rgb').colorpicker().on('showPicker', function(e){
        var newtop = $('.dropdown-menu.colorpicker.colorpicker-visible').position().top - 45;      
        $('.dropdown-menu.colorpicker.colorpicker-visible').css('top', newtop + 'px');
      });

      //initialize file upload button
      $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

            console.log(log);
        
        if( input.length ) {
          input.val(log);
        } else {
          if( log ) alert(log);
        }
        
      });

      // Initialize colorpalette
      $('#event-colorpalette').colorPalette({ 
        colors:[['#428bca', '#5cb85c', '#5bc0de', '#f0ad4e' ,'#d9534f', '#ff4a43', '#22beef', '#a2d200', '#ffc100', '#cd97eb', '#16a085', '#FF0066', '#A40778', '#1693A5']] 
      }).on('selectColor', function(e) {
        var data = $(this).data();

        $(data.returnColor).val(e.color);
        $(this).parents(".input-group").css("border-bottom-color", e.color );
      });
      
    })
      
    </script>

    <script>
    $(function(){

      // Add custom class to pagination div
      $.fn.dataTableExt.oStdClasses.sPaging = 'dataTables_paginate paging_bootstrap paging_custom';

      $('div.dataTables_filter input').addClass('form-control');
      $('div.dataTables_length select').addClass('form-control');

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
      $("#basicDataTable tbody tr").click( function( e ) {
        if ( $(this).hasClass('row_selected') ) {
          $(this).removeClass('row_selected');
        }
        else {
          oTable01.$('tr.row_selected').removeClass('row_selected');
          $(this).addClass('row_selected');
        }

        // FadeIn/Out delete rows button
        if ($('#basicDataTable tr.row_selected').length > 0) {
          $('#deleteRow').stop().fadeIn(300);
        } else {
          $('#deleteRow').stop().fadeOut(300);
        }
      });

      /* Build the DataTable with third column using our custom sort functions */
      var oTable01 = $('#basicDataTable').dataTable({
        "sDom":
          "R<'row'<'col-md-6'l><'col-md-6'f>r>"+
          "t"+
          "<'row'<'col-md-4 sm-center'i><'col-md-4'><'col-md-4 text-right sm-center'p>>",
        "oLanguage": {
          "sSearch": ""
        },
        "aaSorting": [ [0,'asc'], [1,'asc'] ],
        "aoColumns": [
          null,
          null,
          { "sType": 'string-case' },
          null,
          null
        ],
        "fnInitComplete": function(oSettings, json) { 
          $('.dataTables_filter input').attr("placeholder", "Search");
        }
      });

      // Append delete button to table
      var deleteRowLink = '<a href="#" id="deleteRow" class="btn btn-red btn-xs delete-row">Delete selected row</a>'
      $('#basicDataTable_wrapper').append(deleteRowLink);

      /* Add a click handler for the delete row */
      $('#deleteRow').click( function() {
        var anSelected = fnGetSelected(oTable01);
        if (anSelected.length !== 0 ) {
          oTable01.fnDeleteRow(anSelected[0]);
          $('#deleteRow').stop().fadeOut(300);
        }
      });

      /* Get the rows which are currently selected */
      function fnGetSelected(oTable01Local){
        return oTable01Local.$('tr.row_selected');
      };

      /*******************************************************/
      /**************** INLINE EDIT DATATABLE ****************/
      /*******************************************************/

      function restoreRow (oTable02, nRow){
        var aData = oTable02.fnGetData(nRow);
        var jqTds = $('>td', nRow);
        
        for ( var i=0, iLen=jqTds.length ; i<iLen ; i++ ) {
          oTable02.fnUpdate( aData[i], nRow, i, false );
        }
        
        oTable02.fnDraw();
      };

      function editRow (oTable02, nRow){
        var aData = oTable02.fnGetData(nRow);
        var jqTds = $('>td', nRow);
        jqTds[0].innerHTML = '<input type="text" value="'+aData[0]+'" class="form-control">';
        jqTds[1].innerHTML = '<input type="text" value="'+aData[1]+'" class="form-control">';
        jqTds[2].innerHTML = '<input type="text" value="'+aData[2]+'" class="form-control">';
        jqTds[3].innerHTML = '<input type="text" value="'+aData[3]+'" class="form-control">';
        jqTds[4].innerHTML = '<input type="text" value="'+aData[4]+'" class="form-control">';
        jqTds[5].innerHTML = '<a class="edit save" href="#">Save</a><a class="delete" href="#">Delete</a>';
      };

      function saveRow (oTable02, nRow){
        var jqInputs = $('input', nRow);
        oTable02.fnUpdate( jqInputs[0].value, nRow, 0, false );
        oTable02.fnUpdate( jqInputs[1].value, nRow, 1, false );
        oTable02.fnUpdate( jqInputs[2].value, nRow, 2, false );
        oTable02.fnUpdate( jqInputs[3].value, nRow, 3, false );
        oTable02.fnUpdate( jqInputs[4].value, nRow, 4, false );
        oTable02.fnUpdate( '<a class="edit" href="#">Edit</a><a class="delete" href="#">Delete</a>', nRow, 5, false );
        oTable02.fnDraw();
      };



      var oTable02 = $('#inlineEditDataTable').dataTable({
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

      // Append add row button to table
      var addRowLink = '<a href="#" id="addRow" class="btn btn-green btn-xs add-row">Add row</a>'
      $('#inlineEditDataTable_wrapper').append(addRowLink);

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

      /******************************************************/
      /**************** DRILL DOWN DATATABLE ****************/
      /******************************************************/

      var anOpen = [];

      var oTable03 = $('#drillDownDataTable').dataTable({
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
        "aaSorting": [[ 1, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "assets/js/vendor/datatables/ajax/sources/objects.txt",
        "aoColumns": [
          {
            "mDataProp": null,
            "sClass": "control text-center",
            "sDefaultContent": '<a href="#"><i class="fa fa-plus"></i></a>'
          },
          { "mDataProp": "engine" },
          { "mDataProp": "browser" },
          { "mDataProp": "grade" }
        ],
        "fnInitComplete": function(oSettings, json) { 
          $('.dataTables_filter input').attr("placeholder", "Search");
        }
      });

      $(document).on( 'click', '#drillDownDataTable td.control', function () {
        var nTr = this.parentNode;
        var i = $.inArray( nTr, anOpen );

        $(anOpen).each( function () {
          if ( this !== nTr ) {
            $('td.control', this).click();
          }
        });
        
        if ( i === -1 ) {
          $('i', this).removeClass().addClass('fa fa-minus');
          $(this).parent().addClass('drilled');
          var nDetailsRow = oTable03.fnOpen( nTr, fnFormatDetails(oTable03, nTr), 'details' );
          $('div.innerDetails', nDetailsRow).slideDown();
          anOpen.push( nTr );
        }
        else {
          $('i', this).removeClass().addClass('fa fa-plus');
          $(this).parent().removeClass('drilled');
          $('div.innerDetails', $(nTr).next()[0]).slideUp( function () {
            oTable03.fnClose( nTr );
            anOpen.splice( i, 1 );
          } );
        }

        return false;
      });
       
      function fnFormatDetails( oTable03, nTr ){
        var oData = oTable03.fnGetData( nTr );
        var sOut =
          '<div class="innerDetails">'+
            '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
              '<tr><td>Rendering engine:</td><td>'+oData.engine+'</td></tr>'+
              '<tr><td>Browser:</td><td>'+oData.browser+'</td></tr>'+
              '<tr><td>Platform:</td><td>'+oData.platform+'</td></tr>'+
              '<tr><td>Version:</td><td>'+oData.version+'</td></tr>'+
              '<tr><td>Grade:</td><td>'+oData.grade+'</td></tr>'+
            '</table>'+
          '</div>';
        return sOut;
      };

      /****************************************************/
      /**************** ADVANCED DATATABLE ****************/
      /****************************************************/

      var oTable04 = $('#advancedDataTable').dataTable({
        "sDom":
          "<'row'<'col-md-4'l><'col-md-4 text-center sm-left'T C><'col-md-4'f>r>"+
          "t"+
          "<'row'<'col-md-4 sm-center'i><'col-md-4'><'col-md-4 text-right sm-center'p>>",
         "oLanguage": {
          "sSearch": ""
        },
        "oTableTools": {
          "sSwfPath": "assets/js/vendor/datatables/tabletools/swf/copy_csv_xls_pdf.swf",
          "aButtons": [
            "copy",
            "print",
            {
              "sExtends":    "collection",
              "sButtonText": 'Save <span class="caret" />',
              "aButtons":    [ "csv", "xls", "pdf" ]
            }
          ]
        },
        "fnInitComplete": function(oSettings, json) { 
          $('.dataTables_filter input').attr("placeholder", "Search");
        },
        "oColVis": {
          "buttonText": '<i class="fa fa-eye"></i>'
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

      // Add custom class
      $('div.dataTables_filter input').addClass('form-control');
      $('div.dataTables_length select').addClass('form-control');
      
    })
      
    </script>