 
$(document).ready(function(){
//     $('#sidebar').affix({offset:200});
    $('.cenilMenu').click(function(event){
	event.preventDefault();
	if(!$(this).closest('li').hasClass('active'))
	{
		    var dataMenu = $(this).data('menu');
		    $('.cenilSidebar').removeClass('active');
		    $(this).closest('li').addClass('active');
		    $.post(baseURL+'content/load',{loadMenu:dataMenu},function(data){
				$('#content').html(data);
		    });
	}
    });
    
   
    
});	