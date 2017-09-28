let total = 30;
var msg = passthru`The total is ${total} (${total * 1.05} with tax)`;

function passthru(literals) {
  let result = '';
  let i = 0;
  console.log(literals);
  console.log(arguments);
  while (i < literals.length) {
    result += literals[i];
    i++;
    if(i < arguments.length) {
      result += arguments[i];
    }
  
  }

  return result;
}

console.log(msg);
