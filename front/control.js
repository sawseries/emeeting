/*(function() {
  var h, a, f;
  a = document.getElementsByTagName('link');
  for (h = 0; h < a.length; h++) {
    f = a[h];
    if (f.rel.toLowerCase().match(/stylesheet/) && f.href) {
      var g = f.href.replace(/(&|\?)rnd=\d+/, '');
      f.href = g + (g.match(/\?/) ? '&' : '?');
      f.href += 'rnd=' + (new Date().valueOf());
    }
  } // for
})();*/

var lastcontrol = '';
var control = '';
var windows=0;
var elecheck = false;

$(function () {   
    $(window).click(function (e) {
        var target = e.target.id.toString();
        var elementClassName = e.target.className.toString();  
      
          
        if(elecheck==false){    
                if(target!==''){
                    if(lastcontrol!==''){
                    windows++;
                       if(lastcontrol==control){
                        hidelastcontrol(control);  
                       }else{
                        hidelastcontrol(lastcontrol);  
                       }
                    }else if((lastcontrol=='')&&(windows>1)){
                    windows++;
                    hideedit(control);
                    }
                }else{
                    hideedit(control);
                }
        }else{
          if(target==''){
            if((control=='doctopic_text')||(control=='detail')){
            }else{
              if(lastcontrol==''){
                hideedit(control);
              }else{
                hidelastcontrol(lastcontrol);
              }
            }
          }
        }
    }); 
}); 


function elechecks(chk){ //กำหนดเพื่อให้ไม่ update เมื่อ click
    elecheck = chk;
}
            
function urls(control, actions) {
                
}
              
function navbar_mobile() {
  var x = document.getElementById("navbar_fiexdtop");
  if (x.className === "navbar_fiexdtop") {
      x.className += " responsive";
  } else {
      x.className = "navbar_fiexdtop";
  }
}


          


