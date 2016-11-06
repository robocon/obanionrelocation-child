$(".featureDISABLED").hover(function(){
  $(this).find('.featuredInfo').animate({
    height: "80px",
    padding: "8px",
    'border-right': "1px solid #000",
    'border-left': "1px solid #000",
    'border-top': "1px solid #000"
  }, 100 );
},function(){
  $(this).find('.featuredInfo').animate({
    height: "0",
    padding: "0",
    border: "0",
  }, 100 );
});
