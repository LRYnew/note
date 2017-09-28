function bindEvent(elem, type, selector, fn) {
  if(fn == null) {
    fn = selector;
    selector = null;
  }
  elem.addEventListener(type,function(e) {
    var target;
    if(selector) {
      target = e.target;
      if(target.matches(selector)) {
        fn.call(target,e);
      } else {
        fn(e);
      }
    }
  })
}

var div1 = document.getElementById('div1');

bindEvent (div1,'click','a', function(e){
  alert(this.innerHTML);
});

bindEvent(div1,'click',function(e){
  alert(div1.innerHTML);
})