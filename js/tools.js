define("read_full","init",function(){window.Tools={fullText:function(e,t){var n,a,o,i,d,l,r;if((t=t||window.event).preventDefault?t.preventDefault():t.returnValue=!1,n=e.getAttribute("data-quote"),a=e.getAttribute("data-code"),(o=ge(".extSubject",e.parentNode.parentNode)[0]).style.display="inline",e.style.display="none",n||a){for(i=a?"code":"div",d=e,l=o.getElementsByTagName(i)[0];(d=d.previousSibling)&&(!d.tagName||d.tagName.toLowerCase()!=i););d&&l&&(a&&Loader.loaded("code_highlight")?Spaces.CodeHighligt.concatCode($(d),$(l)):(d.innerHTML+=l.innerHTML,l.parentNode.removeChild(l)))}0<(r=ge(".splr_item_dots",e.parentNode.parentNode)).length&&(r[0].style.display="none")}}});