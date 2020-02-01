(function($){
  $(function(){

    $('.sidenav').sidenav();
    M.updateTextFields();
    $('.tabs').tabs();
    $('.collapsible').collapsible();
    $('.datepicker').datepicker();
    $('.tooltipped').tooltip();
    $('.dropdown-trigger').dropdown();
    $('.collapsible').collapsible();
    $('.fixed-action-btn').floatingActionButton();
    $('select').formSelect();
    $('.modal').modal({

        opacity: 0.8      
      });
    $('#guest').modal({
      onOpenEnd: function(){
        $('.modal-section').modal('close');
      }
     
    });

    $('#member_reg').modal({
      onOpenStart:function(){
       
        $('.modal-section').modal('close');
        
      },
      onOpenEnd: function(){
    }
    });

    $('#tour_reg').modal({
      onOpenEnd: function(){
        $('.modal-section').modal('close');
    }
    });

    $('#resort_reg').modal({
      onOpenEnd: function(){
        $('.modal-section').modal('close');
    }
    });

    $('#login_form').modal({
      onOpenEnd: function(){
        $('.modal-section').modal('close');
    }
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
