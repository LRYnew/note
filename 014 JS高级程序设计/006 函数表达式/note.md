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