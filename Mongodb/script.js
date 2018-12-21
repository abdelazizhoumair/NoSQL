 
$(function(){
    $('#add_player').click(function(e){
      e.preventDefault();
      // alert("hello");
      $.ajax({
        url: 'add_player.php',
        type: 'post',
        data: $('#form_add_player').serialize(),
        success: function(res,statut){
            $('#res_add_player').html("<p id='msg' class='alert-success'>"+res+ "</p>");
        },
        error: function(res)  
          {   
            $("#res_add_player").html("<p id='msg' class='alert-danger'>error</p>");
          }

    });
    });
    
   return false;
});

$(function(){
    $('#add_team').click(function(e){
      e.preventDefault();
      // alert("hello");
      $.ajax({
        url: 'add_team.php',
        type: 'post',
        data: $('#form_add_team').serialize(),
        success: function(res,statut){
            $('#res_add_team').html("<p id='msg' class='alert-success'>"+res+ "</p>");
        },
        error: function(res)  
          {   
            $("#res_add_team").html("<p id='msg' class='alert-danger'>error</p>");
          }

      });
    });
    
   return false;
});


$(function(){
    $('#add_player_team').click(function(e){
      e.preventDefault();
      // alert("hello");
      $.ajax({
        url: 'add_player_team.php',
        type: 'post',
        data: $('#form_add_player_team').serialize(),
        success: function(res,statut){
            $('#res_add_player_team').html("<p id='msg' class='alert-success'>"+res+ "</p>");
        },
        error: function(res)  
          {   
            $("#res_add_player_team").html("<p id='msg' class='alert-danger'>error</p>");
          }

      });
    });
    
   return false;
});



$(function(){
    $('#add_compet').click(function(e){
      e.preventDefault();
      // alert("hello");
      $.ajax({
        url: 'add_compet.php',
        type: 'post',
        data: $('#form_add_compet').serialize(),
        success: function(res,statut){
            $('#res_add_compet').html("<p id='msg' class='alert-success'>"+res+ "</p>");
        },
        error: function(res)  
          {   
            $("#res_add_compet").html("<p id='msg' class='alert-danger'>error</p>");
          }

      });
    });
    
   return false;
});


$(function() {  
    $("#input_note_1").click(function(e){
      $("#x1").append("<div class='col row '><input type='text' class='col form-control form-control-sm autoj' placeholder='player' name='player_1[]'><input type='text' class='col form-control form-control-sm' placeholder='note' name='note_1[]'></div>");

    });
    $("#input_note_2").click(function(e){
      $("#x2").append("<div class='col row'><input type='text' class='col form-control form-control-sm autoj' placeholder='player' name='player_2[]'><input type='text' class='col form-control form-control-sm' placeholder='note' name='note_2[]'></div>")
    });
});