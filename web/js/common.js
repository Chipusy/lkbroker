function one_more (count) 
{
	count++;
	$("#add_button").remove();
	$("#elements_count").remove();
	$("#preference").append('<div style="display:none;" id="preference_'+count+'"><a href="" onClick="delete_one('+count+'); return false;" alt="Удалить!" id=""><img width="16" src="/sfPropelPlugin/images/delete.png"></a> <input type="text" id="category_name" value="" name="category_preference['+count+'][name]"/> <input type="checkbox" name="category_preference['+count+'][filter_status]" value="1"><br><br></div><input type="hidden" name="elements_count" value="'+count+'" id="elements_count"><a href="" onClick="one_more('+count+'); return false;" id="add_button"><image width="16" src="/sfPropelPlugin/images/new.png">добавить свойство</a>');
	$("#preference_"+count).show('slow')
}

function delete_one (id) 
{
	if (typeof($('input.preference_'+id).val()) === 'string')
	{
		if (confirm('Вы уверены?'))
		{
			$("#preference_"+id).hide('slow')
			$("#preference").append('<input type="hidden" name="category_preference['+id+'][delete]" value="1" id="delete">')
		};
	}
	else
	{
		$("#preference_"+id).hide('slow');
		setTimeout(function () {$("#preference_"+id).remove();}, 1000)
	};
}

function add_preference () 
{
	if ($('#category_parent_id').val() != 0) 
	{
		jQuery.getJSON(
			'/admin.php/category/preference',
			{"id": $('#category_parent_id').val()},
			function(data){
				for (var i=0; i < data.length; i++) {
					count = $("#elements_count").val();
					count++
					
					checked_box = ''
					
					if(data[i].filter_status == 1)
					{
						checked_box = 'checked'
					}
					
					$("#add_button").remove();
					$("#elements_count").remove();
					$("#preference").append('<div style="display:none;" id="preference_'+count+'"><a href="" onClick="delete_one('+count+'); return false;" alt="Удалить!" id=""><img width="16" src="/sfPropelPlugin/images/delete.png"></a> <input type="text" id="category_name" value="'+data[i].key+'" name="category_preference['+count+'][name]"/> <input type="checkbox" name="category_preference['+count+'][filter_status]" value="'+data[i].filter_status+'" '+checked_box+'><input id="category_preference['+count+'][id]" class="preference_'+count+'" type="hidden" value="0" name="category_preference['+count+'][id]"/><br><br></div><input type="hidden" name="elements_count" value="'+count+'" id="elements_count"><a href="" onClick="one_more('+count+'); return false;" id="add_button"><image width="16" src="/sfPropelPlugin/images/new.png">добавить свойство</a>');
					$("#preference_"+count).show('slow')
				};
			}
		);
	};
}

function add_preference_control() 
{
	if($('#category_parent_id').val() == 0) 
	{
		$('#add_preference_button').hide('slow')
	}
	else
	{
		$('#add_preference_button').show('slow')
	}
}