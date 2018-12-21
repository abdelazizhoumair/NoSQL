$(function(){
    $('#add_player_team').click(function(e){
      e.preventDefault();
      // alert("hello");
      $.ajax({
        url: 'add_player_team.php',
        type: 'post',
        data: $('#form_add_player_team').serialize(),
        success: function(res,statut){
            $('#res_add_player_team').html("<p id='msg' class='alert-success'>"+res+"</p>");
        },
        error: function(res)  
          {   
            $("#res_add_player_team").html("<p id='msg' class='alert-danger'>error</p>");
          }

      });
    });
    
   return false;
});

$(function() {
    
    //autocomplete
    $("#recheche").autocomplete({
        source: "test.php",
        minLength: 1
    });                

});