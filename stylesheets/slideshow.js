$('.img_slide img:gt(0)').hide();

$('.right').click(function() {
    $('.img_slide img:first-child').fadeOut().right().fadeIn().end().appendTo('.img_slide');
});

$('.left').click(function() {
console.log('d')
    $('.img_slide img:first-child').fadeOut();
    $('.img_slide img:last-child').prependTo('.img_slide').fadeOut();
    $('.img_slide img:first-child').fadeIn();
});
