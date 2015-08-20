/**
 * Create semantic HTML5 Elements for IE < 9
 */

var e = ('abbr,article,aside,audio,canvas,datalist,details,dialog,' +
	'figcaption,figure,footer,header,main,mark,menu,menuitem,meter,' +
	'nav,output,progress,section,summary,time,video').split(',');
var i = e.length;

while (--i) {
	document.createElement(e[i]);
}
