function Person() {};

Person.prototype.name = 'YJob';
Person.prototype.age = 27;
Person.prototype.job = '前端';

Person.prototype.sayName = function() {
  console.log(this.name);
}

var person1 = new Person();
var person2 = new Person();

person1.name = 'WritdJob';

console.log(person1.name); //WritdJob
console.log(person2.name); //YJob

delete person1.name;

console.log(person1.name); //YJob