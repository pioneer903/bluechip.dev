@extends('layouts.master')

@section('content')
    <!-- Wrap all page content here -->
    <div id="wrap">

      


      <!-- Make page fluid -->
      <div class="row">

        <!-- Page content -->
        <div id="content">
          

          <!-- content main container -->
          <div class="main">




            <!-- row -->
            <div class="row">

              <!-- col 12 -->
              <div class="col-md-10 col-md-offset-1">



                <!-- tile -->
                <section id="rootwizard" class="tabbable transparent tile">



                  <!-- tile header -->
                  <div class="tile-header transparent">
                    <h1><strong>Form</strong> Wizard</h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body">
                    
                  
                    <?php 
                      class MyClass
                      {
                        public $prop1 = "This is a class property";

                        public function setProperty($newval)
                        {
                          $this->prop1 = $newval;
                        }

                        public function getProperty()
                        {
                          return $this->prop1."<br>";
                        }
                      }
                      $obj = new MyClass;

                      echo $obj->getProperty();

                      $obj->setProperty("I am a new property value");

                      echo $obj->getProperty();
                     ?>






                  </div>
                  <!-- /tile body -->

                  <!-- tile footer -->
                  <div class="tile-footer border-top color white rounded-bottom-corners nopadding">
                    <ul class="pager pager-full wizard">
                      <li class="previous"><a href="javascript:;"><i class="fa fa-arrow-left fa-lg"></i></a></li>
                      <li class="next"><a href="javascript:;"><i class="fa fa-arrow-right fa-lg"></i></a></li>
                      <li class="next finish" style="display:none;"><a href="javascript:;"><i class="fa fa-check fa-lg"></i></a></li>
                    </ul>
                  </div>
                  <!-- /tile footer -->
                  
                


                </section>
                <!-- /tile -->




              </div>
              <!-- /col 12 -->


              
            </div>
            <!-- /row -->
          


          </div>
          <!-- /content container -->






        </div>
        <!-- Page content end -->






      </div>
      <!-- Make page fluid-->




    </div>
    <!-- Wrap all page content end -->



    <script>
    $(function(){

      //initialize form wizard
      $('#rootwizard').bootstrapWizard({

        'tabClass': 'nav nav-tabs tabdrop',
        onTabShow: function(tab, navigation, index) {
          var $total = navigation.find('li').not('.tabdrop').length;
          var $current = index+1;
          var $percent = ($current/$total) * 100;
          $('#rootwizard').find('#bar .progress-bar').css({width:$percent+'%'});

          // If it's the last tab then hide the last button and show the finish instead
          if($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
          } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
          }  
        },

        onNext: function(tab, navigation, index) {

          var form = $('.form' + index)

          form.parsley('validate');

          if(form.parsley('isValid')) {
            tab.addClass('success');       
          } else {
            return false;
          }

        },

        onTabClick: function(tab, navigation, index) {

          var form = $('.form' + (index+1))

          form.parsley('validate');

          if(form.parsley('isValid')) {
            tab.addClass('success');  
          } else {
            return false;
          }

        }

      });

      // Initialize tabDrop
      $('.tabdrop').tabdrop({text: '<i class="fa fa-th-list"></i>'});
      
      
    })
      
    </script>

    @endsection