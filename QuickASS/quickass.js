$(document).ready(function(){
	$(".inputfield").on('input',function(){
		quickass();
	});
	$("#inputtext").keydown(function(e){
		if (e.keyCode == 13){
			e.preventDefault();
		}
	});
	$("#outputtext").on('click',function(){
		var markupPreviouslyEnabled = false;
		if(markupEnabled = $('#enablemarkup').is(":checked")){
			$('#enablemarkup').attr('checked', false);
			markupPreviouslyEnabled = true;
		}
		quickass();
		$("#outputtext").toggle();
		$("#outputtext").after("<textarea id=\"copyfield\" readonly>" + outputText + "</textarea>");
		$("#copyfield").select().focus();
		$("#copyfield").focusout(function(){
			$("#outputtext").toggle();
			$("#copyfield").remove();
			quickass();
		});
		if(markupPreviouslyEnabled){
			$('#enablemarkup').attr('checked', true);
		}
	});
	$("#alttagplus").on('click',function(e){
		addAlternatingTag();
		e.preventDefault();
	});
	$("#alttagminus").on('click',function(e){
		removeAlternatingTag();
		e.preventDefault();
	});
	$("#alttags div").on('click',function(e){
		quickass();
	});
});

var inputText = "";
var outputText = "";
var tagMeat = "";
var beginningTags = "";
var alternatingTags = [];
var numberOfAlternatingTags = 2;
var endingTags = "";
var tagNumber = 1;
var everyNChars = 1;

var whitespaceShift = 0;

var countWhitespace = false;
var countWhitespaceInIndex = false;

var markupEnabled = true;

var i = 0;
function quickass(){
	updateVariables();
	for(i = 0; i < inputText.length; i++){
		currentChar = inputText.charAt(i);
		if(!countWhitespace && (currentChar == " " || currentChar == "　")){ //move up index if whitespace
			outputText += currentChar;
			whitespaceShift++;
			continue;
		}
		if((i-whitespaceShift)%everyNChars != 0){ //move up index if not multiple of nth letter
			outputText += currentChar;
			continue;
		}
		insertTags();
		outputText += currentChar;
	}
	$('#outputtext').html(outputText);
};

function updateVariables(){
	inputText = $('#inputtext').val();
	outputText = "";
	beginningTags = $('#beginningtags').val();
	alternatingTags = [];
	$('.alttag').each(function(){
		alternatingTags.push($(this).val());
	});
	endingTags = $('#endingtags').val();
	tagNumber = 0;
	everyNChars = $('#everynchars').val();
	countWhitespace = $('#countwhitespace').is(":checked");
	whitespaceShift = 0;
	markupEnabled = $('#enablemarkup').is(":checked");
}

function insertTags(){
	tagMeat = "";
	tagMeat += "{";
	tagMeat += beginningTags;
	tagMeat += alternatingTags[tagNumber%alternatingTags.length];
	tagMeat += endingTags;
	tagMeat += "}";
	if(markupEnabled){
		tagMeat = markupText(tagMeat);
	}
	outputText += tagMeat;
	tagNumber++;
}

function addAlternatingTag(){
	numberOfAlternatingTags++;
	$('#alttags').append("<span><label for=\"alttag" + numberOfAlternatingTags + "\">" + numberOfAlternatingTags + ".</label><input type=\"text\" class=\"inputfield alttag\" id=\"alttag" + numberOfAlternatingTags + "\"></span>");
	$(".inputfield").on('input',function(){
		quickass();
	});
}
function removeAlternatingTag(){
	if(numberOfAlternatingTags <= 2){
		return;
	}
	$('#alttag' + numberOfAlternatingTags).parent().remove();
	numberOfAlternatingTags--;
}

function markupText(meat){
	var originalMeat = meat.split("");
	outputMeat = "";
	var j = 0;
	var inParentheses = false;
	var afterSlash = false;
	var afterAnd = false;
	while(j < originalMeat.length){
		var characterString = "";
		if(/[{|}]/i.test(originalMeat[j])){
			while(/[{|}]/i.test(originalMeat[j])){
				characterString += originalMeat[j];
				j++;
			}
			outputMeat += spanner("bracket",characterString);
		}
		else if(/[(|)]/i.test(originalMeat[j])){
			while(/[(|)]/i.test(originalMeat[j])){
				characterString += originalMeat[j];
				j++;
			}
			afterSlash = false;
			afterAnd = false;
			inParentheses = /\(/i.test(originalMeat[j-1])
			outputMeat += spanner("parentheses",characterString);
		}
		else if(/,/i.test(originalMeat[j])){
			while(/,/i.test(originalMeat[j])){
				characterString += originalMeat[j];
				j++;
			}
			outputMeat += spanner("comma",characterString);
		}
		else if(/\\/i.test(originalMeat[j])){
			while(/\\/i.test(originalMeat[j])){
				characterString += originalMeat[j];
				j++;
			}
			afterSlash = true;
			outputMeat += spanner("slash",characterString);
		}
		else if(/&/i.test(originalMeat[j])){
			while(/&/i.test(originalMeat[j])){
				characterString += originalMeat[j];
				j++;
			}
			afterAnd = true;
			outputMeat += spanner("parameter",characterString);
		}
		else if(afterAnd && /[a-z|0-9]/i.test(originalMeat[j])){
			while(/[a-z|0-9]/i.test(originalMeat[j])){
				characterString += originalMeat[j];
				j++;
			}
			afterAnd = false;
			outputMeat += spanner("parameter",characterString);
		}
		else if(/\\/i.test(originalMeat[j-1]) && !afterAnd && /[0-9]/i.test(originalMeat[j])){
			characterString += originalMeat[j];
			j++;
			outputMeat += spanner("tag",characterString);
		}
		else if(/[0-9]/i.test(originalMeat[j])){
			while(/[0-9]/i.test(originalMeat[j])){
				characterString += originalMeat[j];
				j++;
			}
			outputMeat += spanner("parameter",characterString);
		}
		else if(afterSlash && /[a-z]/i.test(originalMeat[j])){
			while(/[a-z]/i.test(originalMeat[j])){
				characterString += originalMeat[j];
				j++;
			}
			outputMeat += spanner("tag",characterString);
		}
		else{
			outputMeat += originalMeat[j];
			j++;
		}
	}
	return outputMeat;
}
function spanner(spanClass,spanContent){
	return "<span class=\"" + spanClass + "\">" + spanContent + "</span>";
}