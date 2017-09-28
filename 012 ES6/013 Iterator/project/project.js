var obj = {
  foo: 'foo',
  bar: 'bar',
  baz: 'baz'
}

for (let key of Object.keys(obj)) {
  console.log(key);
}

var arr = ['foo','bar','baz'];

for (let key of arr.keys()) {
  console.log(key);
}