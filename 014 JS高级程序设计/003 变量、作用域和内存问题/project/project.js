function Person() { }

Person.prototype = {
  name: 'YJob',
  sayName: function() {
    console.log(this.name);
  }
}
var friend = new Person();

friend.sayName();   //error