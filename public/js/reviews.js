$(document).ready(function() {
	getComments()
	$("#buttonReviews").click(
        function(){
        	let table = $("#reviews");
        	let grade = $("input:radio[name=grade]:checked").val();
        	let comment = $("#comment").val();
        	let image = $("#image");
        	let imagePath = $("#imagePath").val();
        	image = image[0].files[0];
        	if(image !== undefined)
    		{
    			image = image['name'];
    		} 

        	$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

        	image = $("#image");
        	image = image[0].files[0];
        	comment = $("#comment").val();

        	var formData = new FormData();

        	formData.append('grade', grade);
        	formData.append('comment', comment);
        	formData.append('image', image);


        	$.ajax({
            url:  "createReview",
            type: "POST",
            data: formData,
            processData: false,
  			contentType: false,
            success: function(dataResult){
         		alert(dataResult['result']);
         		comment = $("#comment").val('');
         		$('input[type=radio]').prop("checked", false);
         		document.getElementById("image").value = "";
         		getComments();
			}
		});
	});
});

function getComments()
{
	$.ajax({
	url:  "getComments",
	type: "GET",
	processData: false,
		contentType: false,
		success: function(dataResult){
			let table = $("#reviews");
	    	let reviews = dataResult.review;
	    	let imagePath = $("#imagePath").val();
	    	let html = '';
	    	reviews.forEach((element) => {
	    		userName = element.user['name'];
	    		userComment = element['comment'];
	    		userGrade = element['grade'];
	    		userImage = element['image'];
				html +=
    			'<div class="media-block">'
    			+'<h4><ion-icon name="person-sharp" type="button"></ion-icon>'+userName+'</h4>'
    			+'<h5><ion-icon name="star" style="color: gold;"></ion-icon>'+userGrade+'</h5>'
        		+'<div class="media-body">'
        			+'<div class="mar-btm">'
        				+'<p style="margin-left: 31px;">'+userComment+'</p>'
    				+'</div>'
				+'</div>'
				+'<a href='+'"'+imagePath+'/'+userImage+'" '+'target="_blank">'
                    +'<img alt="" style="height: 50px;" src='+'"'+imagePath+'/'+userImage+'" '+'></a>'
				+'</div>'
				+'<hr>';
			})
			console.log(html);
			table.html(html);
		}
	});
}
