$(document).on('shown', function(event) {

	$("#abc").hide(100);
	$("#yes_no").hide(100);
	$(":radio:eq(0)").click(function(){
		$("#abc").hide(100);
		$("#yes_no").show(100);
	});

	$(":radio:eq(1)").click(function(){
		$("#yes_no").hide(100);
		$("#abc").show(100);
	});

	$('#chosen_a').change(function(){
		var criteria_id =  $(':selected',this).data('id');
		$('.criteria_rate2').val(criteria_id);
	});
});

$(document).ready(function() {

	//check box hide and show
	$("#button_show_hide").hide(100);
    $('.check_me').click(function() {
        if ( $('.check_me:checked').length >= 1) {
            $("#button_show_hide").show(500);
        } else {
            $("#button_show_hide").hide(500);
        }
    });

	//check box hide and show
    $('.select_group').click(function() {
        if ( $('.select_group:checked').length >= 1) {
            $("#button_show_hide").show(500);
        } else {
            $("#button_show_hide").hide(500);
        }
    });

	//check all check box
	$(".select_group").click(function() {
		var table_id12 = $(this).closest('table').attr('id');
		if($(this).is(':checked'))
		{
			$("#"+table_id12+" :checkbox").attr('checked', $(this).attr('checked'));
		}
		else
		{
			 $("#"+table_id12+" :checkbox").attr('checked', false);
		}

	});


	//delete APPS part
	$(".delete_row").click(function() {

		var user_id =  $(this).attr('user-id');
		var friend_id =  $(this).attr('friend-id');

		var answ = confirm('Block this user?');
		if(answ)
		{
			deleteuserAjax(user_id,friend_id);
		}
		else
		{
			return false;
		}
	});

	function deleteuserAjax(user_id,friend_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'index.php/block/ajax_delete_row',
			dataType: 'json',
			data : {
				user_id : user_id,
				friend_id : friend_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('The user has been blocked');
					location.reload();
				}
				else if(data=='error')
				{
					alert('Error.');
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
			}
		});
	}

		//delete APPS part
	$(".add_friend").click(function() {

		var user_id =  $(this).attr('user-id');
		var friend_id =  $(this).attr('friend-id');
		var answ = confirm('Add this user as your friend?');
		if(answ)
		{
			adduserAjax(user_id,friend_id);
		}
		else
		{
			return false;
		}
	});

	function adduserAjax(user_id,friend_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'index.php/friend/ajax_add_friend',
			dataType: 'json',
			data : {
				user_id : user_id,
				friend_id : friend_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('Waiting for friend request.');
					location.reload();
				}
				else if(data=='error')
				{
					alert('Waiting for friend request.');
					location.reload();
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
			}
		});
	}

	$(".accept_friend").click(function() {

		var user_id =  $(this).attr('user-id');
		var friend_id =  $(this).attr('friend-id');
		var answ = confirm('Accept to become your friend?');
		if(answ)
		{
			acceptuserAjax(user_id,friend_id);
		}
		else
		{
			return false;
		}
	});

	function acceptuserAjax(user_id,friend_id)
	{
		$.ajax({
			type: "POST",
			async : false,
			url: config.base_url + 'index.php/friend/ajax_accept_friend',
			dataType: 'json',
			data : {
				user_id : user_id,
				friend_id : friend_id,
			},
			success : function(data) {
				if(data=='success')
				{
					alert('Successfully accepted.');
					location.reload();
				}
				else if(data=='error')
				{
					alert('Successfully accepted.');
					location.reload();
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest + " : " + textStatus + " : " + errorThrown);
			}
		});
	}


});