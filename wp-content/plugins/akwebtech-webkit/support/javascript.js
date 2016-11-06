jQuery.fn.filterByText = function(textbox, selectSingleMatch) {
        return this.each(function() {
            var select = this;
            var options = [];
            $(select).find('option').each(function() {
                options.push({value: $(this).val(), text: $(this).text()});
            });
            $(select).data('options', options);
            $(textbox).bind('change keyup', function() {
                var options = $(select).empty().data('options');
                var search = $(this).val().trim();
                var regex = new RegExp(search,"gi");
              
                $.each(options, function(i) {
                    var option = options[i];
                    if(option.text.match(regex) !== null) {
                        $(select).append(
                           $('<option>').text(option.text).val(option.value)
                        );
                    }
                });
            });            
        });
    };

$(function() {
    $('#property').filterByText($('#textbox'), true);
	});
   
function SelectAll(id){
	var textrange = document.getElementById(id);
    textrange.focus();
    textrange.select();
	}

function getTemplate(client){
	var agent = $('#agent').val();
	var template = $('#templates').val();
	var property = $('#property').val();
	var templatefile = "http://obanionrelocation.com/wp-content/plugins/akwebtech-webkit/support/process_template.php?c="+client+"&p="+property+"&t="+template+"&a="+agent;
	if(property != null && template != null && agent != null) showContent("akweb_preview", templatefile);
	}


function showContent(div,str){
	if (str==""){
	  document.getElementById(div).innerHTML="";
	  return;
	  }
	if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else{ // code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	    $('#formAction').removeClass('hidden');
	  	var results = xmlhttp.responseText;
	    $("textarea#akweb_code").val(results);
	    document.getElementById(div).innerHTML=results;
	    }
	  }
	xmlhttp.open("GET",str,true);
	xmlhttp.send();
	$('#editListing').attr("href", "post.php?post="+$('#property').val()+"&action=edit");
	}


function printFlyer(){
	var content = document.getElementById("akweb_preview");
	var pri = document.getElementById("akweb_iframe").contentWindow;
	pri.document.open();
	pri.document.write(content.innerHTML);
	pri.document.close();
	pri.focus();
	pri.print();
	}





