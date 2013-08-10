 
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

	function getconfig(configType,data){
	    
		$.post(baseURL+'config_modal/getconfig',{configType:configType,data:data},function(data){
		    
			if(data != -1)
			{
				console.log(data);
				$('#modalArea').html(data);
				$('#configModal').modal('show');
			}
		    
		});
	    
	}