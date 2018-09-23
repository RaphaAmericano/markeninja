// (function($){
//     alert("Funciona")
//     $('body').on('click', '.botao_upload', function(e){
//         e.preventDefault();
//         var button = $(this);
//         var uploader = wp.media({
//             title: "Inserir Imagem",
//             library: {
//                 type: 'image'
//             },
//             button: {
//                 text: 'Use this image'
//             },
//             multiple: false
//         }).on('select', function(){
//             var attachment = uploader.state().get('selection').first().toJson();
//             $(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:95%;display:block;" />')
//             .next().val(attachment.id).next().show();
//         }).open();
//     });
//     $('body').on('click', '.botao_remover', function(){
//         $(this).hide().prev().val('').prev().addClass('button').html('Upload image');
//         return false
//     });
// }( jQuery ));

(function($){
    var mediaUploader;
	console.log(mediaUploader);
	$('#upload-button').on('click',function(e) {
        e.preventDefault();
        console.log(wp);
        console.log(this);
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}
		
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});
		
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#profile-picture').val(attachment.url);
			$('#profile-picture-preview').css('background-image','url(' + attachment.url + ')');
		});
		
		mediaUploader.open();
		
	});
	
	$('#remove-picture').on('click',function(e){
		
		e.preventDefault();
		var answer = confirm("Are you sure you want to remove your Profile Picture?");
		if( answer == true ){
			$('#profile-picture').val('');
			$('.sunset-general-form').submit();
		}
		return;
	});
}( jQuery ));