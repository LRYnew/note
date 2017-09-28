function Elem(id) {
  this.elem = document.getElementById(id);
}

// 扩展原型
Elem.prototype.html = function(val) {
  var elem = this.elem;
  if(val) {
    elem.innerHTML = val;
    return this;  //用于链式操作，让程序更健壮
  } else {
    return elem.innerHTML;
  }
}

Elem.prototype.on = function(type, fn) {
  var elem = this.elem;
  elem.addEventListener(type, fn);
  return this; //用于链式操作
}

var div = new Elem('test');
console.log(div.html());

div.html("966");
div.on('click',function () {
  console.log(div.html());
});

// 链式操作
div.html("710").on('click',function(){
  console.log('click');
}).html(Math.random());

// 为何不采用直接在Elem下直接定义html和on？
// 解答：如果没有继承关系，你是看不出来的。
// j假如，Object.prototype.toString 这个方法也像你的定义方式一样，
// 咱们还能方便的使用 toString 吗

// function Elem(id) {
//   this.elem = document.getElementById(id);

//   this.html = function (val) {
//     var elem = this.elem;
//     if (val) {
//       elem.innerHTML = val;
//       return this;  //用于链式操作，让程序更健壮
//     } else {
//       return elem.innerHTML;
//     }
//   }

//   this.on = function (type, fn) {
//     var elem = this.elem;
//     elem.addEventListener(type, fn);
//     return this; //用于链式操作
//   }
// }


// var div = new Elem('test');
// console.log(div.html());

// div.html("966");
// div.on('click', function () {
//   console.log(div.html());
// });

// // 链式操作
// div.html("710").on('click', function () {
//   console.log('click');
// });