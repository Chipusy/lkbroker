function one_more (count) 
{
	count++;
	$("#add_button").remove();
	$("#elements_count").remove();
	$("#preference").append('<div style="display:none;" id="preference_'+count+'"><a href="" onClick="delete_one('+count+'); return false;" alt="Удалить!" id=""><img width="16" src="/sfPropelPlugin/images/delete.png"></a> <input type="text" id="category_name" value="" name="category_preference['+count+'][name]"/> фильтр: <input type="checkbox" name="category_preference['+count+'][filter_status]" value="1">тип:<select size="1" name="category_preference['+count+'][preference_type]"><option value="1">число</option><option value="2">текст</option><option value="3">да/нет</option></select> ед. изерения: <input type="text" id="" value="" name="category_preference['+count+'][preference_unit]"/><br><br></div><input type="hidden" name="elements_count" value="'+count+'" id="elements_count"><a href="" onClick="one_more('+count+'); return false;" id="add_button"><image width="16" src="/sfPropelPlugin/images/new.png">добавить свойство</a>');
	$("#preference_"+count).show('slow')
}

function one_more_file (count) 
{
	count++;
	$("#add_file_button").remove();
	$("#element_file_count").remove();
	$('#element_file').append('<div style="display:none;padding-bottom:10px;" id="element_file_'+count+'"><a href="" onClick="delete_one_file('+count+'); return false;" alt="Удалить!" id=""><img width="16" src="/sfPropelPlugin/images/delete.png"></a><input type="file" name="element_file['+count+']"></div> <input type="hidden" name="element_files_count" value="'+count+'" id="element_file_count"> <a href="" onClick="one_more_file('+count+'); return false;" id="add_file_button"><image width="16" src="/sfPropelPlugin/images/new.png">добавить файл</a>');
	$("#element_file_"+count).show('slow')
}

function delete_file (id) 
{
	if (confirm('Вы уверены?'))
	{
		$("#file_"+id).hide('slow')
		$("#element_file").append('<input type="hidden" name="element_file['+id+'][delete]" value="1" id="delete">')
	};
}

function delete_one_file (id) 
{
	$("#element_file_"+id).hide('slow');
	setTimeout(function () {$("#element_file_"+id).remove();}, 1000)
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
			function(data)
			{
				for (var i=0; i < data.length; i++) 
				{
					count = $("#elements_count").val();
					count++
					
					checked_box = ''
					selected_box = ''
					
					if(data[i].filter_status == 1)
					{
						checked_box = 'checked'
					}
					
					if(data[i].filter_status == 1)
					{
						selected_box = 'selected'
					}
					
					selected_box_preference_type = '';
					if (data[i].preference_type == 1) {selected_box_preference_type = 'selected'};
					options = '<option '+selected_box_preference_type+' value="1">число</option>';
					selected_box_preference_type = '';
					if (data[i].preference_type == 2) {selected_box_preference_type = 'selected'};
					options = options+'<option '+selected_box_preference_type+' value="2">текст</option>';
					selected_box_preference_type = '';
					if (data[i].preference_type == 3) {selected_box_preference_type = 'selected'};
					options = options+'<option '+selected_box_preference_type+' value="3">да/нет</option>';
					selected_box_preference_type = '';
					
					$("#add_button").remove();
					$("#elements_count").remove();
					
					$("#preference").append('<div style="display:none;" id="preference_'+count+'"><a href="" onClick="delete_one('+count+'); return false;" alt="Удалить!" id=""><img width="16" src="/sfPropelPlugin/images/delete.png"></a> <input type="text" id="category_name" value="'+data[i].key+'" name="category_preference['+count+'][name]"/> фильтр: <input type="checkbox" name="category_preference['+count+'][filter_status]" value="'+data[i].filter_status+'" '+checked_box+'> тип:<select size="1" name="category_preference['+count+'][preference_type]">'+options+'</select> ед. изерения: <input type="text" id="" value="'+data[i].preference_unit+'" name="category_preference['+count+'][preference_unit]"/> <input id="category_preference['+count+'][id]" class="preference_'+count+'" type="hidden" value="0" name="category_preference['+count+'][id]"/><br><br></div><input type="hidden" name="elements_count" value="'+count+'" id="elements_count"><a href="" onClick="one_more('+count+'); return false;" id="add_button"><image width="16" src="/sfPropelPlugin/images/new.png">добавить свойство</a>');
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

function change_preference (select) 
{
	
	$("#preference").hide('slow');
	
	$("#preference").html('');
	
	jQuery.getJSON(
		'/admin.php/category/preference',
		{"id": $('#element_category_id').val()},
		function(data)
		{
			for (var i=0; i < data.length; i++) 
			{
				value_field = '<input type="text" name="element_preference['+i+'][value]" value="" id="element_preference['+i+']"/>'
				
				if (data[i].preference_type == 3) 
				{
					checked_box = '';
					
					if (data[i].value == 1) {checked_box = 'checked'};
					
					value_field = '<input type="checkbox" name="element_preference['+i+'][value]" value="1" id="element_preference['+i+']" checked_box/>'
				}
				
				value_field = value_field+' '+data[i].preference_unit;
				
				$("#preference").append('<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_company_price"><div><label for="element_preference">'+data[i].key+'</label><div class="content">'+value_field+'<input type="hidden" id="element_preference['+i+'][id]" value="0" name="element_preference['+i+'][id]"/><input type="hidden" id="element_preference['+i+'][category_preference_id]" value="'+data[i].id+'" name="element_preference['+i+'][category_preference_id]"/></div></div></div>');
			};
		}
	);
	
	$("#preference").show('slow');
}

function add_company () 
{
	if ($('#element_company').val() == 'new') 
	{
		$('#element_company_new').html(' &nbsp;&nbsp;&nbsp; Название: <input type="text" name="element_company[name]"> Агент: <input type="text" name="element_company[agent]"> Тел.: <input type="text" name="element_company[phone]"> Сайт: <input type="text" name="element_company[site]">');
		
		$('#element_company_new').show('slow')
	}
	else
	{
		$('#element_company_new').hide('slow')
	};
}

$(document).ready(function  () {
	$('#element_category_id').attr('onChange', 'change_preference()');
	//$('#element_company').attr('onChange', 'add_company()');
});
