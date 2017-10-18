# 函数表达式

# 函数表达式的特征

定义函数有两种方法:

- 函数声明，重要的一个特征就是函数声明提升。
```
sayHi();
function() {
  console.log('hi');
}
```
- 函数表达式,有几种不同的语法形式。
```
// 第一种，匿名函数（拉姆达函数）
vr f1 = function(arg0,agg1,arg2){
  //函数体
}
```

理解函数提升的关键就是理解函数声明与函数表达式之间的区别。如下:
```
// 错误示范
if(condition){
  function sayHi() {
    console.log('Hi');
  }
} else {
  function sayHi() {
    console.log('No');
  }
}

//此时使用函数表达式，正确使用
var sayHi;
if(condition) {
  sayHi = function () {
    console.log('Hi');
  } else {
    console.log('No');
  }
}
```

# 1. 递归

递归函数是在一个函数通过调用自身的情况下构成的。
```
// 调用自身，可能出错
function factorial(num) {
  if(num <= 1) {
    return 1;
  } else {
    return num*factorial(num - 1);
    //return num * arguments.callee(num - 1);替换成callee不会报错
  }
}

// 出错方式
var anotherFactorial = factorial;  //现有两个指针指向函数体
factorial = null;                  //删除现有指针。
console.log(factorial(4));         //报错，因为函数内调用factorial指针，但此指针已经删除。
```
```
// callee的之外的另一种方式，严格模式也可以执行。
var factorial = function f(num) {
  if(num <= 1) {
    return 1;
  } else {
    return num * f(num -1);
  }
}

var anotherFactorial = factorial;
factorial = null;
console.log(anotherFactorial(4));
```

# 2. 闭包
> 闭包:有权访问**另一个函数作用域的变量**的函数。常见方式，在一个函数内部创建另一个函数。
```
function createFunction(propertyName) {     //根据对象的某项共同属性进行重排序
  return function(object1, object2) {
    var value1 = object1[propertyName];
    var value2 = object1[propertyName];
  }
  if(value1 < value2) {
    return -1;
  } else if(value1 > value2) {
    return 1;
  } else {
    return 0;
  }
}
```

> 作用域链的本质:指向变量对象的指针列表。只引用，不包含实际变量。无论什么时候再函数内访问一个变量时，就会从作用域链中**搜索**具有相应名字的变量。一般来讲，当函数执行完毕，局部活动对象会被销毁，内存中仅保存全局作用域对象。**闭包的情况又有所不同**

在函数内部创建的函数会将包含函数(即外部函数)的活动对象添加到它的作用域链中。因此在匿名函数被初始化后，包含了外部函数的活动对象和全局变量对象，这样匿名函数就可以访问外部函数定义的所有变量。且外部函数执行完毕后，其活动对象仍然不会销毁，因为匿名函数的作用域链仍然在引用这个活动对象，即:外部函数执行完毕后，其执行环境的作用域链会被销毁，但它的活动对象仍然会留存在内存中，知道匿名销毁后，外部函数的活动对象才会销毁。

活动对象：有函数的this、arguments及其他命名参数、变量组成。
```
function createFunction(propertyName) {
  return function (object1, object2) {
    var value1 = object1[propertyName];
    var value2 = object2[propertyName];
    if (value1 < value2) {
      return -1;
    } else if (value1 > value2) {
      return 1;
    } else {
      return 0;
    }
  }
}

var f = createFunction('age');

var result = f({ name: 1, age: 27 }, { name: 0, age: 20 });

console.log(result);  // 1 ,27 > 20

f = null;  //销毁匿名函数，释放内存中createFunction的活动对象
```

## 2.1 闭包和变量

> 闭包只能取得包含函数中任何变量的最后一个值，因为闭包保存的是整个变量对象，而不是某个特殊的变量。
```
// 每个函数返回值都是10.因为作用域链中，存储的是变量对象（引用指针），指向的i最后都等于10。
function createFunction() {
  var result = [];
  for (var i=0;i<10;i++){
    result[i] = function() {
      return i;
    };
  }
  return result;
}

var result = createFunction();

console.log(result[0]());   //10
console.log(result[9]());   //10
```
```
// 修改，因为此匿名函数立即执行，将执行结果赋值给数组对应索引。
function createFunction() {
  var result = [];
  for (var i=0;i<10;i++){
    result[i] = (function(num){
      return num;
    })(i);
  }
  return result;
}

var result = createFunction();

console.log(result[0]);   //0
console.log(result[9]);   //9
console.log(result[10]);  //undefined
```

## 2.2 关于this

> 由于编写闭包的方式不同，this的指向可能会有变化。每个函数在被调用时，其活动对象都会自动取得两个特殊变量：this和arguments。内部匿名函数在搜索这两个变量时，只会搜索到其活动对象为止。因此永远不可能直接访问外部函数的这两个变量。需通过其他方法变通：
```
// this指向全局环境
var name = 'The window';

var obj = {
  name:'The object',
  getName: function() {
    return function() {
      return this.name;
    };
  }
}

console.log(obj.getName()());  //返回函数立即执行，The window
```
```
var name = 'The window';

var obj = {
  name:'The object',
  getName: function() {
    var that = this;             //赋值到指定变量
    return function() {
      return that.name;
    };
  }
}

console.log(obj.getName()());  //The object
```

## 2.3 内存泄漏 ———— IE9之前版本可能遇到问题

# 3. 模仿块级作用域

> ES6,使用let 或者 const 定义相关变量。
```
// 无块级作用域
function f() {
  for(var i =0;i<5;i++) {
    console.log(i)
  }
  console.log(i);    //循环外也可以使用。
}

//循环外重新定义也一样
function f() {
  for(var i =0;i<5;i++) {
    console.log(i)
  }
  var i;
  console.log(i);    //循环外也可以使用。
}

f();
```

> 使用匿名函数模仿块级作用域
```
// 第一种方式
(function () {
  //块级作用域
})()
```

# 4. 私有变量

Javascript内没有私有成员的概念，所以对象属性都是公开的。有一个私有变量的概念。**任何在函数内部定义的变量,都可以认为是私有变量。因为不能再函数的外部访问这些变量。**

私有变量包括:函数的参数，局部变量和函数内部定义的其他函数。
```
function add(num1,num2) {
  var sum = num1 + num2;
  returm sum;
}
// num1,num2,sum 三个私有变量
```

如果以上函数创建一个闭包，那么闭包通过自己的作用域链可以访问这些变量。利用这点，就可以创建访问私有变量的公有方法。把有权访问私有变量和私有函数的方法称为“特权方法”。创建方式有两种:

- 在构造函数中定义特权方法