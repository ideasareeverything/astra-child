/* **********************************************************************************
     VARIABLES
 *************************************************************************************/

var sitename = "Creative Folks Development";
var siteurl = "development.creativefolks.dev";


jQuery( document ).ready(function($) 
{
    /* **********************************************************************************
        COOKIE NOTICE
    *************************************************************************************/
    
	$.cookieBar({});
    
});


/* **********************************************************************************
    COOKIE NOTICE CONSENT
*************************************************************************************/

if(jQuery.cookieBar('cookies'))
{
    console.log("Your " + siteurl + " cookie preference are set as: Accept");
    
	/* <!-- Google Tag Manager --> */
	(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-000000');
	/* <!-- End Google Tag Manager --> */ 
}
else
{
    console.log("Your " + siteurl + " cookie preference are set as: Decline");
}