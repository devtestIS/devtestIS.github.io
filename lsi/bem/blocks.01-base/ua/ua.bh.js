module.exports = function(bh) {

    bh.match('ua', function(ctx) {
        ctx.bem(false)
            .tag('script')
            .attr('data-skip-moving', 'true')
            .content([
                '/* beautify preserve:start */',
                '!function(e,n,t,r,o){function a(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):l?n.createElementNS.call(n,"https://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function c(e,n){return typeof e===n}function i(e,n,t){var r;for(var o in e)if(e[o]in n)return t===!1?e[o]:(r=n[e[o]],c(r,"function")?fnBind(r,t||n):r);return!1}function s(e,n,t,r,o){var a=e.charAt(0).toUpperCase()+e.slice(1),s=(e+" "+d.join(a+" ")+a).split(" ");return c(n,"string")||c(n,"undefined")?testProps(s,n,r,o):(s=(e+" "+v.join(a+" ")+a).split(" "),i(s,n,t))}var u={},f=n.documentElement,l="svg"===f.nodeName.toLowerCase(),m={elem:a("modern-browser")},p=function(){var e,n=m.elem.style;try{n.fontSize="3ch",e=-1!==n.fontSize.indexOf("ch")}catch(t){e=!1}return e};u.csschunit=p();var g="Moz O ms Webkit",d=g.split(" "),v=g.toLowerCase().split(" "),w=function(e,n,t){return 0===e.indexOf("@")?h(e):(-1!=e.indexOf("-")&&(e=cssToDOM(e)),n?s(e,n,t):s(e,"pfx"))},h=function(n){var t,r=prefixes.length,a=e.CSSRule;if(o===a)return o;if(!n)return!1;if(n=n.replace(/^@/,""),t=n.replace(/-/g,"_").toUpperCase()+"_RULE",t in a)return"@"+n;for(var c=0;r>c;c++){var i=prefixes[c],s=i.toUpperCase()+"_"+t;if(s in a)return"@-"+i.toLowerCase()+"-"+n}return!1},y=w("performance",e),E=c(y,"function")?y():y;u.performance=!!E;var C,R=w("crypto",e);if(R&&"getRandomValues"in R&&"Uint32Array"in e){var S=new Uint32Array(10),x=R.getRandomValues(S);C=x&&c(x[0],"number")}var U=C;u.getRandomValues=!!U;var N=n[t].className;N=N.replace(/no-js/g,"js"),u.csschunit&u.performance&u.getRandomValues||(N=N.replace(/modern-browser/g,"old-browser")),N+="ontouchstart"in e||e.DocumentTouch!==o&&n instanceof DocumentTouch?" touch":" no-touch",n[r]&&n[r]("https://www.w3.org/2000/svg","svg").createSVGRect&&(N+=" svg"),n[t].className=N}(window,document,"documentElement","createElementNS");',
                '/* beautify preserve:end */'
            ], true);
    });

};

// Исходный скрипт
// ;(function (window, document, documentElement, createElementNS, undefined) {
//
//     var TEST_BROWSER = {};
//     // test csschunit start
//
//     var docElement = document.documentElement;
//
//     var isSVG = docElement.nodeName.toLowerCase() === 'svg';
//
//     function createElement() {
//         if (typeof document.createElement !== 'function') {
//             // This is the case in IE7, where the type of createElement is "object".
//             // For this reason, we cannot call apply() as Object is not a Function.
//             return document.createElement(arguments[0]);
//         } else if (isSVG) {
//             return document.createElementNS.call(document, 'https://www.w3.org/2000/svg', arguments[0]);
//         } else {
//             return document.createElement.apply(document, arguments);
//         }
//     };
//
//     var modElem = {
//         elem: createElement('modern-browser')
//     };
//
//     var _csschunit = function () {
//         var elemStyle = modElem.elem.style;
//         var supports;
//         try {
//             elemStyle.fontSize = '3ch';
//             supports = elemStyle.fontSize.indexOf('ch') !== -1;
//         } catch (e) {
//             supports = false;
//         }
//         return supports;
//     };
//     TEST_BROWSER.csschunit = _csschunit();
//
//     // test csschunit completed
//     //--------------------------------
//     //
//     // start test performance
//     //
//     var omPrefixes = 'Moz O ms Webkit';
//
//
//     var cssomPrefixes = omPrefixes.split(' ');
//
//     function is(obj, type) {
//         return typeof obj === type;
//     };
//     var domPrefixes = omPrefixes.toLowerCase().split(' ');
//
//     var prefixed = function (prop, obj, elem) {
//         if (prop.indexOf('@') === 0) {
//             return atRule(prop);
//         }
//
//         if (prop.indexOf('-') != -1) {
//             // Convert kebab-case to camelCase
//             prop = cssToDOM(prop);
//         }
//         if (!obj) {
//             return testPropsAll(prop, 'pfx');
//         } else {
//             // Testing DOM property e.g. Modernizr.prefixed('requestAnimationFrame', window) // 'mozRequestAnimationFrame'
//             return testPropsAll(prop, obj, elem);
//         }
//     };
//
//     function testDOMProps(props, obj, elem) {
//         var item;
//
//         for (var i in props) {
//             if (props[i] in obj) {
//
//                 // return the property name as a string
//                 if (elem === false) {
//                     return props[i];
//                 }
//
//                 item = obj[props[i]];
//
//                 // let's bind a function
//                 if (is(item, 'function')) {
//                     // bind to obj unless overriden
//                     return fnBind(item, elem || obj);
//                 }
//
//                 // return the unbound function or obj or value
//                 return item;
//             }
//         }
//         return false;
//     };
//     var atRule = function (prop) {
//         var length = prefixes.length;
//         var cssrule = window.CSSRule;
//         var rule;
//
//         if (typeof cssrule === 'undefined') {
//             return undefined;
//         }
//
//         if (!prop) {
//             return false;
//         }
//
//         // remove literal @ from beginning of provided property
//         prop = prop.replace(/^@/, '');
//
//         // CSSRules use underscores instead of dashes
//         rule = prop.replace(/-/g, '_').toUpperCase() + '_RULE';
//
//         if (rule in cssrule) {
//             return '@' + prop;
//         }
//
//         for (var i = 0; i < length; i++) {
//             // prefixes gives us something like -o-, and we want O_
//             var prefix = prefixes[i];
//             var thisRule = prefix.toUpperCase() + '_' + rule;
//
//             if (thisRule in cssrule) {
//                 return '@-' + prefix.toLowerCase() + '-' + prop;
//             }
//         }
//
//         return false;
//     };
//
//     function testPropsAll(prop, prefixed, elem, value, skipValueTest) {
//
//         var ucProp = prop.charAt(0).toUpperCase() + prop.slice(1),
//             props = (prop + ' ' + cssomPrefixes.join(ucProp + ' ') + ucProp).split(' ');
//
//         // did they call .prefixed('boxSizing') or are we just testing a prop?
//         if (is(prefixed, 'string') || is(prefixed, 'undefined')) {
//             return testProps(props, prefixed, value, skipValueTest);
//
//             // otherwise, they called .prefixed('requestAnimationFrame', window[, elem])
//         } else {
//             props = (prop + ' ' + (domPrefixes).join(ucProp + ' ') + ucProp).split(' ');
//             return testDOMProps(props, prefixed, elem);
//         }
//     }
//
//     var _performance = prefixed('performance', window);
//
//     // console.log(_performance);
//
//     var result = is(_performance, 'function') ? _performance() : _performance;
//     TEST_BROWSER.performance = !!result;
//
//     // end test
//     //---------------------------------------------------
//     // start test getrandomvalues
//
//     var crypto = prefixed('crypto', window);
//     var supportsGetRandomValues;
//
//     // Safari 6.0 supports crypto.getRandomValues, but does not return the array,
//     // which is required by the spec, so we need to actually check.
//     if (crypto && 'getRandomValues' in crypto && 'Uint32Array' in window) {
//         var array = new Uint32Array(10);
//         var values = crypto.getRandomValues(array);
//         supportsGetRandomValues = values && is(values[0], 'number');
//     }
//
//     var getrandomvalues = supportsGetRandomValues;
//
//
//     TEST_BROWSER.getRandomValues = !!getrandomvalues;
//
//     //********** ua *********************
//
//     var htmlClasses = document[documentElement].className;
//
//     /* no-js -> js */
//     htmlClasses = htmlClasses.replace(/no-js/g, 'js');
//
//     /* modern-browser -> old-browser */
//     if (!(TEST_BROWSER.csschunit & TEST_BROWSER.performance & TEST_BROWSER.getRandomValues)) {
//         htmlClasses = htmlClasses.replace(/modern-browser/g, 'old-browser');
//     }
//
//     /* no-touch <-> touch */
//     if ('ontouchstart' in window || window.DocumentTouch !== undefined && document instanceof DocumentTouch) {
//         htmlClasses += ' touch';
//     } else {
//         htmlClasses += ' no-touch';
//     }
//
//     /* -> svg */
//     if (document[createElementNS] && document[createElementNS]('https://www.w3.org/2000/svg', 'svg').createSVGRect) {
//         htmlClasses += ' svg';
//     }
//
//     document[documentElement].className = htmlClasses;
//
// })(window, document, 'documentElement', 'createElementNS');

