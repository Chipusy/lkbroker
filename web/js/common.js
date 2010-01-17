function one_more (count) 
{
	count++;
	$("#add_button").remove();
	$("#preference").append('<div style="display:none;" id="preference_'+count+'"><a href="" onClick="delete_one('+count+'); return false;" alt="Удалить!" id=""><img width="16" src="/sfPropelPlugin/images/delete.png"></a> <input type="text" id="category_name" value="" name="category_preference['+count+'][name]"/> <input type="checkbox" name="category_preference['+count+'][filter_status]" value="1"><br><br></div><a href="" onClick="one_more('+count+'); return false;" id="add_button"><image width="16" src="/sfPropelPlugin/images/new.png">добавить свойство</a>');
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