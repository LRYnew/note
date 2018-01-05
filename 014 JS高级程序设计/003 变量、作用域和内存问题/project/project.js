
function test(object) {
  object.name = 'YJob';
};

var obj = {name:'WhyJob'};

test(obj);

console.log(obj.name);
console.log(test instanceof String);