const target = {
  m: function () {
    console.log(this);
  }
};
const handler = {};

const proxy = new Proxy(target, handler);

target.m() // false
proxy.m()  // true

function d() {
  console.log(this);
}
d();