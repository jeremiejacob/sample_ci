$(function(){
	$(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
	setupShopDialog();
	setupShopSearchDialogListener();
	setupShopSearchFormListener();
});

function escapeHtml(unsafe) {
    return unsafe
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;");
 }

 function escapeJS(unsafe) {
 	return unsafe
		.replace(/"/g, "\\x22")
		.replace(/'/g, "\\x27");
 }

/**
 * Setup the shop search dialog box
 */
function setupShopDialog() {
	$(".shop-dialog").dialog({
		autoOpen: false,
		model: true,
		width: 500,
		close: function(event, ui) {
			var tbody = $(".shop-dialog-table").children("tbody");
			tbody.empty();
			$("#name").val('');
			$("#category_id").val('');
		}
	});
}

/**
 * Setup listener for search prompt button to open shop dialog
 */
function setupShopSearchDialogListener() {
	$(".shop-prompt").click(function(){
		$(".shop-dialog").dialog("open");
	});
}

/**
 * Setup listener for searching shops in the shop dialog
 */
function setupShopSearchFormListener() {
	$(".shop-dialog-form").submit(function(event){
		shopSearchAJAX();
		event.preventDefault();
	});
}

/**
 * Select the shop from the shop dialog
 */
function selectShop(shop_id, shop_name) {
	$("#shop_id").val(shop_id);
	$("span.shop-name").text(shop_name);
	$(".shop-dialog").dialog("close");
}

/**
 * AJAX request to build the shop search results in the shop dialog
 */
function shopSearchAJAX() {
	var formData = $(".shop-dialog-form").serialize();
	var tbody = $(".shop-dialog-table").children("tbody");
	$.ajax({
		type: "get",
		cache: false,
		data: formData,
		url: "/shop/search",
		dataType: "json",
		async: false,
		success: function(data) {
			// create the tr from shop JSON data
			tbody.empty();
			if (data.length > 0) {
				var tbodyContents = '';
				$.each(data, function(index, element) {
					var tr = '<tr>';
					tr += '<td>' + escapeHtml(element['category_name']) + '</td>';
					tr += '<td class="shop-name">' + escapeHtml(element['name']) + '</td>';
					tr += '<td><input type="hidden" name="id" value="' + element['id'] + '"/>';
					// TODO: use multilingual for text
					tr += '<div class="btn-group">';
					var selectShopFunctionCall = "selectShop('" + element['id'] + "','" + escapeJS(escapeHtml(element['name'])) + "')";
					tr += '<button type="button" name="selectShopButton" class="btn btn-default" onclick="' + selectShopFunctionCall + '">Select</button>';
					tr += '</div></td>';
					tr += '</tr>';
					tbodyContents += tr;
				});
				tbody.append(tbodyContents);
			}
		},
		error: function() {
			tbody.empty();
		}
	});
}