function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});

$(document).ready(function(){
    $("#theform").on("submit", function () {
      var hvalue = $('.ql-editor').html();
      $(this).append("<textarea name='description' style='display:none'>"+hvalue+"</textarea>");
     });
  });