var alertModal = new bootstrap.Modal(document.getElementById('alertModal'));

$(function(){

	$("#scrapBtn").click(function(){
		$(this).prop("disabled",true);
		if(validateUrl($("#url").val())){
			$.post(
				'page/save', 
				{
					'url': $("#url").val()
				}, 
				function(resp) {
					var res=$.parseJSON(resp);
					if(res.status==1){
						alertMsg("Saved","Your URL was succesfuly saved and scraped.");
						$("#alertModal").on("hidden.bs.modal", function () {
							location.reload();
						});
					}else{
						alertMsg("Not Saved",res.data);
						$(this).prop("disabled",false);
					}

				}
			);
		}else{
			alertMsg("Invalid URL","Please write a valid URL to get the links");
			$(this).prop("disabled",false);
		}

	});
});

function alertMsg(title,txt){
	$("#alertModalTitle").html(title);
	$("#alertModalContent").html(txt);
	alertModal.show();
}

function validateUrl(url){
	var url_validate = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	return url_validate.test(url); 
}