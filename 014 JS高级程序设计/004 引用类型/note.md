# 引用类型

>对象是某个特定引用类型的实例。新对象用 new 关键字跟随一个构造函数来创建。
```
var person = new Object();

// 简化写法

var parson = {};
```

# 1. Object 类型

# 2. Array 类型

> 与其他语言不同的地方在于:数组的每一项都可以保存任何类型的数据。

> 两种创建方式

- 使用Array 构造函数
```
var arr = new Array();

var arr1 = new Array(20);  // 传递数字参数，数组长度为20

var arr2 = new Array('gree'); // 传递其他类型参数，创建数组，参数为数组的项

var arr3 = Array();  // new 关键字可以省略
```

- 使用数组字面量表示法
```
var arr = [];
```

```
var arr = ['a','b'];

arr[5] = 'c';


console.log(arr.length);      // 6,奇怪的计算
console.log(arr);             // [Array[6] 0:"a",1:"b",5:"c"] 
```

> 数组的length属性不是"只读"属性。可以通过设置该属性，从数组末尾移除项或者添加新项。
```
// 移除
var arr = ['a',1,2,3];

arr.length = 3;

console.log(arr[3]);  //undefined

// 添加
arr.length = 5;
console.log(arr[3]); //undefined, 新增的项为unefined
console.log(arr[4]); //undefined, 新增的项为unefined

// 利用length添加新属性
arr[arr.length] = 'a';
console.log(arr[5]);  // a

arr[arr.length] = 'b';
console.log(arr[5]);  // b
```

## 2.1 检测数组

- instanceof
缺陷: 如果网页包含多个执行环境、框架，此时就会存在两个Array的构造函数。此时instanceof可能出错。

- Array.isArray()
缺陷: IE9+ 才支持

## 2.2 转换方法

- valueOf(),返回数组
- toString(),返回逗号隔开的字符串
- toLocaleString，返回逗号隔开的字符串
- join()

## 2.3 栈方法

- push(),接收任意参数，逐个添加到数组末尾,并返回修改后数组长度。

- pop(),删除数组末尾最后一项，并返回删除项。

## 2.4 队列方法

- shift(),删除数组第一个项，返回删除项。

- unshift,接收任意参数，逐个添加在数组前端，并返回修改后的数组长度。

## 2.5 重新排序方法

- reverse(),顺序取反

- sort()

默认情况下，sort方法按升序排列数组项 - 最小的值在最前面(),最大的值排在最后面。

sort默认会调用toString()，然后比较字符串。即时传入的是数值。
```
console.log([1,2,5,10,15,20].sort());

// [1,10,15,2,20,5];
```

> sort()可以接受一个函数作为参数。此函数接收两个参数。比较函数返回一个小于0(在前)、等于0(不变)、大于0(在后)的值来影响排序。

## 2.6 操作方法

1. concat(),连接其他数组或者项，生成新副本。

2. slice(),截取新数组，生成新数组。

- 接受一个或两个参数，第一个参数指定开始位置，第二个参数指定结束位置。
- 如果没有第二参数，默认到数组长度。
- 如果有参数为负数，则用数组长度加上该数计算位置)。

3. splice() 主要用途是向数组中插入项,返回一个数组，即删除的项。有三种用法

- 删除:可以删除任意数量的项。指定前两个参数。起始位置、要删除的项。
```
arr.splice(0,2);  //删除数组的前两项
```

- 插入:提供三个参数。起始位置，删除的数量(0)，插入的项(多个的可以继续第四、第五..滴第N个参数)
```
arr.splice(5,0,'gee','cdd');
```

- 替换:提供三个参数。起始位置，删除的数量，替换的项。
```
arr.splice(5,1,'gee');
``` 

## 2.7 位置方法

有两种位置方法，都接受两个参数。要查找的项和查找的起始位置(可选)。返回项在数组中的位置。**没有找到的情况下返回-1**

1. indexOf - 数组开头开始查找。

2. lastIndexOf - 数组末尾开始查找。

> 常用于判断一个值是否在数组中，依此条件，进行下一步操作。ES6新增include

## 2.7 迭代方法

- every()

- some()

- forEach()

- map()

- filter()

- ES6 for...of

- ES6 key()

- ES6 value()

- ES6 entries()

## 2.8 缩小方法

迭代数组所有项，构建一个最终返回值。

1. reduce
```
var values = [1,2,3,4,5];

var sum = values.reduce(function(prev,cur,index,array)) {
  return prev + cur
}

console.log(sum); // 15
```
以上代码:第一次执行回调函数prev = 1, cur = 2。第二次prev = 3, cur=3。依此类推。最终结果为15。

2. reduceRight - 从数组尾部开始执行。

# 3. Date 类型

> 精确到1970年1月1日之前或之后的285616年。
```
var now = new Date();  // 获取当前时间

// 也可以传入参数（该时间点的毫秒数），转换为时间格式。
```

> Date.parse() 方法，接收字符串参数(字符串格式因地区不同而有差异)，转换为时间格式。返回毫秒数，如果不能转换为时间格式，返回NaN。**不推荐使用**
```
var time = Date.parse('2016年9月10日');

console.log(time);  // NaN
```

> Date.UTC()方法，参数分别为年、月(0-10)，日(1-31)，时(0-23),分，秒，毫秒。一、二参数是必须的，其他默认为0.返回毫秒数，

> Date.now()方法，取得当前日期和时间的**毫秒数**

> 使用 + 操作符把对象转换成字符串，能达到Date.now() 的效果。
```
var time = +new Date();

console.log(time);  // 返回毫秒数
```

## 3.1 继承的方法

- toLacalString()

- toString()

- valueOf(), 返回毫秒数，用于比较日期前后

## 3.2 日期格式化 - 因浏览器不同而显示不同，所以不进行理解。

## 3.3 日期和时间组件方法

- getFullYear(): 获取年，四位数
- getMonth(): 获取月份，0-11
- getDate(): 获取日期，1-31
- getDay(): 获取星期，0-6
- getHours(): 获取小时，0-23
- getMinutes(): 获取分钟,0-59
- getSeconds(): 获取秒数，0-59
- getMilliseconds(): 获取毫秒数
- getTime(): 返回毫秒数，与1970年1年1日0点的相差时间

# 4. RegExp 类型

# 5. Function类型

函数实际上是对象，每个函数都是Function类型的实例。而且和其他引用类型一样具有属性和方法，函数名实际上是指向函数对象的指针。

- 声明函数，function sum () {}

- 函数表达式 var sum = function() {}; **表达式末尾需要分号**

- 因函数名实际上是指向对象的指针，所以可以允许多个名字。
```
function sum() {
  console.log(1 + 2);
}

var sum2 = sum;      // 不加括号，传递函数指针。

sum(); //3
sum2(); //3
```

## 5.1 没有重载

## 5.2 函数声明 和 函数表达式

区别:

- 函数声明会在执行环境加载数据时，在执行任何代码之前，先解析读取声明函数。(即变量、函数提升。)
```
sum(1,2);

function sum(a,b){
  console.log(a + b);
}

// 可执行
```

- 函数表达式，会在解析器执行到所在的代码时，才进行解析。
```
sum(1,2);

var sum = function(a,b) {
  console.log(a + b);
}
// 报错
```

## 5.3 作为值的函数

函数名本身就是变量，因此函数可以作为值使用。不仅可以将函数作为参数传递给另一个函数，还能作为函数的返回值。
```
function sortProperty(prop) {
  return function(Object1,Object2) {
    var val1 = Object1[prop];
    var val2 = Object2[prop];

    return val1 - val2;
  }
}

var arr = [{name:'abb',age:30},{name:'zcc',age:10}];

arr.sort(sortProperty(name));
console.log(arr);

arr.sort(sortProperty(age));
console.log(arr);
```

## 5.4 函数内部属性

函数内部有两个特殊对象:arguments 和 this。

> arguments，保存函数参数对象。

特殊点:该对象有一个名叫callee的属性，指向拥有这个arguments对象的函数。
```
// 阶乘函数

// 函数体 与 函数名 强耦合
function fac(num) {
  if(num <= 1) {
    return 1;
  } else {
    return num * fac(num - 1);
  }
} 

// 改进版，使用callee代替函数名
function fac(num) {
  if(num <= 1) {
    return 1;
  } else {
    return num * arguments.callee(num -1);
  }
}

var toggleFac = fac;

//声明式，函数体覆盖之前函数
function fac(num) {  
  return 0;
}

console.log(toggleFac(5));  // 0
console.log(fac(5));        // 0

// 函数表达式
fac = function () {  
  return 0;
}

console.log(toggleFac(5));  // 120
console.log(fac(5));        // 0
```

> this对象，引用当前函数的执行环境对象。
```
window.color = 'red';

obj = {color:'blue'};

o = {color:'yellow'};

function sayColor() {
  console.log(this.color);   //this,根据执行环境指向不同对象。
}

sayColor();       // this -> window, red;

obj.sayColor = sayColor;
obj.sayColor();    // this -> obj, blue; 

sayColor.call(o);  // this -> o, yellow;  call接受参数形式为一个个。

// 还缺少一种构造函数，指向函数实例。
```

> caller 对象，保存引用当前函数的函数的引用。
```
function outer() {
  inner();          // 引用inner函数
}

function inner() {
  console.log(inner.caller);  //inner.caller 指向outer();
}

outer(); // 输出自身

inner(); // null

// inner方法改善，解除与函数名强耦合
function inner() {
  console.log(argements.callee.caller);  //argements.callee指向函数本身
}
```
## 5.5 函数属性和方法

每个函数都包含两个属性length和prototype。

1. length,表示希望接收的命名参数的个数。

2. prototype，不可枚举，for...in无法发现。

每个函数都包含两个非继承而来的方法，call 和 apply，设置函数this指向的值。

1. apply
```
function sum(num1,num2){
  return num1 + num2;
}

function callSum1(num1,num2) {
  return sum.apply(this, arguments);    // this -> window
}

function callSum2(num1,num2) {
  return sum.apply(this, [num1,num2]);  // this -> window
}

console.log(callSum1(10,20));    //30
console.log(callSum2(100,200));  //300
```

2. call,除了传参方式不同，其他相同。

> 使用call和apply进行作用域扩充的好处在于，对象不需要和方法强行耦合。

3. bind，会创建函数的实例。
```
window.color = 'red';
var obj = {color:'blue'};

function sayColor() {
  console.log(this.color);
}

var toSayColor = sayColor.bingd(obj); //改变this指向，并创建实例。

sayColor(); // red
toSayColor(); // blue
```

# 6. 基本包装类型

## 6.1 Boolean类型

## 6.2 Number类型

1. toFixed(),将数字转换为字符串，传入参数会用0补全小数位。如果**原本小数位超过参数指定个数，会舍入**。
```
var num = 10;

console.log(num.toFixed(3));   //"10.000"

var num1 = 10.005;

console.log(num.toFixed(2));   //"10.01"
```

2. toExponential(),返回e表示法。传入参数会用0补全小数位。如果**原本小数位超过参数指定个数，会舍入**。
```
var num = 10;

console.log(num.toExponential(1));   //1.0e+1
console.log(num.toExponential(2));   //1.00e+1
console.log(num.toExponential(3));   //1.000e+1

var num = 10.05;

console.log(num.toExponential(1));   //1.0e+1
console.log(num.toExponential(2));   //1.01e+1
console.log(num.toExponential(3));   //1.005e+1
```

3. toPrecision(),返回可能固定大小格式，也可能返回指数表示法。
```
var num =99;

console.log(num.toPrecision(1));  //1e+2,四舍五入后。
console.log(num.toPrecision(2));  //99
console.log(num.toPrecision(3));  //99.0
console.log(num.toPrecision(4));  //99.00
```

## 6.3 String()类型

1. length属性，返回字符串长度。**即使包含双字节字符，也仍然算一个字符**。

2. 字符方法

- charAt，返回给定位置的字符。
```
var str = 'Hello you';

console.log(str.charAt(0));  // H
console.log(str.charAt(3));  // l
```

- charCodeAt(),返回给定位置的字符编码。使用方式同上。

3. 字符串操作方法。

- concat(),字符串拼接，返回副本，不修改原字符串。 可以使用+操作符代替。

- slice(),两个参数，返回起始位置和结束位置之间的字符串，不修改原字符串。参数为负数，会用字符长度 + 负数（即从末尾算起）。

- substr()，两个参数，返回起始位置和相应个数的字符串，不修改原字符串。第一个参数为负数，同上。第二个参数为负数，**转换为0**.

- substring(),两个参数，返回起始位置和结束位置之间的字符串，不修改原字符串。参数为负数，转换为0.
```
var str = 'hello world';

console.log(str.slice(-3));      //rld
console.log(str.substr(-3));     //rld
console.log(str.substring(-3));  //hello world

console.log(str.slice(3,-3));    //rld
console.log(str.substr(3,-3));   //''
console.log(str.substring(3,-3)) //hel
```

4. 字符串位置方法

- indexOf(),仅寻找第一个匹配的值。可传入第二个参数，表示开始寻找的位置。

- lastIndexOf()，同上。

5. trim()

- trim(),删除前后空格，返回副本。

- trimLeft(),删除前空格，返回副本。

-trimRight(),删除后空格，返回副本。

6. 字符串大小写转换方法。

- toUpperCase()

- toLowerCase()

- toLocaleUpperCase()

- toLocaleLowerCase()

7. 字符串的模式匹配方法

8. localeCompare() - 字符串的比较方法。

- 字符串在字母表应该排在字母参数之前，返回-1.

- 字符串等于字符参数，返回0.

- 字符串在字母表应该排在字母参数之后，返回1.
```
var str = 'yellow';

console.log(str.localeCompare('zoo'));     // -1
console.log(str.localeCompare('yellow'));  // 0
console.log(str.localeCompare('yelloa'));  // 1
console.log(str.localeCompare('baa'));     // 1
```

9. fromCharCode() 方法

String 构造函数自带的静态方法，参入多个字符编码参数转换为字符串。

10. HTML方法 - 不推荐。

