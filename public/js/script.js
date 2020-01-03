
$(document).ready(function(){
	$('#exampleModal, #deleteModal').on('shown.bs.modal', function (e) {
		var id = $(e.relatedTarget).data('id');
		if(! id){
			$('#id').val('');
	    	$('#id_d').val('');
	    	$('#fullname').val('');
	    	$('#nickname').val('');
	    	$('#email').val('');
	    	$('#address').val('');
		}else{
			$.ajax({
			    type : 'post',
			    url : 'employee/edit',
			    data :  'id='+ id,
			    success : function(res){
					var obj = JSON.parse(res);

			    	$('#id').val(obj.id);
			    	$('#id_d').val(obj.id);
			    	$('#fullname').val(obj.fullname);
			    	$('#nickname').val(obj.nickname);
			    	$('#email').val(obj.email);
			    	$('#address').val(obj.address);
			    }
			});
		}
	});

});

function saveEmployee(){
	var obj;

	if($('#fullname').val().trim() == ''){
		$('#fullname').focus();
		return false;
	}

	if($('#nickname').val().trim() == ''){
		$('#nickname').focus();
		return false;
	}	

	if($('#email').val().trim() == ''){
		$('#email').focus();
		return false;
	}


	if($('#address').val().trim() == ''){
		$('#address').focus();
		return false;
	}

	$.post( "employee/save", $( "#frmEmployee" ).serialize(), function(res){
		obj = JSON.parse(res);
		if(obj.return){
			$('#exampleModal').modal('hide');
			location.reload();
		}else{
			alert(obj.msg);
		}
	});
	
}

function deleteEmployee(){
	var obj, id = $('#id_d').val();

	$.post( "employee/delete", {id:id}, function(res){
		obj = JSON.parse(res);
		if(obj.return){
			$('#deleteModal').modal('hide');
			location.reload();
		}else{
			alert(obj.msg);
		}
	});	
}
