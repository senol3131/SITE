$(function(){

		
	$("#search_query").keypress(function (e) {
    if(e.which == 13 && !e.shiftKey) {        
        $(this).closest("button").submit();
        e.preventDefault();
    }
});

	/*
		Tooltip
	*/

	var changeTooltipPosition = function(event) {
		var tooltipX = event.pageX + 15;
		var tooltipY = event.pageY + 30;
		$('div.mrx_tooltip').css({top: tooltipY, left: tooltipX});
	};

	var showTooltip = function(event) {
	  var obj = $(this);
	  var tooltip_content = obj.data("tooltip");
	  $('div.mrx_tooltip').remove();
	  $('<div class="mrx_tooltip">' + tooltip_content + '</div>')
            .appendTo('body');
	  changeTooltipPosition(event);
	};

	var hideTooltip = function() {
	   $('div.mrx_tooltip').remove();
	};

	$(".drop_item, .items span, .iDrop span, .item_half_right span, .item_half_center span, .item_half_left span, .item_half_bottom span, .item_full_right span, .item_full_bottom span").bind({
	   mousemove : changeTooltipPosition,
	   mouseenter : showTooltip,
	   mouseleave: hideTooltip
	});

	
	
});

	
function searchUser()
{
	$("#loader").show();
	$("#dropResponse").empty();
	var search_query = $("input[name=search_query]").val();
	$.ajax({
		type : 'GET',
		url: base_url+'UserSearchTable/'+search_query,
		data: {search_query:search_query},
		success: function(mesaj){
			$("#loader").hide();
			$("#dropResponse").append(mesaj);
		}
	});
}

function searchDrop()
{
	$("#dropResponse2").html("");
	$("#loader").show();
	$("#dropResponse").empty();
	var search_query = $("input[name=search_query]").val();
	if (search_query.length < 3) {
		alert("Arama yaparken en az 3 karakter girmelisiniz!"); 
		$("#loader").hide();
	}
	else if(search_query.length > 30){
		alert("Arama yaparken en fazla 30 karakter girebilirsiniz.");
		$("#loader").hide();
	}
	else{
	if(search_query == "" || search_query == null){
		alert("Boş arama yapılamaz!");
		$("#loader").hide();
	}
	else{
		$.ajax({
			type : 'GET',
			url: base_url+'DropListTable/'+search_query,
			data: {search_query:search_query},
			success: function(mesaj){
				$("#loader").hide();
				$("#dropResponse").append(mesaj);
			}
		});
		}
	}
}	


function getItemMix()
{
	$("#loader").show();
	$("#dropResponse").empty();
	var search_query = $("input[name=search_query]").val();
	if (search_query.length < 3) {
		alert("Arama yaparken en az 3 karakter girmelisiniz!"); 
		$("#loader").hide();
	}
	else if(search_query.length > 30){
		alert("Arama yaparken en fazla 30 karakter girebilirsiniz.");
		$("#loader").hide();
	}
	else{
	if(search_query == "" || search_query == null){
		alert("Boş arama yapılamaz!");
		$("#loader").hide();
	}
	else{
		$.ajax({
			type : 'GET',
			url: base_url+'ShozinTable/'+search_query,
			data: {search_query:search_query},
			success: function(mesaj){
				$("#loader").hide();
				$("#dropResponse").append(mesaj);
			}
		});
		}
	}	
}

function searchItem(ssid)
{
	$("#loader").show();
	$("#dropResponse").empty();
	$.ajax({
		type : 'POST',
		url: base_url+'DropListItem/'+ssid,
		data: {ssid:ssid},
		success: function(mesaj){
			$("#loader").hide();
			$("#dropResponse").append(mesaj);
		}
	});
}

function Zone(zone_id)
{
	$("#loader").show();
	$("#dropResponse").empty();
	$.ajax({
		type : 'POST',
		url: base_url+'Zone/'+zone_id,
		data: {zone_id:zone_id},
		success: function(mesaj){
			$("#loader").hide();
			$("#dropResponse").append(mesaj);
		}
	});
}

function searchGroupItem(ssid)
{
	$("#loader").show();
	$("#dropResponse2").empty();
	$.ajax({
		type : 'POST',
		url: base_url+'DropListGroupItem/'+ssid,
		data: {ssid:ssid},
		success: function(mesaj){
			$("#loader").hide();
			$("#dropResponse2").append(mesaj);
		}
	});
}

function getExchangeItem(item_id)
{
	$("#loader").show();
	$("#dropResponse").empty();
	$.ajax({
		type : 'GET',
		url: base_url+'FragmentRatesTable/'+item_id,
		data: {item_id:item_id},
		success: function(mesaj){
			$("#loader").hide();
			$("#dropResponse").append(mesaj);
		}
	});
}

function getPremiumItem(item_id)
{
	$("#loader").show();
	$("#dropResponse").empty();
	$.ajax({
		type : 'GET',
		url: base_url+'PowerUpStoreTable/'+item_id,
		data: {item_id:item_id},
		success: function(mesaj){
			$("#loader").hide();
			$("#dropResponse").append(mesaj);
		}
	});
}

function getShozinMix(item_id)
{
	$("#loader").show();
	$("#dropResponse").empty();
	$.ajax({
		type : 'GET',
		url: base_url+'ShozinTableItem/'+item_id,
		data: {item_id:item_id},
		success: function(mesaj){
			$("#loader").hide();
			$("#dropResponse").append(mesaj);
		}
	});
}


function getMinningItem(item_id)
{
	$("#loader").show();
	$("#dropResponse").empty();
	$.ajax({
		type : 'GET',
		url: base_url+'MinningTable/'+item_id,
		data: {item_id:item_id},
		success: function(mesaj){
			$("#loader").hide();
			$("#dropResponse").append(mesaj);
		}
	});
}

function getUpgradeItem(item_id)
{
	$("#loader").show();
	$("#dropResponse").empty();
	$.ajax({
		type : 'GET',
		url: base_url+'UpgradeRatesTable/'+item_id,
		data: {item_id:item_id},
		success: function(mesaj){
			$("#loader").hide();
			$("#dropResponse").append(mesaj);
		}
	});
}

function ItemsearchDrop()
{
	$("#dropResponse2").html("");
	$("#loader").show();
	$("#dropResponse").empty();
	var search_query = $("input[name=search_query]").val();
	if (search_query.length < 3) {
		alert("Arama yaparken en az 3 karakter girmelisiniz!"); 
		$("#loader").hide();
	}
	else if(search_query.length > 30){
		alert("Arama yaparken en fazla 30 karakter girebilirsiniz.");
		$("#loader").hide();
	}
	else{
	if(search_query == "" || search_query == null){
		alert("Boş arama yapılamaz!");
		$("#loader").hide();
	}
	else{
		$.ajax({
			type : 'GET',
			url: base_url+'ItemListTable/'+search_query,
			data: {search_query:search_query},
			success: function(mesaj){
				$("#loader").hide();
				$("#dropResponse").append(mesaj);
			}
		});
		}
	}
}





