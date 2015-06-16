$('li#hamburger').click(function(){
    event.stopPropagation;
    alert('clicked');                       
});