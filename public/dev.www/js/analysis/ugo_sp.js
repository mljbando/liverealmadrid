!function(){function e(e){var n=[],i=new Date,o=new Date;if(o.setFullYear(o.getFullYear()+7),document.cookie){n=document.cookie.split(";");for(var r=0;r<n.length;r++){var d=n[r].replace(/^\s+|\s+$/g,""),c=d.indexOf("=");if(d.substring(0,c)==e)return unescape(d.slice(c+1))}}var l=t(4),a=i.getMonth()+1,u=i.getDate(),g=i.getHours(),r=i.getMinutes(),m=i.getSeconds(),h=String(i.getFullYear())+(1==String(a).length?"0":"")+String(a)+(1==String(u).length?"0":"")+String(u)+(1==String(g).length?"0":"")+String(g)+(1==String(r).length?"0":"")+String(r)+(1==String(m).length?"0":"")+String(m)+String(l);return document.cookie=e+"="+h+"_f; expires="+new Date(o).toUTCString()+"; domain="+location.hostname,h+"_f"}function t(e){for(var t="123456789".split(""),n="",i=0;e>i;i++)n+=t[Math.floor(Math.random()*t.length)];return n}var n="",i=!0,o="__ulfpc",r=6011045,d="f092",c=c||Math.floor(9e6*Math.random())+1e6;if("http:"==document.location.protocol){var l={id:r,lt:3,h:d,url:document.URL,ref:document.referrer,lg:n,rand:c,bw:window.innerWidth?window.innerWidth:document.documentElement&&0!=document.documentElement.clientWidth?document.documentElement.clientWidth:document.body?document.body.clientWidth:0,bh:window.innerHeight?window.innerHeight:document.documentElement&&0!=document.documentElement.clientHeight?document.documentElement.clientHeight:document.body?document.body.clientHeight:0,dpr:void 0!=window.devicePixelRatio?window.devicePixelRatio:0,sw:screen.width,sh:screen.height,dpr:void 0!=window.devicePixelRatio?window.devicePixelRatio:0,sb:document.title,guid:"ON"};i&&(l.fp=e(o)),l.eflg=1;var a=document.createElement("a"),u=document.createElement("img");u.setAttribute("id","_ullogimgltr"),u.setAttribute("width",1),u.setAttribute("height",1),u.setAttribute("alt","");var g="http://le.nakanohito.jp/le/1/?";for(var m in l)g=g.concat(m+"="+encodeURIComponent(l[m])+"&");u.src=g.slice(0,-1),a.setAttribute("href","http://smartphone.userlocal.jp/"),a.setAttribute("target","_blank"),a.appendChild(u);var h=document.getElementsByTagName("body")[0];h.appendChild(a)}}();