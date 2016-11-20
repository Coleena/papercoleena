var currentCover = 1;

function updateButtons(){
	if(numberOfCovers <= 1){
		return;
	}
	if(currentCover == 1 && numberOfCovers > 1){
		$('#nextbutton').show();
		$('#backbutton').hide();
		return;
	}
	if(currentCover > 1 && numberOfCovers > currentCover){
		$('#nextbutton').show();
		$('#backbutton').show();
		return;
	}
	if(currentCover == numberOfCovers){
		$('#nextbutton').hide();
		$('#backbutton').show();
		return;
	}
}

function changeCover(){
	$('.albumart.active').removeClass('active');
	$("[src*='_" + currentCoverTypes[currentCover-1] + ".jpg']").addClass('active');
	updateButtons();
}



$(document).ready(function(){
	updateButtons();
	$('#nextbutton').on('click', function(e){
        currentCover++;
		changeCover();
        e.preventDefault();
    });
	$('#backbutton').on('click', function(e){
        currentCover--;
		changeCover();
        e.preventDefault();
    });
});