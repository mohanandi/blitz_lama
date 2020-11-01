$(document).ready(function() { //when document(DOM) loads completely.
        // Transition effect for navbar
        $(window).scroll(function() { //function is called while you scrolls
          // checks if window is scrolled more than 300px, adds/removes solid class
          if($(this).scrollTop() > 200) {
              $('.navbar').addClass('solid'); //add class 'solid' in any element which has class 'navbar'
          } else {
              $('.navbar').removeClass('solid'); //remove class 'solid' in any element which has class 'navbar'
          }
        });
});
