//custom.js 

// Add styles for Arabic language 
$(document).ready(function () {

    var currentLang = localStorage.getItem('lang');

    if (currentLang === 'ar') {
        $('.sidebar-wrapper').css({'left':'unset', 'right':'0px'});
        $('.topbar').css('left', '0px');
        $('.user-box').css({'border-left': 'none', 'border-right': '1px solid #f0f0f0', 'margin-left': '0px', 'margin-right': '1rem'});
        $('.page-wrapper').css({'margin-left':'0px','margin-right':'250px'});
        $('.sidebar-wrapper .metismenu a').css('justify-content', 'right');
        $('.sidebar-wrapper .metismenu a .menu-title').css({'margin-left':'unset', 'margin-right':'10px'});
        $('.dropdown-item i').css('margin-left', '5px');
        $('.page-footer').css({'left':'0px','right':'250px'});
        $('.page-footer p').css('text-align', 'center');
        $('.toggle-icon').removeClass('ms-auto').css('margin-inline-start', 'auto');
        $('.logo-text').css({'margin-left':'unset', 'margin-right': '10px'});
        $('.widgets-icons-2').removeClass('ms-auto').css('margin-inline-start', 'auto');
        $('.dropdown').removeClass('ms-auto').css('margin-inline-start', 'auto');
        $('.page-breadcrumb .ms-auto').addClass('ms-new').removeClass('ms-auto');
        $('.page-breadcrumb .ms-new').css('margin-inline-start', 'auto');
        $('.breadcrumb-item').addClass('float-right-before');
        $('.has-arrow').addClass('has-arrow-left');
        $('.bx-right-arrow-alt').addClass('bx-right-arrow-before')
        $('.page-breadcrumb .btn-group .dropdown-toggle').css({'border-radius': '5px 0px 0px 5px'});
        $('.page-breadcrumb .btn-group .button-text').css({'border-radius': '0px 5px 5px 0px'});




    }
});