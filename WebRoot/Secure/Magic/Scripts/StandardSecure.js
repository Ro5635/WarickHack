//This javascript script utilises the jqurey lib to make the site somewhat interactive:

var main = function(){
//JQurey 

$('.PrimaryNav ul li').hover(
    function() {
    	$(this).addClass("hover");
    }, function() {
    	$(this).removeClass("hover");
    }

    );


	//This block section is the mobile sites slide menu///
	var MenuStatus = false;//Used to track menu position

    $('#HamburgerContainer').click(function() {
    	
    	if(!MenuStatus){
    		//$('#banner').animate({left: "0px"}, 400);
    		$('#MainPageContent').animate({left: "295px"}, 400);
    		$('body').animate({left: "295px"}, 400);
            $('.MobileNav').animate({left: "295px"}, 400);

            MenuStatus =true;
        }else{
          $('#MainPageContent').animate({left: "-295px"}, 400);
          $('body').animate({left: "0px"}, 400);
          $('.MobileNav').animate({left: "-295px"}, 400);
          MenuStatus =false;
      }
  });


    $('#createAccount').submit( function(){
        var FormData = $(this).serialize();
        $.post('AJAXSecure.php' ,FormData ,CleanUserFormCreateAccount);
        return false;
    });

    function CleanUserFormCreateAccount(){
        //Prep the form for the next user:
        $('#userName').value = "";
        $('#password').value = "";
        return false;
    }


    $('#registerNewDevice').submit( function(){
        var FormData = $(this).serialize();
        $.post('AJAXSecure.php' ,FormData ,RegisterNewDeviceReturnFunction);
        $('#NewDeviceName').text($("input[name=simpleName]").val());
        //Now re-set the form
        return false;
    });

    function RegisterNewDeviceReturnFunction($DeviceTocken){
        //Prep the form for the next user:
        $('#DeviceHashValue').text($DeviceTocken);
        console.log($DeviceTocken);
        $('.FormPartOne').slideUp('slow');
        $('.FormSecondStage').slideDown('slow');
        return false;
    }

   $('.DeviceButton').mouseover(function(){
      $(this).addClass('hover');
   });

   $('.DeviceButton').mouseout(function(){
      $(this).removeClass('hover');
   });

   $('.DeviceButton').click(function(){
        url = '?DeviceID=';
        id = $(this).attr('id')
        url2 = url.concat(id);
        window.location.replace(url2);
       


   });







}

$(document).ready(main()); 