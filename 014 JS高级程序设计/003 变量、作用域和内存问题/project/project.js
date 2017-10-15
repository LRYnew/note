function inheritPrototype(subType,superType) {
  var prototype = Object.create(superType.prototype);   //创建对象，用于重写原型
  prototype.constructor = subType;               //指定原型的构造对象
  subType.prototype = prototype;                 //重写子类型原型
}

function SuperType(name) {
  this.name = name;
  this.colors = ['white','black'];
}
//
SuperType.prototype.sayName = function() {
  console.log(this.name);
}
//
function SubType(name,age) {
  SuperType.call(this,name);
  this.age = age;
}
//
inheritPrototype(SubType,SuperType);
SubType.prototype.sayAge = function(){       //需写在继承函数后面
  console.log(this.age);
}

var person = new SubType('YJob',27);

person.sayName();
console.log(person.age);
person.sayAge();