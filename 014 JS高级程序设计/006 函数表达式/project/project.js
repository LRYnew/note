(function () {
  // 私有变量
  var name = '';            //不定义，下方的name会成为全局变量

  //构造函数
  Person = function(val) {
    name = val;
  };

  //特权方法
  Person.prototype.getName = function() {
    return name;
  }

  Person.prototype.setName = function(val) {
    name = val;
  }
})();

var person1 = new Person('WriteJob');
console.log(person1.getName());          //WriteJob

var person2 = new Person();
console.log(person2.getName());          //undefined

person2.setName('WhyJob');
console.log(person1.getName());          //WhyJob
console.log(person2.getName());          //WhyJob